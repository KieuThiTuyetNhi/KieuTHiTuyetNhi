<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\frontend\SiteController;
use App\Http\Controller\backend\DashboardController;
use App\Http\Controller\backend\BrandController;
use App\Http\Controller\backend\CategoryController;
use App\Http\Controller\backend\ProductController;

Route::get('/',[SiteController::class,'index'])->name('site.home');
//Khai báo router cho trang quane lý
Route::prefix ('admin')->group(function(){
    Route::get('/',[DashboardController::class, 'index'])->name('admin.dashboard');
   Route::resource('brand',BrandController::class);
   Route::resource('category',CategoryController::class);
   Route::resource('product',ProductController::class);

});