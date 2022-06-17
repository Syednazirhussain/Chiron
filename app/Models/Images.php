<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class Images extends Model
{
    public $table = 'images';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public $fillable = [
        'user_id',
        'user_type',
        'source_type',
        'document_type',
        'source'
    ];
}