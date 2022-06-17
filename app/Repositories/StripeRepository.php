<?php

namespace App\Repositories;

use Mail;
use Config;
use Stripe;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Rates;
use App\Models\Address;
use App\Models\UserPayments;
use App\Models\SessionTiming;
use App\Models\TrainingSessions;
use Illuminate\Support\Facades\DB;
use App\Models\PaymentsSetupCreads;
use Illuminate\Support\Facades\Auth;
use App\Mail\TraineeBookAppointment;

/**
 * Class StripeRepository
 * @package App\Repositories
 * @version Nov 30, 2021, 7:15 pm UTC
 */
class StripeRepository
{
    public function __construct()
    {
    }

    public function model()
    {
    }

    public function getFieldsSearchable()
    {
    }


    public function saveCard($params = []) {

        if (empty($params)) {

            return [
                "status"    => "error",
                "code"      => 404,
                "message"   => "Missing required parameter(s)"
            ];
        }

        DB::beginTransaction();

        $user = Auth::user();

        $KEY = Config::get('services.stripe.secret');
        $stripe = Stripe::setApiKey($KEY);

        try {

            $token = $stripe->tokens()->create([
                'card' => [
                    'number'    => $params["card"],
                    'exp_month' => $params["exp_month"],
                    'exp_year'  => $params["exp_year"],
                    'cvc'       => $params["cvv"]
                ],
            ]);

        } catch (\Throwable $e) {

            DB::rollback();
            return [
                "status"    => "error",
                "code"      => 404,
                "message"   => $e->getMessage(),
            ];
        }

        try {

            $customer = Stripe::customers()->create([
                'source'    => $token['id'],
                'email'     => $user->email ?? '',
                'name'      => $user->name ?? '',
                'metadata' => [
                    "First Name"    => $user->name ?? '',
                    "Last Name"     => $user->name ?? '',
                ]
            ]);

            if ($token) {

                User::where('id', Auth::user()->id)->update([
                    'stripe_card_id'    => $token['card']['id'],
                    'last_four_card_digits' => $token['card']['last4'],
                    'exp_month'     => $token['card']['exp_month'],
                    'exp_year'      => $token['card']['exp_year'],
                    'card_name'     => $params["card_name"],
                ]);
            }
        } catch (\Throwable $e) {

            DB::rollback();
            return [
                "status"    => "error",
                "code"      => 404,
                "message"   => $e->getMessage(),
            ];
        }

        if ($customer) {

            User::where('id', Auth::user()->id)->update([
                "customer_stripe_id"    => $customer['id'],
                "payment_method"        => $customer['default_source']
            ]);

            DB::commit();

            Mail::to($user->email)->send(new TraineeBookAppointment($user));

            return [
                "status"    => "success",
                "code"      => 200,
                "message"   => "Saved successful",
            ];
        }
    }

