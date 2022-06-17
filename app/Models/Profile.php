<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class Profile extends Model
{
    public $table = 'profiles';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public $fillable = [
        'user_id',
        'user_type',
        'about',
        'specialties',
        'insta',
        'teitter',
        'facebook'
    ];

    public function getSessionTimings()
    {
        return $this->hasMany(\App\Models\SessionTiming::class, 'user_id', 'user_id')->where('user_type','trainer');
    }
}
