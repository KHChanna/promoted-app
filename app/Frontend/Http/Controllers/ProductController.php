<?php

namespace App\Frontend\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{

    //search products
    public function index()
    {

        // $products = new Product;
        // $products = $products->getListofProduct();
        return view('frontend::products.search');

    }



    //product details
    public function show($id)
    {

        // $products = new Product;
        // $product = $products->getDetailofProduct($id);

        return view('frontend::products.show');

    }



}
