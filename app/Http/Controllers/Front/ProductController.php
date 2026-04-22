<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Categorie;

class ProductController extends Controller
{
    public function home()
{
    $categories = Categorie::whereNull('parent_id')
        ->with('enfants')
        ->get();

    $query = Product::with('categorie');

    // Filtre catégorie
    if (request('categorie')) {
        $query->where('categorie_id', request('categorie'));
    }

    // Filtre prix
    if (request('prix') === 'asc') {
        $query->orderBy('prix', 'asc');
    } elseif (request('prix') === 'desc') {
        $query->orderBy('prix', 'desc');
    }

    // Ancienneté
    if (request('tri') === 'ancien') {
        $query->oldest();
    } else {
        $query->latest();
    }

    $products = $query->get(); // ← بدون take()

    return view('front.home', compact('products', 'categories'));
}

}