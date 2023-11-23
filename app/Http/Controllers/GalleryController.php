<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\View\View;

class GalleryController extends Controller
{
    function show($slug) : View {
        $gallery = Gallery::where('slug', $slug)->first();
        
        return view('gallery.show',compact('gallery'));
    }
}
