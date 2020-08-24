<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        // $products = Product::with('category')->where('is_featured', 1)->take(8)->get();
        // return view('pages.index', compact('products'));
        // return view('front.catalog.index');
    }
}
