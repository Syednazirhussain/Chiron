<?php

namespace App\Repositories;

use App\Models\Promotions_send;
use App\Repositories\BaseRepository;

/**
 * Class Promotions_sendRepository
 * @package App\Repositories
 * @version March 9, 2022, 5:49 am UTC
*/

class Promotions_sendRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'promotions_id',
        'user_id',
        'status'
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
        return Promotions_send::class;
    }
}
