<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot(['title', 'quantity', 'price']);
    }
}
