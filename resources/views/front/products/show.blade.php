@extends('front.layouts.app')

@section('content')

<div class="row">
    <div class="col-md-6">
        <img src="{{ asset('storage/'.$product->image) }}" class="img-fluid">
    </div>

    <div class="col-md-6">
        <h1>{{ $product->nom }}</h1>
        <h3>{{ $product->prix }} MAD</h3>
        <p>{{ $product->description }}</p>
        <p><strong>Catégorie:</strong> {{ $product->categorie->nom }}</p>
    </div>
</div>

@endsection