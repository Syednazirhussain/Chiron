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
class CmsPages extends Model
{
    public $table = 'cms_pages';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public $fillable = [
        'page_title',
        'page_body'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */    
}
