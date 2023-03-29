<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\frontend\SiteController;
use App\Http\Controller\backend\DashboardController;
use App\Http\Controller\backend\BrandController;
use App\Http\Controller\backend\CategoryController;
use App\Http\Controller\backend\ProductController;

Route::get('/',[SiteController::class,'index'])->name('site.home');

});