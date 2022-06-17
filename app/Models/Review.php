<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

/**
 * Class Review
 * @package App\Models
 * @version December 15, 2021, 7:05 pm UTC
 *
 */
class Review extends Model {
    public $table = 'reviews';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public function traineeNames()
    {
        return $this->hasMany(\App\Models\User::class, 'id', 'user_id');
    }
}
