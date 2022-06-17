<?php

namespace App\Repositories;

use App\Models\Currency;

/**
 * Class CurrencyRepository
 * @package App\Repositories
 * @version October 7, 2021, 3:44 pm UTC
*/

class CurrencyRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'country_id',
        'name'
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
        return Currency::class;
    }
}