    public function charge($data, $session)
    {

        DB::beginTransaction();
        try {
            $charge = Stripe::charges()->create([
                'amount' => $session->payable_amount ?? '',
                'currency' => 'usd',
                'customer' => $data->customer_stripe_id ?? '',
                'source' => $data->payment_method ?? '',
                'description' => 'Training session ' . $session->training_session ?? '',
                'receipt_email' => $data->email ?? '',
                'metadata' => [
                    "User ID" => $data->id,
                    "User Type" => 'Trainee',
                    "Address_Line1" => $session->location ?? '',
                    "Address_State" => $data->municipality ?? '',
//                    "Address_PostalCode" => $loc->postal_code ?? '',
//                    "Address_Country" => $loc->getCountry->nicename ?? '',
                ],
                'capture' => true,
            ]);
            if ($charge && isset($charge['status']) && $charge['status'] = 'succeeded') {
                $payments = UserPayments::where('session_id',$session->id)->first();
                if(!$payments){
                    $payments = new UserPayments;
                }
                $payments->user_id = $data->id ?? '';
                $payments->session_id = $session->id ?? '';
                $payments->stripe_customer_id = $data->customer_stripe_id ?? '';
                $payments->balance_transaction = $charge['balance_transaction'] ?? '';
                $payments->user_type = 'trainee';
                $payments->receipt_url = $charge['receipt_url'] ?? '';
                $payments->status = $charge['status'] ?? '';
                $payments->charge_id = $charge['id'] ?? '';
                $payments->payment_status = UserPayments::PAID;
                $payments->save();
                TrainingSessions::where('id', $session->id)->update([
                    'payment_id' => $payments->id,
                    'payment_status'=>UserPayments::PAID
                ]);
                DB::commit();
                return 1;
            } else {
                DB::rollback();
                return 0;
            }
        } catch (Exception $ex) {
            DB::rollback();
            return 0;
        }
    }
    public function chargeWithoutStripe($data, $session)
    {
        DB::beginTransaction();
        try {
            $stripePercentage = config('constants.rates.stripe_fee')/100;  // 2.7%
            $extra_charge = config('constants.rates.extra_charge');  // 0.3
            if ($session->training_session == '1 on 1') {
                $charge = 1;
                $session_type = 'one_on_1_training_charge';

            } else if ($session->training_session == '2 on 1') {
                    $charge = 2;
                    $session_type = 'two_on_1_training_charge';
                }
                $admin_fee = admin_fees($data,$session_type,false);
                $admin_fee_with_tax = admin_fees($data,$session_type,true);
                $trainer_fee = trainer_fees($data,$session_type,false);
                $trainer_fee_with_tax = trainer_fees($data,$session_type,true);
                $final_fees =  get_price_by_location($data,$session_type,true);
                $both_fees =  $admin_fee_with_tax+$trainer_fee_with_tax; // pass
                // $stripe_charges = ($both_fees) * $stripePercentage + ($extra_charge * $charge);//passs
                $stripe_charges = ($both_fees) * $stripePercentage + ($extra_charge);//passs
                $pro_rate_billing = $stripe_charges * ($trainer_fee_with_tax / $both_fees);
                $admin_fee_tax = $admin_fee_with_tax - $admin_fee;
                $trainer_fee_tax = $trainer_fee_with_tax - $trainer_fee;

                $payments = new UserPayments;
                $payments->user_id = $data->id ?? '';
                $payments->session_id = $session->id ?? '';
                $payments->stripe_customer_id = $data->customer_stripe_id ?? '';
                $payments->balance_transaction = '';
                $payments->amount = $trainer_fee ?? '';
                $payments->tax_amount = $trainer_fee_tax ?? '';
                $payments->adminFee = $admin_fee ?? '';
                $payments->total_amount = $final_fees ?? '';
                $payments->adminFeeTax = $admin_fee_tax ?? '';
                $payments->stripe_charges = $stripe_charges ?? '';
                $payments->pro_rate_billing = $pro_rate_billing ?? '';
                $payments->user_type = 'trainee';
                $payments->receipt_url = '';
                $payments->status =  '';
                $payments->charge_id =  '';
                $payments->save();
                TrainingSessions::where('id', $session->id)->update(['payment_id' => $payments->id]);
                DB::commit();
                return 1;

        } catch (Exception $ex) {
            DB::rollback();
            return 0;
        }
    }

    public function refundByCustomerId($customer_id)
    {
        try {

        } catch (Exception $ex) {
        }
    }

    public function refundByChargeId($session_id)
    {
        $charge_id = UserPayments::where('session_id', $session_id)->pluck('charge_id')->first();
        if($charge_id){
            $stripe = new \Stripe\StripeClient(Config::get('services.stripe.secret'));

            $chargeStatus = $stripe->charges->retrieve($charge_id);
            if ($chargeStatus['refunded'] == true) {
                return 2;
            } else {
                 // if ($traingSessionInfo->userPayments && $traingSessionInfo->userPayments->charge_id) {
                    //     $charge_id = $traingSessionInfo->userPayments->charge_id;
                    //     $total_amount = $traingSessionInfo->userPayments->total_amount;
                    //     $customer = \Stripe::refunds()->create($charge_id, $total_amount);
                    //     if ($customer['status'] == 'success') {
                    //         $msg = 'Appointment has been cancelled ';
                    //     }
                    // }
                $response = $stripe->refunds->create([
                    'charge' => $charge_id,
                ]);
                if ($response && isset($response['status']) && $response['status'] = 'succeeded') {
                    UserPayments::where('session_id', $session_id)->update(['status' => 'refunded','payment_status'=>UserPayments::REFUND]);
                    DB::commit();
                    return 1;
                } else {
                    DB::rollback();
                    return 0;
                }
                return 'Amount Refunded';
            }
        }
    }

