<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

/**
 * Class Cities
 * @package App\Models
 * @version December 03, 2021, 4:07 pm UTC
 *
 * @property string $name
 * @property string $code
 */
class Cities extends Model
{
    public $table = 'cities';
}