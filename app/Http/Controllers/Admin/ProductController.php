<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Classes\Tree;
use App\Gallery;
use App\Http\Requests\ProductRequest;
use App\Offer;
use App\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $categories = Category::select('id', 'parent_id', 'title', 'slug')->get()->keyBy('id')->toarray();
        $tree = Tree::getTree($categories);
        $delimiter = '';
        if (isset($_GET['category_id']) && $_GET['category_id'] != 0) {
            $category_id = $_GET['category_id'];
            $category = Category::where('id', $category_id)->first();
            $products = $category->products()->with('category')->paginate(12);
        } else {
            $category_id = 0;
            $products = Product::paginate(12);
        }
        return view('admin.products.index', compact('products', 'tree', 'delimiter', 'category_id'));
    }

    public function create()
    {
        $categories = Category::select('id', 'parent_id', 'title', 'slug')->get()->keyBy('id')->toarray();
        $tree = Tree::getTree($categories);
        $delimiter = '';
        return view('admin.products.create', compact('tree', 'delimiter'));
    }

    public function store(ProductRequest $request)
    {
        $product = Product::create($request->all());
        $product->saveOffers($request->get('offers'), false);
        $product->saveGallery($request->file('gallery'), false);
        $product->saveImage($request->file('image'));
        $product->toggleStatus($request->get('status'));
        $product->toggleFeatured($request->get('is_featured'));
        session()->flash('success', 'Товар создан!');
        return redirect()->route('products.edit', $product);
    }

    public function edit(Product $product)
    {
        $galleries = Product::with('galleries')->where('id', $product->id)->get();
        $categories = Category::select('id', 'parent_id', 'title', 'slug')->get()->keyBy('id')->toarray();
        $tree = Tree::getTree($categories);
        $delimiter = '';
        $offers = Offer::with('product')->where('product_id', $product->id)->get();
        return view('admin.products.edit', compact('tree', 'delimiter', 'product', 'offers', 'galleries'));
    }

    public function update(ProductRequest $request, Product $product)
    {
        $product->update($request->all());
        $product->saveOffers($request->get('offers'), true);
        $product->saveGallery($request->file('gallery'), true);
        $product->saveImage($request->file('image'));
        $product->toggleStatus($request->get('status'));
        $product->toggleFeatured($request->get('is_featured'));
        session()->flash('success', 'Товар обновлен!');
        return redirect()->back();
    }

    public function destroy(Product $product)
    {
        $product->removeGallery();
        $product->removeImage();
        $product->delete();
        session()->flash('success', 'Товар удален!');
        return redirect()->route('products.index');
    }

    public function deleteGalleryImage(Request $request)
    {
        Storage::delete('products/' . $request->get('slug') . '/' . $request->get('image'));
        $result = Gallery::where('image', $request->get('image'))->delete();
        if ($result) {
            return response()->json('ok', 200);
        }
    }
}
