<?php

namespace App\Repositories;

use App\Models\BillType;

/**
 * Class BillTypeRepository
 * @package App\Repositories
 * @version October 7, 2021, 3:45 pm UTC
*/

class BillTypeRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
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
        return BillType::class;
    }
}
