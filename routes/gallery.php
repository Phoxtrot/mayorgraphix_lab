<?php

use App\Http\Controllers\GalleryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/gallery/{slug}',[GalleryController::class,'show'])->name('gallery.show');
Route::get('/gallery',function(){
    return 'gallery.show';
});