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
       $req->Session()->put('Cart', $newCart);
    }
    return view('frontend.cart.cart-item');
}
public function DeleteItemCart(Request $req,$id){
    $oldCart = Session('Cart') ? Session('Cart') : null;
    $newCart = new Cart($oldCart);
      $newCart->DeleteItemCart($id);

 if(Count($newCart->products)> 0){
    $req->Session()->put('Cart', $newCart);

 }
 else{
    $req->Session()->forget('Cart');

 }
    return view('frontend.cart.cart-item');

}

public function ViewListCart(){
   return view('frontend.cart.list-cart');

}
public function DeleteItemListCart(Request $req,$id){
   $oldCart = Session('Cart') ? Session('Cart') : null;
   $newCart = new Cart($oldCart);
     $newCart->DeleteItemCart($id);

if(Count($newCart->products)> 0){
   $req->Session()->put('Cart', $newCart);

}
else{
   $req->Session()->forget('Cart');

}
   return view('frontend.cart.list');

}

public function SaveItemListCart(Request $req,$id,$quanty){
   $oldCart = Session('Cart') ? Session('Cart') : null;
   $newCart = new Cart($oldCart);
     $newCart->UpdateItemCart($id,$quanty);
     $req->Session()->put('Cart', $newCart);
   return view('frontend.cart.list');

}

}
