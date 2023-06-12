<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Link;
use App\Models\Product;
use App\Models\Category;
use App\Models\Post;

class HomeProduct extends Component
{
   public $category=null;
    public function __construct($category)
    {
       $this->category=$category;
    }

   
    public function render()
    {
        $row_category=$this->category;
        $cat_id=$row_category->id;
        $arrcatid=array();
        array_push($arrcatid,$cat_id);
        $list_category2=Category::where([['status','=','1'],['parent_id','=',$cat_id]])->get();
        if(count($list_category2)>0){
            foreach($list_category2 as $cat2)
            {
                array_push($arrcatid,$cat2->id);
                $list_category3=Category::where([['status','=','1'],['parent_id','=',$cat2->id]])->get();
                if(count($list_category3 )>0){
                    foreach($list_category3 as $cat3)
                    {
                        array_push($arrcatid, $cat3->id);
                    }
                }
            }
        }
       $list_pro = Product::whereIn("category_id",$arrcatid)->where('status','=','1')->orderBy('created_at','desc')->take(8)->get();
    return view('components.home-product',compact('list_pro'));
    }
}