    public function refund($data)
    {
        DB::beginTransaction();
        try {
            $payment = UserPayments::where('id', $data->payment_id)->first();
            // $session = TrainingSessions::where('payment_id', $data->payment_id)->first();
            // $key = PaymentsSetupCreads::where('user_id',$session->trainer_id)->where('user_type','trainer')->first();
            $stripe = new \Stripe\StripeClient(Config::get('services.stripe.secret'));
            $response = $stripe->refunds->create([
                'charge' => $payment->charge_id,
            ]);
            if ($response && isset($response['status']) && $response['status'] = 'succeeded') {
                UserPayments::where('id', $data->payment_id)->update(['status' => 'refunded']);
                DB::commit();
                return 1;
            } else {
                DB::rollback();
                return 0;
            }
        } catch (Exception $ex) {
            DB::rollback();
            return 0;
        }
    }

    public function saveStripeApiKey($input)
    {
        $stripe = Stripe::setApiKey($input['stripe_key']);
        try {
            $token = $stripe->tokens()->create([
                'card' => [
                    'number' => '4242424242424242',
                    'exp_month' => '05',
                    'exp_year' => '2025',
                    'cvc' => '123',
                ],
            ]);

        } catch (\Throwable $e) {
            $error = $e->getMessage();
            $error = explode(':', $error);
            return back()->with('error', $error[0]);
        }

        DB::beginTransaction();
        try {
            $check = PaymentsSetupCreads::where('user_id', Auth::user()->id)->where('user_type', $input['user_type'])->first();
            if (empty($check)) {
                $paymentssetupcreads = new PaymentsSetupCreads ();
                $paymentssetupcreads->user_id = Auth::user()->id;
                $paymentssetupcreads->user_type = $input['user_type'];
                $paymentssetupcreads->stripe_key = $input['stripe_key'];
                $paymentssetupcreads->stripe_account_no = $stripe_account_no;
                $paymentssetupcreads->banck_account = $bAc->account;
                $paymentssetupcreads->ba = $bAc['id'];
                $paymentssetupcreads->save();
            } else {
                PaymentsSetupCreads::where('user_id', Auth::user()->id)
                    ->where('user_type', $input['user_type'])
                    ->update(['stripe_key' => $input['stripe_key'],
                        'stripe_account_no' => $stripe_account_no,
                        'banck_account' => $bAc['account'],
                        'ba' => $bAc['id']
                    ]);
            }
            DB::commit();
            return back()->with('success', 'Saved');
        } catch (Exception $ex) {
            DB::rollback();
            return back()->with('error', $ex->getMessage());
        }
    }

    public function retrieveAccount( $account_id = '' ) {
        try {
            $KEY = Config::get('services.stripe.secret');
            $stripe = new \Stripe\StripeClient(Config::get('services.stripe.secret'));

            if( !empty( $stripe) )
                return $stripe->accounts->retrieve($account_id);

        } catch (\Throwable $e) {
            $response = [
                'status' => 'error',
                'code' => 404,
                'message' => $e->getMessage(),
            ];
            return $response;
        }

    }

    public function retrieveBalance( $account_id = '' ) {
        try {
            $KEY = Config::get('services.stripe.secret');
            \Stripe\Stripe::setApiKey($KEY);
            $response = \Stripe\Balance::retrieve(
                ['stripe_account' => $account_id]
            );

        } catch (\Throwable $e) {
            $response = [
                'status' => 'error',
                'code' => 404,
                'message' => $e->getMessage(),
            ];

        }
        return $response;
    }

    public function retrieveExternaAccount( $account = '' ) {

        $KEY    =   Config::get('services.stripe.secret');
        $stripe =   new \Stripe\StripeClient(Config::get('services.stripe.secret'));
        try {
            $response = $stripe->accounts->retrieveExternalAccount(
                $account->id,
                $account->external_accounts->data[0]->id,
                []
            );

        } catch (\Throwable $e) {
            $response = [
                'status' => 'error',
                'code' => 404,
                'message' => $e->getMessage(),
            ];

        }
        return $response;
    }
}
