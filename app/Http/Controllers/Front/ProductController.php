<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Categorie;

class ProductController extends Controller
{
    public function home()
    {
        $products = Product::latest()->take(6)->get();
        $categories = Categorie::all();

        return view('front.home', compact('products', 'categories'));
    }

    public function index()
    {
        $products = Product::with('categorie')->paginate(12);
        return view('front.products.index', compact('products'));
    }

    public function show($id)
    {
        $product = Product::with('categorie')->findOrFail($id);
        return view('front.products.show', compact('product'));
    }
}