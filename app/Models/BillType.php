<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;



/**
 * Class BillType
 * @package App\Models
 * @version October 7, 2021, 3:45 pm UTC
 *
 * @property string $name
 */
class BillType extends Model
{


    public $table = 'bill_type';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'nullable|string|max:191'
    ];

    
}
