<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\frontend\SiteController;
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\backend\BrandController;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\ProductController;

Route::get('/',[SiteController::class,'index'])->name('site.home');

Route::prefix('admin')->group(function()
{
   Route::get('/',[DashboardController::class,'index'])->name('admin.dashboard');
   Route::resource('brand',BrandController::class);
   //Category
   Route::resource('category',CategoryController::class);
   Route::get('category_trash',[CategoryController::class,'trash'])->name('category.trash');
   Route::prefix('category')->group(function()
{
   Route::get('status/{category}',[CategoryController::class,'status'])->name('category.status');
   Route::get('restore/{category}',[CategoryController::class,'restore'])->name('category.restore');
   Route::get('destroy/{category}',[CategoryController::class,'destroy'])->name('category.destroy');

});
   Route::resource('product',ProductController::class);
});