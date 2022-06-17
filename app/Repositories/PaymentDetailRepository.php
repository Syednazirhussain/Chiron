<?php

namespace App\Repositories;

use App\Models\PaymentDetail;

/**
 * Class PaymentDetailRepository
 * @package App\Repositories
 * @version October 7, 2021, 3:47 pm UTC
*/

class PaymentDetailRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'payment_method_id',
        'user_id',
        'payment_recieving_user_id',
        'amount',
        'payment_details',
        'currency_id'
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
        return PaymentDetail::class;
    }
}
