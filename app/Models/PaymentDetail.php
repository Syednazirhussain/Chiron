<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;



/**
 * Class PaymentDetail
 * @package App\Models
 * @version October 7, 2021, 3:47 pm UTC
 *
 * @property integer $payment_method_id
 * @property integer $user_id
 * @property integer $payment_recieving_user_id
 * @property integer $amount
 * @property string $payment_details
 * @property integer $currency_id
 */
class PaymentDetail extends Model
{


    public $table = 'payment_details';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'payment_method_id',
        'user_id',
        'payment_recieving_user_id',
        'amount',
        'payment_details',
        'currency_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'payment_method_id' => 'integer',
        'user_id' => 'integer',
        'payment_recieving_user_id' => 'integer',
        'amount' => 'integer',
        'payment_details' => 'string',
        'currency_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'payment_method_id' => 'required|integer',
        'user_id' => 'required|integer',
        'payment_recieving_user_id' => 'required|integer',
        'amount' => 'required|integer',
        'payment_details' => 'nullable|string|max:255',
        'currency_id' => 'required|integer'
    ];

    
}
