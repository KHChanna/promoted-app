<?php

namespace App\Admin\Models;

use Eloquent as Model;

/**
 * Class Shop
 * @package App\Admin\Models
 * @version September 26, 2019, 1:45 pm UTC
 *
 * @property integer user_id
 * @property integer supplier_id
 * @property string name
 * @property string about
 * @property string logo_image
 * @property string cover_image
 * @property string phone
 * @property integer country_id
 * @property integer city_province_id
 * @property integer district_id
 * @property string address
 * @property float lat
 * @property float lng
 * @property integer membership_id
 * @property boolean is_active
 * @property boolean status
 */
class Shop extends Model
{

    public $table = 'shops';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';



    public $fillable = [
        'user_id',
        'supplier_id',
        'name',
        'about',
        'logo_image',
        'cover_image',
        'phone',
        'country_id',
        'city_province_id',
        'district_id',
        'address',
        'lat',
        'lng',
        'membership_id',
        'is_active',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'supplier_id' => 'integer',
        'name' => 'string',
        'about' => 'string',
        'logo_image' => 'string',
        'cover_image' => 'string',
        'phone' => 'string',
        'country_id' => 'integer',
        'city_province_id' => 'integer',
        'district_id' => 'integer',
        'address' => 'string',
        'lat' => 'float',
        'lng' => 'float',
        'membership_id' => 'integer',
        'is_active' => 'boolean',
        'status' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'user_id' => 'required',
        'supplier_id' => 'required',
        'name' => 'required',
        'phone' => 'required',
        'country_id' => 'required',
        'city_province_id' => 'required',
        'district_id' => 'required',
        'membership_id' => 'required',
        'is_active' => 'required',
        'status' => 'required'
    ];

    
}
