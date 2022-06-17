<?php

namespace App\Repositories;

use App\Models\TransferPayment;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use DB;
use Carbon\Carbon;
use Redirect;

/**
 * Class UsersRepository
 * @package App\Repositories
 * @version October 7, 2021, 4:28 pm UTC
 */
class TransferPayments extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'email',
        'email_verified_at',
        'password',
        'remember_token',
        'dob',
        'role_id'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return TransferPayment::class;
    }

    public function addTransferredPayment($request)
    {
        $transfer = new $this->model;
        $transfer->transfer_id          =   $request->transfer['id'];
        $transfer->transferred_to       =   decryptData($request->trainer_id);
        $transfer->transferred_by       =   Auth::user()->id ?? 0;
        $transfer->session_id           =   $request->session_id;
        $transfer->amount               =   $request->transfer['amount']/100;
        $transfer->currency             =   $request->transfer['currency'];
        $transfer->balance_transaction  =   $request->transfer['balance_transaction'];
        $transfer->destination          =   $request->transfer['destination'];
        $transfer->destination_payment  =   $request->transfer['destination_payment'];
        $transfer->source_type          =   $request->transfer['source_type'];
        $transfer->transfer_group       =   $request->transfer['transfer_group'];
        $transfer->transfer_date        =   $request->transfer['created'];
        $transfer->status               =   !empty($request->transfer['id']) ? 'completed' : 'pending';
        $transfer->save();
        return $transfer;
    }

    public function getTransferHistory() {
        return $this->model::with('transferredTo','transferredBy')->get();
       
    }

    
}
