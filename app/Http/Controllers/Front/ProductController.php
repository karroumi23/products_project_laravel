<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Categorie;

class ProductController extends Controller
{
    // Page d'accueil — 6 produits récents, sans filtres
    public function home()
    {
        $products = Product::with('categorie')->latest()->take(6)->get();
        return view('front.home', compact('products'));
    }

    // Page produits — tous les produits avec filtres
    public function index()
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

        $products = $query->paginate(12)->withQueryString();

        return view('front.products.index', compact('products', 'categories'));
    }

    // Page détail produit
    public function show($id)
    {
        $product = Product::with('categorie')->findOrFail($id);
        return view('front.products.show', compact('product'));
    }
}