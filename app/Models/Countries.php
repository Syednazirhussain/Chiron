<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

/**
 * Class Countries
 * @package App\Models
 * @version October 27, 2021, 3:43 pm UTC
 *
 * @property string $name
 * @property string $code
 */
class Countries extends Model
{
    public $table = 'countries';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */


    function Rates()
    {
        return $this->hasOne(Rates::class, 'location', 'id');
    }
}
