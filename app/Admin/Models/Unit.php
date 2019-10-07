<?php

namespace App\Admin\Models;

use Eloquent as Model;

/**
 * Class Unit
 * @package App\Admin\Models
 * @version August 19, 2019, 3:49 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection unitTranslations
 * @property string name
 */
class Unit extends Model
{

    public $table = 'units';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';



    public $fillable = [
        'name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function unitTranslations()
    {
        return $this->hasMany(\App\Admin\Models\UnitTranslation::class);
    }
}
