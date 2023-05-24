<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Cart;
use Session;

class  CartController extends Controller
{
public function Index(){
    
    
}
public function AddCart(Request $req,$id){
    $product =DB::table('KTTN_product')->where('id',$id)->first();
    if($product != null){
       
       $oldCart = Session('Cart') ? Session('Cart') : null;
       $newCart = new Cart($oldCart);
       $newCart->AddCart($product,$id);
       $req->session()->put('Cart', $newCart);
    }
    return view('frontend.cart.cart-item',compact('newCart'));
 
    

}
}
