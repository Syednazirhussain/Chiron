<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class Rates extends Model
{
    public $table = 'charges';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    public $fillable = [
        'location',
        'user_type',
        'one_on_1_training_charge',
        'two_on_1_training_charge',
        'one_on_1_training_charge_sales_tax',
        'two_on_1_training_charge_sales_tax',
    ];

//
    public function countries()
    {
       return $this->hasOne(Countries::class, 'id', 'location');
    }
}
