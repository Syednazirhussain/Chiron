<?php

namespace App\Repositories;

use App\Models\Cities;

/**
 * Class CitiesRepository
 * @package App\Repositories
 * @version October 7, 2021, 3:43 pm UTC
*/

class CitiesRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'country_id'
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
        return Cities::class;
    }
}
