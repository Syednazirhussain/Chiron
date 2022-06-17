<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;



/**
 * Class Faq
 * @package App\Models
 * @version February 10, 2022, 11:47 am UTC
 *
 * @property string $title
 * @property string $description
 * @property string $type
 * @property string $status
 */
class Faq extends Model
{


    public $table = 'faq_questions';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'title',
        'description',
        'type',
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
        'description' => 'string',
        'type' => 'string',
        'status' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'nullable|string|max:255',
        'description' => 'nullable|string',
        'type' => 'nullable|string',
        'status' => 'required|string'
    ];

    
}
