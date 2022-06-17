<?php

namespace App\Repositories;

use App\Models\CmsPages;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;

//use Your Model

/**
 * Class CmsPagesRepository.
 */
class CmsPagesRepository extends BaseRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return CmsPages::class;
    }

    public function cms_about()
    {
        return $this->model->where('page_title', 'About')->first();
    }

    public function cms_mission()
    {
        return $this->model->where('page_title', 'Mission')->first();
    }

    public function cms_contact()
    {
        return $this->model->where('page_title', 'Contact')->first();
    }

}
