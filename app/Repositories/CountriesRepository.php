<?php

namespace App\Repositories;

use App\Models\Countries;

/**
 * Class CountriesRepository
 * @package App\Repositories
 * @version October 7, 2021, 3:43 pm UTC
*/

class CountriesRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'code'
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
        return Countries::class;
    }

    public function index () {

    }

    public function edit ($id) {

    }

    public function store ($data = []) {

    }

    public function update ($id, $data = []) {

    }

    public function delete ($id) {

    }


}
