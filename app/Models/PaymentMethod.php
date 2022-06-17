<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;



/**
 * Class PaymentMethod
 * @package App\Models
 * @version October 7, 2021, 3:46 pm UTC
 *
 * @property string $name
 * @property string $icon
 */
class PaymentMethod extends Model
{


    public $table = 'payment_methods';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'name',
        'icon'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'icon' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|string|max:191',
        'icon' => 'nullable|string'
    ];

    
}
