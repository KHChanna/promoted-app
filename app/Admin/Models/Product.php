<?php

namespace App\Admin\Models;

use Eloquent as Model;

/**
 * Class Product
 * @package App\Admin\Models
 * @version August 5, 2019, 10:48 pm UTC
 *
 * @property string name
 * @property float unit_price
 * @property float sale_price
 * @property string description
 * @property integer unit_id
 * @property integer category_id
 * @property integer is_active
 * @property integer is_promoted
 */
class Product extends Model
{

    public $table = 'products';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';



    public $fillable = [
        'name',
        'unit_price',
        'sale_price',
        'description',
        'unit_id',
        'category_id',
        'is_active',
        'is_promoted'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'unit_price' => 'float',
        'sale_price' => 'float',
        'description' => 'string',
        'unit_id' => 'integer',
        'category_id' => 'integer',
        'is_active' => 'integer',
        'is_promoted' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'unit_price' => 'required',
        'sale_price' => 'required',
        'description' => 'required',
        'unit_id' => 'required',
        'category_id' => 'required',
        'is_active' => 'required',
        'is_promoted' => 'required'
    ];


    public function images()
    {
          return $this->hasMany('App\Admin\Models\ProductImage');
    }



}
