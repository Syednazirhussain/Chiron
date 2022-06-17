<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

/**
 * Class States
 * @package App\Models
 * @version December 03, 2021, 4:07 pm UTC
 *
 * @property string $name
 * @property string $code
 */
class State extends Model
{
    public $table = 'states';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}