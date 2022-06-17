<?php

namespace App\Repositories;

use App\Models\Roles;

/**
 * Class RolesRepository
 * @package App\Repositories
 * @version October 7, 2021, 3:40 pm UTC
*/

class RolesRepository
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
        return Roles::class;
    }
}
