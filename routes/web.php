<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\frontend\SiteController;
use App\Http\Controllers\frontend\DathangController;
use App\Http\Controllers\frontend\LienheController;
use App\Http\Controllers\frontend\CartController;
use App\Http\Controllers\frontend\DangnhapController;
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\backend\ProductController;
use App\Http\Controllers\backend\BrandController;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\ContactController;
use App\Http\Controllers\backend\PostController;
use App\Http\Controllers\backend\PageController;
use App\Http\Controllers\backend\TopicController;
use App\Http\Controllers\backend\MenuController;
use App\Http\Controllers\backend\UserController;
use App\Http\Controllers\backend\CustomerController;
use App\Http\Controllers\backend\SliderController;
use App\Http\Controllers\backend\OrderController;

use App\Http\Controllers\frontend\LoginController;
// use App\Http\Controllers\backend\AuthController;



Route::get('/',[SiteController::class,'index'])->name('site.home');
Route::get('lien-he',[LienheController::class,'index'])->name('site.index');
Route::post('lien-he',[LienheController::class,'xuly'])->name('contact.xuly');
Route::get('khach-hang',[LienheController::class,'index'])->name('site.index');
Route::get('gio-hang',[CartController::class,'index']);
Route::get('/Add-Cart/{id}',[CartController::class,'AddCart']);
Route::get("/tim-kiem", [SiteController::class, 'timkiem'])->name('site.timkiem');
Route::get('/Delete-Item-Cart/{id}',[CartController::class,'DeleteItemCart']);
Route::get('/List-Carts',[CartController::class,'ViewListCart'])->name('site.giohang');
Route::get('/Delete-Item-List-Cart/{id}',[CartController::class,'DeleteItemListCart']);
Route::get('/Save-Item-List-Cart/{id}/{quanty}',[CartController::class,'SaveItemListCart']);
//thanh toan

Route::get('thanh-toan',[DathangController::class,'index'])->name('dathang.index');
Route::get('dat-hang-thanh-cong',[DathangController::class,'dathang'])->name('order.dathang');

//đangnhap
route::get('login', [DashboardController::class, 'getlogin'])->name('admin.login');
Route::post('login', [DashboardController::class,'postlogin'])->name('postlogin');

//Đangky
Route::get('dang-ky',[DangnhapController::class,'dangky'])->name('login.dangky');
Route::post('dang-ky',[DangnhapController::class,'xulydangky'])->name('login.xulidangky');
//dang nhap
Route::get('dang-nhap', [LoginController::class, 'login'])->name ('site.login');
Route::post('dang-nhap', [LoginController::class, 'postlogin'])->name ('site.postlogin');
Route::get('logout', [LoginController::class, 'logout'])->name ('site.logout');
//tat ca san pham
Route::get('san-pham', [SiteController::class, 'product'])->name ('site.product');




