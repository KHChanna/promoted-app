<?php

namespace App\Frontend\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Category extends Model
{
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

    private $url = 'https://shop.ganzberg.com/uploads/images/categories';

    /**
     * 
     */
    public function getListofCategory(){
        $categories = Category::where('is_active', 1)->select('categories.*',
                    DB::raw('CONCAT("'.$this->url.'/", categories.image_name) AS image_name'))
                    ->get();
        return $categories;
    }
}
