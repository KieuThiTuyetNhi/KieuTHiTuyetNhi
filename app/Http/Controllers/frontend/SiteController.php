<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Link;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Post;
class SiteController extends Controller
{
    public function index($slug=null)
    {
        if($slug==null)
        {
          return $this->home();
        }
        else
        {
         $link = Link::where('slug','=',$slug)->first();
         if($link==null)
         {
            $product = Product::join('KTTN_brand','KTTN_brand.id','=','KTTN_product.brand_id')
                ->select('KTTN_product.*', 'KTTN_brand.name as brandname')
                ->where([['KTTN_product.status','=','1'],['KTTN_product.slug','=',$slug]]) ->first();
                if($product != null)
            {
                return $this->product_detail($product);

            }
            else{
            $args=[
                ['status','=','1'],
                ['slug','=','$slug'],
                ['type','=','post']
                  ];
            $post = Post::where($args)->first();
            if($post !=null)
            {
                return $this->post_detail($post);

            }
            else{
                return $this->error_404($slug);
 
            }

            }
         }
         else
         {
          $type=$link->type;
         switch($type)
         {
            case 'category':{
                return $this->product_category($slug);

            }
            case 'brand':{
                return $this->product_brand($slug);

            }
            case 'topic':{
                return $this->post_topic($slug);

            }
            case 'page':{
                return $this->post_page($slug);

            }
            
         }
         }
        }
    }
    //trang chủ
 public function home ()
 {
    $cat_home=Category::where('status','=','1')->take(3)->get();
        return view('frontend.home',compact('cat_home'));
    
 }
 public function product_category ($slug)
 {
         $row_category=Category::where([['status','=','1'],['slug','=',$slug]])->first();
        $cat_id=$row_category->id;
        $arrcatid=array();
        array_push($arrcatid,$cat_id);
        $list_category2=Category::where([['status','=','1'],['parent_id','=',$cat_id]])->get();
        if(count($list_category2)>0)
        {
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
        //var_dump( $arrcatid);
     $list_pro = Product::whereIn("category_id",$arrcatid)->where('status','=','1')->orderBy('created_at','desc')->paginate(4);
        return view('frontend.product-category',compact('row_category','list_pro'));
    
 }
 public function product_brand ($slug)
 {
    $row_brand=Brand::where([['status','=','1'],['slug','=',$slug]])->first();
    $list_pro = Product::where([['status','=','1'],['brand_id','=',$row_brand->id]])->orderBy('created_at','desc')->paginate(4);
        return view('frontend.product-brand',compact('row_brand','list_pro'));
    
 }
 public function post_topic ($slug)
 {
        return view('frontend.post-topic');
    
 }
 public function post_page ($slug)
 {
        return view('frontend.post-page');
    
 }
 public function product_detail($product)
 {
        return view('frontend.product-detail',compact('product'));
    
 }
 public function post_detail($post)
 {
        return view('frontend.post-detail');
    
 }
 public function error_404($slug)
 {
        return view('frontend.error_404');
    
 }
 public function timkiem(Request $req)
    {
            $product = Product::where('KTTN_product.name', 'like', '%' . $req->search . '%')
            ->orWhere('price_buy', $req->search)
            ->get();
        return view('frontend.timkiem', compact('product'));    
    }
}
