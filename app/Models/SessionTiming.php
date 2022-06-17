<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model as Model;

class SessionTiming extends Model
{
    public $table = 'sessions_timings';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public $fillable = [
        'user_id',
        'user_type',
        'day',
        'time',
    ];
}
