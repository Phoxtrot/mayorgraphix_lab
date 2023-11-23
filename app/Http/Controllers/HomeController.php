<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    function index() : View {
        $categories = Category::all();
        return view('welcome', compact('categories'));
    }
}
