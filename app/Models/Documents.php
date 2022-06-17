<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model as Model;

/**
 * Class Documents
 * @package App\Models
 * @version October 26, 2021, 8:45pm UTC
 *
 * @property string $name
 */
class Documents extends Model
{
    public $table = 'documents';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'user_type',
        'source',
        'source_type',
        'document_type',
        'status'
    ];

}
