<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model as Model;

/**
 * Class PaymentsSetupCreads
 * @package App\Models
 * @version December 08, 2021, 2:09pm UTC
 *
 * @property string $name
 */
class PaymentsSetupCreads extends Model
{
    public $table = 'payments_setup_creads';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public $fillable = [
        'user_id',
        'user_type',
        'stripe_key'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
}
