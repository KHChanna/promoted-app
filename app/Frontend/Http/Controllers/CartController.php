<?php

namespace App\Frontend\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Frontend\Models\Product;
use App\Frontend\Models\ShoppingCart;
use Illuminate\Support\Facades\Auth;
use Cart;

class CartController extends Controller
{
    //search products
    public function index()
    {
        if(Auth::user()){
            $userId = auth()->user()->id; // or any string represents user identifier
            $carts = Cart::session($userId)->getContent();
        } else{
            //get cart guest user
            $carts = $carts = Cart::getContent();
        }
        
        return view('frontend::carts.cart', compact('carts'));
    }

    public function addCart($id){
        $products = new Product;
        $shoppingCarts = new ShoppingCart;
            if(Auth::user()){
                $userId = auth()->user()->id; // or any string represents user identifier

                // add cart items to a specific user
                $product = $products->getDetailofProduct($id);
                
                $cart = Cart::session($userId)->add($product->id, $product->name, $product->sale_price, 1,[
                    'image' => $product->image_name
                ]);
                $carts = Cart::session($userId)->getContent();

                $identifier = ShoppingCart::where('identifier', $userId)->first();
                if($identifier == null){
                    // store to shopping cart table
                    $shoppingCarts->identifier = Auth::user()->id;
                    $shoppingCarts->instance = 'shopping carts';
                    $shoppingCarts->content = serialize($carts);
                    $shoppingCarts->save();
                } else {
                    ShoppingCart::where('identifier', 17)->update(['content'=> serialize($carts)]);
                }
                
                return redirect('/cart');
            } else {
                $product = $products->getDetailofProduct($id);
                Cart::add($product->id, $product->name, $product->sale_price, 1,[
                    'image' => $product->image_name
                ]);
                return redirect('/cart');
            }
        
    }

    /**
     * Update item in cart by id
     */
    public function updateCart($id, $qty){
        return $id;
        $products = new Product;
        $userId = auth()->user()->id; // or any string represents user identifier

        // add cart items to a specific user
        Cart::session($userId)->update($product->id, $product->name, $product->sale_price, $qty,[
            'image' => $product->image_name
        ]);

    }
    /**
     * Remove item by id
     */
    public function removeCart($id){
        if(Auth::user()){
            $userId = auth()->user()->id; // or any string represents user identifier
            Cart::session($userId)->remove($id);
            $carts = Cart::session($userId)->getContent();
            ShoppingCart::where('identifier', 17)->update(['content'=> serialize($carts)]);
            return redirect('/cart');
        } else{
            Cart::remove($id);
            return redirect('/cart');
        }   
    }

    /**
     * Remove all Item in Cart
     */
    public function clearCart(){
        $userId = auth()->user()->id; // or any string represents user identifier;
        Cart::session($userId)->clear($userId);
        return 'all clears';
        
    }
}
