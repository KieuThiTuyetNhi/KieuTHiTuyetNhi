<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\Orderdetail;
use App\Cart;
use Session;
class DathangController extends Controller
{
    public function index()
    {
      return view('frontend.cart.dathang');
    }

    public function dathang(Request $req )
    {
      $cus_id = Auth::user()->id;
      $auth = Auth::user()->name;
      $order = new Order;
        $order->user_id = $cus_id;
      $order->name = Auth::user()->name;
      $order->email = Auth::user()->email;
      $order->phone = Auth::user()->phone;
      $order->address = Auth::user()->address;

     // $order->note = $req->note;
       $order->status = 1;
      if($order->save()){
         if (Session::has("Cart")!= null){
            foreach (Session::get("Cart")->products as $item)
            {
               $order_detail = new Orderdetail;
               $order_detail->order_id = $order->id;
               $order_detail->product_id = $item['productInfo']->id;
               $order_detail->qty = $item['quanty'];
               $order_detail->price = $item['productInfo']->price_buy;
               $order_detail->amount = (int)$item['productInfo']->price_buy*(int)$item['quanty'];           
              //dd($order_detail);
              $order_detail->save();
            }
               // Huy gio hang
                $req->session()->forget('Cart');
                return view('frontend.cart.dathangthanhcong');
         }
         else
         {
          return view('frontend.cart.dathangthanhcong');
         }
         
         
      }

      
    }
}