// ,'middleware'=>'LoginAdmin'
route::group(['prefix'=>'admin' ,'middleware'=>'LoginAdmin'] ,function () 
{
   Route::get('/',[DashboardController::class,'index'])->name('admin.dashboard');
   route::get('login', [DashboardController::class, 'logout'])->name('admin.logout');
   
   //Category
   Route::resource('category',CategoryController::class);
   Route::get('category_trash',[CategoryController::class,'trash'])->name('category.trash');
   Route::prefix('category')->group(function(){
   Route::get('status/{category}',[CategoryController::class,'status'])->name('category.status');
   Route::get('restore/{category}',[CategoryController::class,'restore'])->name('category.restore');
   Route::get('destroy/{category}',[CategoryController::class,'destroy'])->name('category.destroy');
   Route::get('delete/{category}',[CategoryController::class,'delete'])->name('category.delete');

});
//Brand
Route::resource('brand',BrandController::class);
Route::get('brand_trash',[BrandController::class,'trash'])->name('brand.trash');
Route::prefix('brand')->group(function(){
Route::get('status/{brand}',[BrandController::class,'status'])->name('brand.status');
Route::get('restore/{brand}',[BrandController::class,'restore'])->name('brand.restore');
Route::get('destroy/{brand}',[BrandController::class,'destroy'])->name('brand.destroy');
Route::get('delete/{brand}',[BrandController::class,'delete'])->name('brand.delete');

});

   //Product
Route::resource('product',ProductController::class);
Route::get('product_trash',[ProductController::class,'trash'])->name('product.trash');
Route::prefix('product')->group(function(){
Route::get('status/{product}',[ProductController::class,'status'])->name('product.status');
Route::get('restore/{product}',[ProductController::class,'restore'])->name('product.restore');
Route::get('destroy/{product}',[ProductController::class,'destroy'])->name('product.destroy');
Route::get('delete/{product}',[ProductController::class,'delete'])->name('product.delete');

});
 //Topic
 Route::resource('topic',TopicController::class);
 Route::get('topic_trash',[TopicController::class,'trash'])->name('topic.trash');
 Route::prefix('topic')->group(function(){
 Route::get('status/{topic}',[TopicController::class,'status'])->name('topic.status');
 Route::get('restore/{topic}',[TopicController::class,'restore'])->name('topic.restore');
 Route::get('destroy/{topic}',[TopicController::class,'destroy'])->name('topic.destroy');
 Route::get('delete/{topic}',[TopicController::class,'delete'])->name('topic.delete');
 
 });
 //contact
 Route::resource('contact',ContactController::class);
 Route::get('contact_trash',[ContactController::class,'trash'])->name('contact.trash');
 Route::prefix('contact')->group(function(){
 Route::get('status/{contact}',[ContactController::class,'status'])->name('contact.status');
 Route::get('restore/{contact}',[ContactController::class,'restore'])->name('contact.restore');
 Route::get('destroy/{contact}',[ContactController::class,'destroy'])->name('contact.destroy');
 Route::get('delete/{contact}',[ContactController::class,'delete'])->name('contact.delete');
 });
 //post
 Route::resource('post',PostController::class);
 Route::get('post_trash',[PostController::class,'trash'])->name('post.trash');
 Route::prefix('post')->group(function(){
 Route::get('status/{post}',[PostController::class,'status'])->name('post.status');
 Route::get('restore/{post}',[PostController::class,'restore'])->name('post.restore');
 Route::get('destroy/{post}',[PostController::class,'destroy'])->name('post.destroy');
 Route::get('delete/{post}',[PostController::class,'delete'])->name('post.delete');
 });
 //page
 Route::resource('page',PageController::class);
 Route::get('page_trash',[PageController::class,'trash'])->name('page.trash');
 Route::prefix('page')->group(function(){
 Route::get('status/{page}',[PageController::class,'status'])->name('page.status');
 Route::get('restore/{page}',[PageController::class,'restore'])->name('page.restore');
 Route::get('destroy/{page}',[PageController::class,'destroy'])->name('page.destroy');
 Route::get('delete/{page}',[PageController::class,'delete'])->name('page.delete');
 });
 //menu
 Route::resource('menu',MenuController::class);
 Route::get('menu_trash',[MenuController::class,'trash'])->name('menu.trash');
 Route::prefix('menu')->group(function(){
 Route::get('status/{menu}',[MenuController::class,'status'])->name('menu.status');
 Route::get('restore/{menu}',[MenuController::class,'restore'])->name('menu.restore');
 Route::get('destroy/{menu}',[MenuController::class,'destroy'])->name('menu.destroy');
 Route::get('delete/{menu}',[MenuController::class,'delete'])->name('menu.delete');
 });
 //slider
 Route::resource('slider',SliderController::class);
 Route::get('slider_trash',[SliderController::class,'trash'])->name('slider.trash');
 Route::prefix('slider')->group(function(){
 Route::get('status/{slider}',[SliderController::class,'status'])->name('slider.status');
 Route::get('restore/{slider}',[SliderController::class,'restore'])->name('slider.restore');
 Route::get('destroy/{slider}',[SliderController::class,'destroy'])->name('slider.destroy');
 Route::get('delete/{slider}',[SliderController::class,'delete'])->name('slider.delete');
 });

 //user
 Route::resource('user',UserController::class);
 Route::get('user_trash',[UserController::class,'trash'])->name('user.trash');
 Route::prefix('user')->group(function(){
 Route::get('status/{user}',[UserController::class,'status'])->name('user.status');
 Route::get('restore/{user}',[UserController::class,'restore'])->name('user.restore');
 Route::get('destroy/{user}',[UserController::class,'destroy'])->name('user.destroy');
 Route::get('delete/{user}',[UserController::class,'delete'])->name('user.delete');
 });
 //customer
 Route::resource('customer',CustomerController::class);
 Route::get('customer_trash',[CustomerController::class,'trash'])->name('customer.trash');
 Route::prefix('customer')->group(function(){
 Route::get('status/{customer}',[CustomerController::class,'status'])->name('customer.status');
 Route::get('restore/{customer}',[CustomerController::class,'restore'])->name('customer.restore');
 Route::get('destroy/{customer}',[CustomerController::class,'destroy'])->name('customer.destroy');
 Route::get('delete/{customer}',[CustomerController::class,'delete'])->name('customer.delete');
 });//order
 Route::resource('order',OrderController::class);
 Route::get('order_trash',[OrderController::class,'trash'])->name('order.trash');
 Route::prefix('order')->group(function(){
 Route::get('status/{order}',[OrderController::class,'status'])->name('order.status');
 Route::get('restore/{order}',[OrderController::class,'restore'])->name('order.restore');
 Route::get('destroy/{order}',[OrderController::class,'destroy'])->name('order.destroy');
 Route::get('delete/{order}',[OrderController::class,'delete'])->name('order.delete');
 });
});



Route::get('{slug}',[SiteController::class,'index'])->name('slug.home');
