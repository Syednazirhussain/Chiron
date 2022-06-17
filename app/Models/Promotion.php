<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;



/**
 * Class Promotion
 * @package App\Models
 * @version March 9, 2022, 5:50 am UTC
 *
 * @property string $title
 * @property string $content
 * @property string $status
 */
class Promotion extends Model
{


    public $table = 'promotions';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'title',
        'content',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'title' => 'string',
        'content' => 'string',
        'status' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'nullable|string|max:255',
        'content' => 'nullable|string',
        'status' => 'nullable|string'
    ];

    
}
