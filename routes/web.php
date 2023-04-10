<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\frontend\SiteController;
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\backend\BrandController;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\ProductController;
use App\Http\Controllers\backend\TopicController;
use App\Http\Controllers\backend\ContactController;


Route::get('/',[SiteController::class,'index'])->name('site.home');
Route::get('lien-he',[LienheController::class,'index'])->name('site.index');
Route::get('khach-hang',[LienheController::class,'index'])->name('site.index');
Route::get('gio-hang',[LienheController::class,'index'])->name('site.index');


Route::prefix('admin')->group(function()
{
   Route::get('/',[DashboardController::class,'index'])->name('admin.dashboard');
   Route::resource('brand',BrandController::class);
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

});


Route::get('{slug}',[SiteController::class,'index'])->name('slug.home');
