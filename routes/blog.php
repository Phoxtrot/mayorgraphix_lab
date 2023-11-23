<?php

use App\Http\Controllers\Blog\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/blog',[PostController::class,'index']);