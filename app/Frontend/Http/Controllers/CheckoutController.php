<?php

namespace App\Frontend\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Frontend\Models\Product;
use App\Frontend\Models\Shop;
use App\Frontend\Models\Order;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Cart;

class CheckoutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //search products
    public function index()
    {
        if(Auth::user()){
            // or any string represents user identifier
            $userId = auth()->user()->id; 
            $carts = Cart::session($userId)->getContent();
        }
        return view('frontend::carts.checkout', compact('carts'));
    }

    public function index_completed_1()
    {

        return view('frontend::carts.checkout_completed');

    }

    
    private function saveOrder($request) {
        // Create initiative order with no shop
        $order = new Order();
        $total = 0;
        $orderStatusId = 0;
        // $orderFlag = $request['order_flag'];
        $orderFlag = 1;

        $order->user_id = auth()->user()->id;
        // $order->shop_id = auth()->user()->shop_id; // by default buyer user has shop_id 0
        $order->shop_id = 1; // by default buyer user has shop_id 0

        if ($orderFlag == 2) {
            $order->shop_id = Auth::user()->supplier_id; // The seller is supplier now.
        }

        // $order->date_order_placed = Carbon::now();
        // $order->date_order_paid = date('Y-m-d', strtotime($request['date_order_paid']));
        // $order->order_status_id = $orderStatusId; 
        // $order->delivery_option_id = $request['delivery_option_id'];
        // $order->address_full_name = $request['address_full_name'];
        // $order->address_email = $request['address_email'];
        // $order->address_phone = $request['address_phone'];
        // $order->address_street_address = $request['address_street_address'];
        // $order->address_city_province_id = $request['address_city_province_id'];
        // $order->address_district_id = $request['address_district_id'];
        // $order->phone_pickup = $request['phone_pickup'];
        // $order->note = $request['note'];
        // $order->preferred_delivery_pickup_date = date('Y-m-d', strtotime($request['preferred_delivery_pickup_date']));
        // $order->preferred_delivery_pickup_time = $request['preferred_delivery_pickup_time'];
        // $order->payment_method_id = $request['payment_method_id'];
        // $order->delivery_pickup_date = date('Y-m-d', strtotime($request['delivery_pickup_date']));
        // $order->pickup_lon = $request['pickup_lon'];
        // $order->pickup_lat = $request['pickup_lat'];
        // $order->save();
        
        $order->date_order_placed = Carbon::now();
        $order->date_order_paid = date('Y-m-d', strtotime('22/03/2019'));
        $order->order_status_id = $orderStatusId; 
        $order->delivery_option_id = 1;
        $order->delivery_id = 1;
        $order->address_full_name = 'Phnom penh';
        $order->address_email = 'test@gmail.com';
        $order->address_phone = 010234124;
        $order->address_street_address = '271st';
        $order->address_city_province_id = 1;
        $order->address_district_id = 1;
        $order->phone_pickup = 010324222;
        $order->note = 'note';
        $order->preferred_delivery_pickup_date = date('Y-m-d', strtotime('22/03/2019'));
        $order->preferred_delivery_pickup_time = date('Y-m-d', strtotime('22/03/2019'));
        $order->payment_method_id = 1;
        $order->delivery_pickup_date = date('Y-m-d', strtotime('22/03/2019'));
        $order->pickup_lon = 11.2123143;
        $order->pickup_lat = 14.0123412;
        $order->total = 14;
        $order->save();

        $order_items = array();
        // Create each order items
        // $items = $request['orderItem'];
        // foreach($items as $key => $item) {
        //     $orderItems = new OrderItem();
        //     $orderItems->order_id = $order->id;
        //     $orderItems->product_id = $item['product_id'];
        //     $orderItems->name = $item['name'];
        //     $orderItems->unit_price = $item['unit_price'];
        //     $orderItems->quantity = $item['quantity'];
        //     $orderItems->discount = $item['discount'];
        //     $total += ($item['quantity'] * $item['unit_price']) - $item['discount'];
        //     $orderItems->save();
        //     $order_items = $orderItems->getOrderItemByOrderId($order->id);

        // }
        $order->total = $total;
        $order->save();
        
        return array('order' => $order, 'orderItems' => $order_items, 'status' => true);
    }

    public function index_completed(Request $request){
        // try {
            // Validate order request fields
            // $response = $this->validateOrderFields($request);
            // if ($response['status'] == false) {
            //     return response()->json($response, 401);
            // }
            
            $shop = new Shop;
            $supplier = null;
            $distance = 1;
            // $orderFlag = $request['order_flag'];

            // if ($orderFlag == 1) {
            //     // Find nearby shops base on the buyer current location
            //     $shopsNearby = $shop->getShopsNearby($request->pickup_lat, $request->pickup_lon, $distance, Auth::user()->id);
            //     // If there is no shops nearby found, response to buyer that there is no shops nearby to serve the request.
            //     if (count($shopsNearby) < 1) {
            //         $message = 'There is no shops nearby to serve this order request';
            //         $response = [
            //             'status' => false,
            //             'message' => [
            //                 'kh' => $message,
            //                 'en' => $message,
            //                 'ch' => $message
            //             ],
            //             'data' => [],
            //         ];
            //         return response()->json($response, 401);
            //     }
            // }
            
            // this will save to order
            $orders = array(); // receiving array of order and orderItems objects
            $order = null;
            $orderItems = null;
            $orders = $this->saveOrder($request->all());
            
            if ($orders['status'] == false) {
                return response()->json($orders, 401);
            } else {
                $order = Order::findOrFail($orders['order']->id);
                $orderItems = $orders['orderItems'];
            }
            // Firebase handling. Check the 'order_flag'. If order_flag:1 it is buyer-order, else seller-order
            $pushNotification = [];
            $firebase = new FirebaseController;
             // Prepare token list
            $tokenListAndroid = [];
            $tokenListIos = [];
            $body = "There is an order.";
            $title = "Order product";
            
            if ($orderFlag == 1) {
                // it is buyer placing order
                $firebase->saveFirebase($order->id, Auth::user()->full_name);
                $orderFirebase = $firebase->executeOrderDetail($order->id);
                foreach ($shopsNearby as $shopNearby) {
                    if ($shopNearby->device_type == "ios") {
                        $tokenListIos[] = $shopNearby->fcm_token;
                    } else if ($shopNearby->device_type = "android") {
                        $tokenListAndroid[] = $shopNearby->fcm_token;
                    }
                }
            } else if ($orderFlag == 2) {
                // It is seller order, so get this seller shop info
                $shop = Shop::where('id', Auth::user()->shop_id)->first();
                // Then get supplier of this shop
                $supplier = new Shop;
                $supplier = Shop::where('id', Auth::user()->supplier_id)->first();
                $userSupplier = User::where('shop_id', $supplier->id)->first();
                
                // Debug by BTY
                /*
                $response = ['status'  => true,'message' => 'Debug','data' => ['user_id' => Auth::user()->id, 'shop' => $shop, 
                    'supplier' => $supplier, 'userSupplier' => $userSupplier]];
                return response()->json($response, 200);
                */
                
                if ($userSupplier->device_type == 'ios') {
                    $tokenListIos[] = $userSupplier->fcm_token;
                } else if ($userSupplier->device_type == 'android') {
                    $tokenListAndroid[] = $userSupplier->fcm_token;
                }
            }
            
            if (count($tokenListAndroid) > 0) {
                $pushNotification["android"] = $firebase->pushNotificatoin($order->id, $tokenListAndroid, "android", $orderFlag, $body, $title);
            }
            if (count($tokenListIos) > 0) {
                $pushNotification["ios"] = $firebase->pushNotificatoin($order->id, $tokenListIos, "ios", $orderFlag, $body, $title);
            }
            
            // Prepare response
            $response_data = [
                'order_id' => $order->id,
                'order_status' => $order->order_status_id,
                'order' => $order,
                'order_items' => $orderItems,
                'shop' => $supplier,
                'pushLogs' => $pushNotification
            ];
            
            $log_flag = 1;
            $system_log = new SystemLog;
            $system_log->module = 'executeOrder';
            $system_log->logs = $request->all();
            if ($log_flag) {
                $response_data += [ 'system_logs' => $system_log];
                $system_log->save();
            }
            
            $response = [
                'status'  => true,
                'message' => [
                    'kh' => 'Buyer Order saved successfully',
                    'en' => 'Buyer Order saved successfully',
                    'ch' => 'Buyer Order saved successfully',
                ],
                'data' => $response_data
            ];
            return view('frontend::carts.checkout_completed');;
        // } catch (\Exception $e) {
        //     $response = [
        //         'status' => false,
        //         'message' => [
        //             'kh' => $e->getMessage(),
        //             'en' => $e->getMessage(),
        //             'ch' => $e->getMessage(),
        //         ]
        //     ];
        //     return response()->json($response, 401);
        // }
    }

}
