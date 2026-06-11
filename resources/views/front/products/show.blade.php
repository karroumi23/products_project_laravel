@extends('front.layouts.app')

@section('content')

<div class="container py-5">

    <!-- Breadcrumb -->
    <nav class="mb-4">
        <small>
            <a href="/">Accueil</a> /
            <a href="/products">Produits</a> /
            {{ $product->categorie->nom }} /
            {{ $product->nom }}
        </small>
    </nav>

    <!-- Product -->
    <div class="product-show-card">

        <div class="row g-5">

            <!-- Image -->
            <div class="col-lg-6">
                <div class="product-image-box">
                    <img
                        src="{{ asset('storage/'.$product->image) }}"
                        alt="{{ $product->nom }}"
                        class="img-fluid">
                </div>
            </div>

            <!-- Info -->
            <div class="col-lg-6">

                <span class="product-category">
                    {{ $product->categorie->nom }}
                </span>

                <h1 class="product-title">
                    {{ $product->nom }}
                </h1>

                <div class="product-price">
                    {{ number_format($product->prix, 2) }} MAD
                </div>

                @if($product->stock > 0)
                    <span class="badge bg-success mb-3">
                        En stock
                    </span>
                @else
                    <span class="badge bg-danger mb-3">
                        Sur commande
                    </span>
                @endif

                <p class="product-short-description">
                    {{ Str::limit($product->description, 250) }}
                </p>

                <div class="d-flex gap-3 flex-wrap mt-4">

                    <a href="https://wa.me/212669809872?text={{ urlencode('Bonjour, je souhaite demander un devis pour le produit : '.$product->nom) }}"
                        target="_blank"
                        class="btn-whatsapp">
                         <i class="bi bi-whatsapp"></i>
                         Demander un devis
                     </a>

                    <a href="/contact"
                       class="btn-contact">
                        <i class="bi bi-envelope"></i>
                        Contactez-nous
                    </a>

                </div>

            </div>

        </div>
    </div>

    <!-- Product Details -->
    <div class="info-card mt-5">

        <h3 class="section-title mb-4">
            Informations Produit
        </h3>

        <div class="row">

            <div class="col-md-6">
                <p><strong>Catégorie :</strong> {{ $product->categorie->nom }}</p>
                <p><strong>Prix HT :</strong> {{ $product->prix }} MAD</p>
            </div>

            <div class="col-md-6">
                <p><strong>TVA :</strong> {{ $product->tva }} %</p>
                <p><strong>Prix TTC :</strong> {{ $product->prix_ttc }} MAD</p>
            </div>

        </div>

    </div>

    <!-- Description -->
    <div class="info-card mt-4">

        <h3 class="section-title mb-4">
            Description
        </h3>

        <p class="product-description">
            {!! nl2br(e($product->description)) !!}
        </p>

    </div>

    <!-- Similar Products -->
    @if($similarProducts->count())

    <div class="mt-5">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="section-title">
                Produits similaires
            </h2>
        </div>

        <div class="row">

            @foreach($similarProducts as $item)

            <div class="col-lg-3 col-md-6 mb-4">

                <div class="product-card">

                    <div class="product-card-img-wrap">
                        <img
                            src="{{ asset('storage/'.$item->image) }}"
                            alt="{{ $item->nom }}">
                    </div>

                    <div class="product-card-body">

                        <div class="product-card-name">
                            {{ $item->nom }}
                        </div>

                        <div class="product-card-price">
                            <i class="bi bi-tag-fill"></i>
                            {{ $item->prix }} MAD
                        </div>

                    </div>

                    <div class="product-card-footer">
                        <a href="/products/{{ $item->id }}"
                           class="btn-detail">
                            <i class="bi bi-eye"></i>
                            Voir le produit
                        </a>
                    </div>

                </div>

            </div>

            @endforeach

        </div>

    </div>

    @endif

</div>

@endsection