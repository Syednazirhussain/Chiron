<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model as Model;

/**
 * Class Address
 * @package App\Models
 * @version October 26, 2021, 8:43pm UTC
 *
 * @property string $name
 */
class Address extends Model
{
    public $table = 'address';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public $fillable = [
        'user_id',
        'profile_pic',
        'address',
        'country_id',
        'postal_code',
        'location',
        'training_session',
        'status',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */

    public function getCountry()
    {
        return $this->hasOne(\App\Models\Countries::class, 'id', 'country_id');
    }
    public function getState()
    {
        return $this->hasOne(\App\Models\State::class, 'id', 'state_id');
    }
    public function getCity()
    {
        return $this->hasOne(\App\Models\Cities::class, 'id', 'city_id');
    }
    public function getLocationRates()
    {
        return $this->hasOne(\App\Models\Rates::class,'location','country_id');
    }
    public function getRatesForLocation()
    {
        return $this->hasOne(\App\Models\Rates::class,'location','country_id')
            ->where('user_type','=','for_admin');
    }
    public function getRatesForTrainer()
    {
        return $this->hasOne(\App\Models\Rates::class,'location','country_id')
            ->where('user_type','=','for_trainer');
    }
}
