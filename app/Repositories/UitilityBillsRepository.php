<?php

namespace App\Repositories;

use App\Models\UitilityBills;

/**
 * Class UitilityBillsRepository
 * @package App\Repositories
 * @version October 7, 2021, 3:48 pm UTC
*/

class UitilityBillsRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'bill_type_id',
        'user_id',
        'bill_document_url'
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
        return UitilityBills::class;
    }
}
