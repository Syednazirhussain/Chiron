<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class UserPayments extends Model
{

    public $table = 'user_payments';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    public const PAID = 'Paid';
    public const UNPAID = 'Unpaid';
    public const REFUND = 'Refund';

    public $fillable = [
        'user_id',
        'session_id',
        'stripe_customer_id',
        'amount',
        'tax_amount',
        'user_type',
        'stripe_payment_response',
        'receipt_url',
        'status',
        'pro_rate_billing',
        'charge_id',
        'stripe_charges',
        'adminFeeTax',
        'adminFee',
        'total_amount',
        'balance_transaction'
    ];
}
