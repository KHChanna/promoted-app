<?php

namespace App\Frontend\Http\Controllers;

use Illuminate\Http\Request;
use App\Frontend\Models\Product;
use GuzzleHttp\Client;
use App\Frontend\Models\Banner;
use App\Frontend\Models\Category;
use App\Frontend\Models\ShoppingCart;
use Illuminate\Support\Facades\Auth;
use Cart;

class HomeController extends Controller
{
    //
    private $url = 'https://shop.ganzberg.com/uploads/images/products';


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $product = new Product;
        $category = new Category;
        // $banner = new Banner;

        $data = [
            'random_products' => $product->getListofProduct(),
            'promoted_products' => $product->getPromotedProducts(),
            'new_products' => $product->getNewofProduct(),
            'categories' => $category->getListofCategory(),
            // 'banners' => $banner->getActiveBannerList()
        ];
        if(Auth::user()){
            $userId = auth()->user()->id; // or any string represents user identifier
            $contents = ShoppingCart::where('identifier', $userId)->first();
            if($contents != null){
                // return $content;
                $cartItems = unserialize($contents->content);
                $items = Cart::session($userId)->getContent();
                if(!count($items) > 0){
                    foreach ($cartItems as $item){
                        Cart::session($userId)->add([
                            'id' => $item->id,
                            'name' => $item->name,
                            'price' => $item->price,
                            'quantity' => $item->quantity,
                            'attributes' => [
                                'image' => $item->attributes->image
                            ]
                        ]);
                    }
                }
            }
            
        }
        // return $product;
        return view('frontend::home')->with(['data' => $data]);
    }

    /**
     * Get Home API
     */
    public function Home(){
        $headers = [
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6ImYzODRlN2E2YmEzYTBhODQ4ZmY5OThkZWRlMmIxNWYwZWI1YmE0ZWEzZWY5YjM5NmIwZGZmN2M4ODg1MzNjYjZjNjNmNmUzYzA5MGMxMWI0In0.eyJhdWQiOiI1IiwianRpIjoiZjM4NGU3YTZiYTNhMGE4NDhmZjk5OGRlZGUyYjE1ZjBlYjViYTRlYTNlZjliMzk2YjBkZmY3Yzg4ODUzM2NiNmM2M2Y2ZTNjMDkwYzExYjQiLCJpYXQiOjE1NjkyOTY4OTUsIm5iZiI6MTU2OTI5Njg5NSwiZXhwIjoxNjAwOTE5Mjk1LCJzdWIiOiI1Iiwic2NvcGVzIjpbXX0.VVPEIBKIY3e1cpQoi4MArixB3nM75x1zlRlFIS0h_ZI_snB17vnqTXIhht5NYY1IHrPVjU3YaGneeaqHl1aCpR7excWGFTbsAlya0mh6wmK1TDgrRljjw_8hiRi8UH6P_D7cJVQ_ciT9OWegaloHe8cjObDa4indwb-U1QF39IsArVPEWc-RqvGrsaKIi3BsibOCoSDqDK0LDAkm_A1pa-WhnUZ3qusnJl2OJVxDoieJyZZKH3DpSVaQuzSHQ6VF0On8KqXNtyjuRAywwq7h7UgahcSFZju0SukoihHFUtbYTYqS4XxSa1SOrpgm4FRK6cuU-W8IDX8rxeYah3fVogD5uMVZp0V1Kt_z6RP09iImOzDq_clNfdhqjDL_m2u7KEf_LsEDLaXSI8a44kraGPMLZUpfGBCklbJMKK0A1RUbXT1g6dKUtHnjcs7uXzk2BEW6FuJXEaaRRln5eeP0Rkzq2ligznpLn2CXsA-z-O3jgseq2cx-oamoB7ELHY6UMBVgAZy13VE7cT1DILiyItG7GHMJC3pTqaccVpWVgF-Nd4qd7yLOx_p0JiQn_Koe_NsKZ_D-YZmBznG6JsQRReV3KKxjZY4mqycizoem9LepywSl8PcHcGvOWitqnl4WoH9R5zFWgKM3J1q927QgOF_i0pFYI3HIiIAOUVsDbBI',
        ];
        
        $client = new Client([
            'headers' => $headers
        ]);
        $r = $client->request('GET', 'https://api.ganzberg.com/api/home', [
            'verify' => false
        ]);
        $response = $r->getBody();
        
        // var_dump($response);
        return $response;
    }
}
