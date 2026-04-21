@extends('front.layouts.app')

@section('content')

<h1>Produits</h1>

<div class="row">
@foreach($products as $product)
    <div class="col-md-4">
        <div class="card mb-3">
            <img src="{{ asset('storage/'.$product->image) }}" class="card-img-top">
            <div class="card-body">
                <h5>{{ $product->nom }}</h5>
                <p>{{ $product->prix }} MAD</p>
                <p>{{ $product->categorie->nom }}</p>
            </div>
        </div>
    </div>
@endforeach
</div>

@endsection