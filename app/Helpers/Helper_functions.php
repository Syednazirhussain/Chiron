<?php

use Carbon\Carbon;
use Laravel\Cashier\Tax;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use App\Models\UserPayments;
use App\Models\TrainingSessions;
use Illuminate\Support\Facades\DB;


if (!function_exists('encryptData')) {
    function encryptData($string)
    {
        return Crypt::encryptString($string);
    }
}

if (!function_exists('decryptData')) {
    function decryptData($string)
    {
        return Crypt::decryptString($string);
    }
}

if (!function_exists('convertUnix')) {
    function convertUnix($date)
    {
        $date = Carbon::createFromTimestamp($date)->format('M d, Y h:i:s');

        return $date;
    }
}

if (!function_exists('compare_date')) {
    function compare_date($created_date, $completed_at)
    {
        $created_date = Carbon::parse($created_date);
        $completed_at = Carbon::parse($completed_at);
        $result = $created_date->diffInDays($completed_at, false);
        return $result;
    }
}

if (!function_exists('trainer_fees')) {
    function trainer_fees($user, $type,$_tax=false)
    {
        $total = 0;
        $tax = config('constants.rates.sales_tax');

        if ($user->getAddress->getRatesForTrainer) {
            $total += $user->getAddress->getRatesForTrainer[$type];
        }
        if($_tax){
            $total = addtax($total, $tax);
        }
        return sprintf('%0.2f', $total);
    }
}
if (!function_exists('admin_fees')) {
    function admin_fees($user, $type,$_tax=false)
    {
        $total = 0;
        $tax = config('constants.rates.sales_tax');

        if ($user->getAddress->getRatesForLocation) {
            $total += $user->getAddress->getRatesForLocation[$type];
        }
        if($_tax){
            $total = addtax($total, $tax);
        }
        return sprintf('%0.2f', $total);
    }
}
if (!function_exists('get_price_by_location')) {
    function get_price_by_location($user, $type ,$rate_pops=false,$with_out_tax=false)
    {
        $total = 0;
        if ($user->getAddress->getRatesForLocation) {
            $total += $user->getAddress->getRatesForLocation[$type];
        }
        if ($user->getAddress->getRatesForTrainer) {
            $total += $user->getAddress->getRatesForTrainer[$type];
        }
        if(!$total){
            return false;
        }
        
        if($rate_pops==true){

            if($with_out_tax==true) return sprintf('%0.2f', $total);
            
        $tax = config('constants.rates.sales_tax');
      
        $totalwithTax = addtax($total, $tax) ;
        return sprintf('%0.2f', $totalwithTax);

        }

        $tax = config('constants.rates.sales_tax');
        $extra_charges = config('constants.rates.extra_charge');
        $stripe_fee = config('constants.rates.stripe_fee');
        // $totalwithTax = addtax($total, $tax) + $extra_charges * ( $type == 'one_on_1_training_charge' ? 1 : 2 );
        $totalwithTax = addtax($total, $tax) + $extra_charges;
        $total_fees =   $totalwithTax + ($totalwithTax * $stripe_fee / 100);
        return sprintf('%0.2f', $total_fees);
    }
}
if (!function_exists('addtax')) {
    function addtax($amount, $tax = 0)
    {
        if ($tax) {
            $num = $amount;
            $percentage = $tax;
            $num += $num * ($percentage / 100);
            // $num = round($num, 1);      // 4
            $num = sprintf('%0.2f', $num);
            return $num;
        }

        return 0;
    }
}
if (!function_exists('ddf')) {
    function ddf($data)
    {
        echo "<pre>";
        print_r($data);
        die;
    }
}
if (!function_exists('trainer_earning')) {
    function trainer_earning($payment)
    {
        $total_fees = ($payment->amount+$payment->tax_amount) - $payment->pro_rate_billing;
        return sprintf('%0.2f', $total_fees);
    }
}
if (!function_exists('append_zero')) {
    function append_zero($num,$format)
    {
        return sprintf("%0".$format."d", $num);
    }
}
if (!function_exists('imagePath')) {
    function imagePath($storage,$path)
    {
        $default = '';
        if (File::exists($storage.$path)) {
            return asset($storage.$path);
        }

        return $default;
    }
}
if (!function_exists('file_extension')) {
    function file_extension($filename)
    {
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        return $ext;
    }
}

if (!function_exists('pendingAmount')) {
    function pendingAmount($trainer_id)
    {
        $builder = \DB::table('user_payments')->select(
            \DB::raw('SUM(user_payments.amount) + SUM(user_payments.tax_amount) -SUM(user_payments.pro_rate_billing) as rAmount' ))
            ->join('training_sessions','training_sessions.id','user_payments.session_id')
        ->where('training_sessions.trainer_id',$trainer_id)
        ->whereRaw('DATEDIFF( training_sessions.activation_date, now() ) <= 0')
        ->where('training_sessions.transfer_id',NULL)
        ->first();

        return $builder;
    }
}

if (!function_exists('pAmount')) {
    function pAmount($trainer_id)
    {
        $builder = \DB::table('transfer_payments')->select(
            \DB::raw('SUM(transfer_payments.amount) as pAmount' ))
            // ->join('training_sessions','training_sessions.id','user_payments.session_id')
        ->where('transfer_payments.transferred_to',$trainer_id)
        // ->whereRaw('DATEDIFF( training_sessions.activation_date, now() ) <= 0')
        // ->where('training_sessions.transfer_id',NULL)
        ->first();

        return $builder;
    }
}

if (!function_exists('totalAmount')) {
    function totalAmount($trainer_id)
    {
        $builder = \DB::table('user_payments')->select(
            \DB::raw('SUM(user_payments.amount)+SUM(user_payments.tax_amount) -SUM(user_payments.pro_rate_billing) as totalAmount' ))
            // ->join('training_sessions','training_sessions.id','user_payments.session_id')
        // ->where('user_payments.transferred_to',$trainer_id)
        // ->whereRaw('DATEDIFF( training_sessions.activation_date, now() ) <= 0')
        // ->where('training_sessions.transfer_id',NULL)
        ->first();

        return $builder;
    }
}

