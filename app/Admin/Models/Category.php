<?php

namespace App\Admin\Models;

use Eloquent as Model;

/**
 * Class Category
 * @package App\Admin\Models
 * @version August 9, 2019, 4:25 pm UTC
 *
 * @property integer parent_id
 * @property integer lft
 * @property integer rgt
 * @property integer depth
 * @property string default_name
 * @property string slug
 * @property integer order
 * @property string image_name
 * @property boolean is_active
 */
class Category extends Model
{

    public $table = 'categories';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';



    public $fillable = [
        'parent_id',
        'lft',
        'rgt',
        'depth',
        'default_name',
        'slug',
        'order',
        'image_name',
        'is_active'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'parent_id' => 'integer',
        //'lft' => 'integer',
        //'rgt' => 'integer',
        //'depth' => 'integer',
        'default_name' => 'string',
        'slug' => 'string',
        'order' => 'integer',
        'image_name' => 'string',
        'is_active' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'parent_id' => 'required',
        //'lft' => 'required',
        //'rgt' => 'required',
        //'depth' => 'required',
        'default_name' => 'required',
        'slug' => 'required',
        'order' => 'required',
        'image_name' => 'nullable|image|mimes:jpg,jpeg,png|max:5000',
        'is_active' => 'required'
    ];


}
