<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\OfferRequest;
use App\Offer;
use App\Product;
use App\Property;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    public function create(Product $product)
    {
        return view('admin.offers.create', compact('product'));
    }

    public function store(OfferRequest $request, Product $product)
    {
        $offer = Offer::create([
            'price' => $request->price,
            'product_id' => $product->id
        ]);
        $offer->propertyOptions()->sync($request->property_id);
        return redirect()->route('products.edit', $product);
    }

    public function edit(Product $product, Offer $offer)
    {
        $selectedProperties = $offer->propertyOptions()->pluck('property_option_id')->all();
        $properties = Property::get();
        return view('admin.offers.edit', compact('product', 'properties', 'offer', 'selectedProperties'));
    }

    public function update(OfferRequest $request, Product $product, Offer $offer)
    {
        $offer->update([
            'price' => $request->price,
            'product_id' => $product->id
        ]);
        $offer->propertyOptions()->sync($request->property_id);
        return redirect()->route('products.edit', $product);
    }

    public function destroy(Product $product, Offer $offer)
    {
        $offer->delete();
        return redirect()->route('products.edit', $product);
    }
}
