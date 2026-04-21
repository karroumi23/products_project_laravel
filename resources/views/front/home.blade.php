@extends('front.layouts.app')

@section('content')

<h1>Bienvenue</h1>

<h3>Catégories</h3>
<ul>
    @foreach($categories as $cat)
        <li>{{ $cat->nom }}</li>
    @endforeach
</ul>

<h3>Derniers produits</h3>

<div class="row">
    @foreach($products as $product)
        <div class="col-md-4">
            <div class="card mb-3">
                <img src="{{ asset('storage/'.$product->image) }}" class="card-img-top">
                <div class="card-body">
                    <h5>{{ $product->nom }}</h5>
                    <p>{{ $product->prix }} MAD</p>
                </div>
            </div>
        </div>
    @endforeach
</div>

@endsection