<?php

namespace App\Http\Controllers\Front;


use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Categorie;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function home()
    {
        $products = Product::with('categorie')->latest()->take(9)->get();

        // Charger les sections actives triées par ordre
        $sections = \App\Models\Section::where('enabled', true)
            ->orderBy('order')
            ->get()
            ->keyBy('name'); // accès par $sections['hero'], $sections['partners']...

        return view('front.home', compact('products', 'sections'));
    }

    // Page produits — tous les produits avec filtres
    public function index()
    {
        $categories = Categorie::whereNull('parent_id')
            ->with('enfants')
            ->get();

        $query = Product::with('categorie');

         // Recherche par nom
        if (request('search')) {
            $query->where('nom', 'like', '%' . request('search') . '%');
        }

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

        $similarProducts = Product::where('categorie_id', $product->categorie_id)
            ->where('id', '!=', $product->id)
            ->latest()
            ->take(4)
            ->get();

        return view('front.products.show', compact(
            'product',
            'similarProducts'
        ));
    }

    // page Contact
    public function contact()
    {
        return view('front.contact');
    }

    public function contactSubmit(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'email' => 'required|email',
            'telephone' => 'nullable|string',
            'sujet' => 'nullable|string',
            'message' => 'required|string',
        ]);

        return back()->with('success', 'Votre message a été envoyé avec succès !');
    }
}