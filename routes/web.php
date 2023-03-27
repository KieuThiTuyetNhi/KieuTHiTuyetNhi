<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\frontend\SiteController;

Route::get('/',[SiteController::class,'index'])->name('site.home');
