<?php
namespace App;
class Cart{
    public $products =null;
    public $totalPrice =0;
    public $totalQuanty =0;

    public function __constant($cart){
       if($cart)
       {
        $this->products=$cart->products;
        $this->totalPrice=$cart->totalPrice;
        $this->totalQuanty=$cart->totalQuanty;

        }
    }
    public function AddCart($product,$id){
        $newProduct =['quanty'=>0,'price'=>$product->price_buy,'productInfo'=>$product];

        if($this->products){
            if(array_key_exists ($id,$this->products)){
                $newProduct = $this->products[$id];

            }
              
        }
      $newProduct['quanty']++;
       $newProduct['price']=$newProduct['quanty'] * $product->price_buy;
      $this->products[$id]=$newProduct;
      $this->totalPrice += $product->price_buy;
      $this->totalQuanty++;

    }
}
?>