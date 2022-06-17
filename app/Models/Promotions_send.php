<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;



/**
 * Class Promotions_send
 * @package App\Models
 * @version March 9, 2022, 5:49 am UTC
 *
 * @property string $promotions_id
 * @property string $user_id
 * @property string $status
 */
class Promotions_send extends Model
{


    public $table = 'promotions_send';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'promotions_id',
        'user_id',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'promotions_id' => 'string',
        'user_id' => 'string',
        'status' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'promotions_id' => 'nullable|string|max:255',
        'user_id' => 'nullable|string|max:255',
        'status' => 'required|string'
    ];

    
}
