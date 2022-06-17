<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;



/**
 * Class Currency
 * @package App\Models
 * @version October 7, 2021, 3:44 pm UTC
 *
 * @property integer $country_id
 * @property string $name
 */
class Currency extends Model
{


    public $table = 'currency';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'country_id',
        'name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'country_id' => 'integer',
        'name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'country_id' => 'required|integer',
        'name' => 'required|string|max:191'
    ];

    
}
