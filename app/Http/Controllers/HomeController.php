<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::where('is_featured', 1)->take(9)->get();
        return view('front.home.index', compact('categories'));
    }
}
