<?php

namespace App\Frontend\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Frontend\Models\Advertise;
use Illuminate\Support\Facades\Auth;


class AdvertiseController extends Controller
{
    //search products
    public function index()
    {
        return view('frontend::products.addproduct');
    }

    public function addProduct(Request $request){
        $advertise = new Advertise;
        // dd($request->all());

        $advertise->user_id = auth()->user()->id;
        $advertise->cat_id = $request->category;
        $advertise->advertise_name = $request->category;
        $advertise->quantity = $request->quantity;
        $advertise->unit_price = $request->price;
        $advertise->discount = $request->discount;
        $advertise->advertise_address = $request->address;
        $advertise->advertise_description = $request->description;
        if($request->hasFile('fileToUpload')){
            $image_name = 'advertise'.time().'.'.request()->fileToUpload->getClientOriginalExtension();
            $path = $request->file('fileToUpload')->move(public_path('/img/items'), $image_name);
            $advertise->image = $image_name;
        }
        if($advertise->save()){
            return 'saved';
        }else {
            return 'not save yet';
        }

    }

    public function ShowUserProduct(){
        return view('frontend::products.myproduct');
    }
}
