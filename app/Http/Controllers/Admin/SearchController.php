<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        if($request->has('query')) {
            $value = $request->get('query');
            $products = Product::where('title', 'LIKE', "%$value%")->paginate(9)->appends(request()->query());
            return view('admin.search.index', compact('products'));
        }
    }
}
