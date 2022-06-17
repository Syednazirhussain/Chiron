<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;



/**
 * Class Howitworks
 * @package App\Models
 * @version February 11, 2022, 10:15 am UTC
 *
 * @property string $title
 * @property string $file
 * @property string $description
 * @property string $type
 * @property string $status
 */
class Howitworks extends Model
{


    public $table = 'howitworks';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'title',
        'file',
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
        'file' => 'string',
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
        'file' => 'nullable|mimes:jpeg,jpg,png|max:2048',
        'description' => 'nullable|string',
        'type' => 'required|string',
        'status' => 'required|string'
    ];


}
