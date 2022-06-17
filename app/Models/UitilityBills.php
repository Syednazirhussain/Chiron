<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;



/**
 * Class UitilityBills
 * @package App\Models
 * @version October 7, 2021, 3:48 pm UTC
 *
 * @property integer $bill_type_id
 * @property integer $user_id
 * @property string $bill_document_url
 */
class UitilityBills extends Model
{


    public $table = 'utility_bill';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'bill_type_id',
        'user_id',
        'bill_document_url'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'bill_type_id' => 'integer',
        'user_id' => 'integer',
        'bill_document_url' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'bill_type_id' => 'nullable|integer',
        'user_id' => 'nullable|integer',
        'bill_document_url' => 'nullable|string'
    ];

    
}
