<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Classes\Tree;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Product;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::select('id', 'parent_id', 'title', 'slug')->get()->keyBy('id')->toarray();
        $tree = Tree::getTree($categories);
        return view('admin.categories.index', compact('tree'));
    }

    public function create()
    {
        $categories = Category::select('id', 'parent_id', 'title', 'slug')->get()->keyBy('id')->toarray();
        $tree = Tree::getTree($categories);
        $delimiter = '';
        return view('admin.categories.create', compact('tree', 'delimiter'));
    }

    public function store(CategoryRequest $request)
    {
        $category = Category::create($request->all());
        $category->saveImage($request->file('image'));
        $category->toggleFeatured($request->get('is_featured'));
        session()->flash('success', 'Категория создана!');
        return redirect()->route('categories.index');
    }

    public function show(Category $category)
    {
        $products = $category->products()->with('category')->paginate(12);
        return view('admin.categories.show', compact('category', 'products'));
    }

    public function edit(Category $category)
    {
        $categories = Category::select('id', 'parent_id', 'title', 'slug')->get()->keyBy('id')->toarray();
        $tree = Tree::getTree($categories);
        $delimiter = '';
        return view('admin.categories.edit', compact('category', 'tree', 'delimiter'));
    }

    public function update(CategoryRequest $request, Category $category)
    {
        $category->update($request->all());
        $category->saveImage($request->file('image'));
        $category->toggleFeatured($request->get('is_featured'));
        session()->flash('success', 'Категория обновлена!');
        return redirect()->route('categories.index');
    }

    public function destroy(Category $category)
    {
        $category->removeImage();
        $category->delete();
        session()->flash('success', 'Категория удалена!');
        return redirect()->route('categories.index');
    }
}
