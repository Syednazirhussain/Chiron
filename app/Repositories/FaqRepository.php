<?php

namespace App\Repositories;

use App\Models\Faq;
use App\Repositories\BaseRepository;

/**
 * Class FaqRepository
 * @package App\Repositories
 * @version February 10, 2022, 11:47 am UTC
*/

class FaqRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'description',
        'type',
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
        return Faq::class;
    }

    public function typeGeneral(){
        return $this->model->where('type','general')->get();
    }
    public function typeTrainer(){
        return $this->model->where('type','Trainer')->get();
    }
    public function typeUser(){
        return $this->model->where('type','User')->get();
    }

}
