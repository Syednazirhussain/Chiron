<?php

namespace App\Repositories;

use App\Models\Howitworks;
use App\Repositories\BaseRepository;

/**
 * Class HowitworksRepository
 * @package App\Repositories
 * @version February 11, 2022, 10:15 am UTC
 */
class HowitworksRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'file',
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
        return Howitworks::class;
    }


    public function getTrainerComments()
    {
        return $this->model->where('type', 'Trainer')->get();
    }

    public function getUserComments()
    {
        return $this->model->where('type', 'User')->get();
    }
}
