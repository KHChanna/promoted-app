<?php

namespace App\Frontend\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Product extends Model
{
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

    //url image
    private $url = 'https://shop.ganzberg.com/uploads/images/products';


    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    public function images()
    {
          return $this->hasMany('App\Frontend\Models\ProductImage');
    }

    /**
     * 
     */
    public function getListofProduct(){
      
            $result = DB::table('products')
            ->leftJoin('product_images as pi', 'products.id', '=', 'pi.product_id')
            ->join('units as u', 'products.unit_id', '=', 'u.id')
            ->select('products.*', 'u.name as unit_name', DB::raw('CONCAT("'.$this->url.'/", pi.image_name) AS image_name'))
            ->where('is_active', 1)
            ->get();
            
            return $result;
        
    } // EOF

    /**
     *
     */
    public function getDetailofProduct($product_id){
        $result = DB::table('products')
                ->leftJoin('product_images as pi', 'products.id', '=', 'pi.product_id')
                ->leftJoin('categories as cat', 'cat.id', '=', 'products.category_id')
                ->join('units as u', 'products.unit_id', '=', 'u.id')
                ->where('products.id', $product_id)
                ->select('products.*','cat.default_name', 'u.name as unit_name', DB::raw('CONCAT("'.$this->url.'/", pi.image_name) AS image_name'))
                ->first();

        return $result;
    } // EOF

    /**
     *
     */
    public function getPromotedProducts() {
        $result = DB::table('products')
                ->leftJoin('product_images as pi', 'products.id', '=', 'pi.product_id')
                ->join('units as u', 'products.unit_id', '=', 'u.id')
                ->where('is_promoted', 1)
                ->select('products.*', 'u.name as unit_name', DB::raw('CONCAT("'.$this->url.'/", pi.image_name) AS image_name'))
                ->take(4)
                ->get();

        return $result;
    }

    public function getNewofProduct(){
        $result = DB::table('products')
        ->leftJoin('product_images as pi', 'products.id', '=', 'pi.product_id')
        ->join('units as u', 'products.unit_id', '=', 'u.id')
        ->select('products.*', 'u.name as unit_name', DB::raw('CONCAT("'.$this->url.'/", pi.image_name) AS image_name'))
        ->orderBy('id', 'DESC')->take(4)
        ->get();

        return $result;
    }

    /**
     * Search product by name
     */
    public function getProductByName($name){
        return DB::table('products')
        ->leftJoin('product_images as pi', 'products.id', '=', 'pi.product_id')
        ->select('products.*', 'u.name as unit_name', DB::raw('CONCAT("'.$this->url.'/", pi.image_name) AS image_name'))
        ->where('products.is_active', 1)
        ->where('products.name', 'like', '%'.$name.'%')
        ->get();
    }

    /**
     * Get products relation category
     */
    public function getProductsByCategory($category_id){
        return Products::with('categories')
        ->leftJoin('product_images as pi', 'products.id', '=', 'pi.product_id')
        ->select('products.*', 'u.name as unit_name', DB::raw('CONCAT("'.$this->url.'/", pi.image_name) AS image_name'))
        ->where('category_id', $category_id)
        ->orderBy('name')
        ->get();
    }


}
