@extends('front.layouts.app')

@section('content')

<style>
    .product-detail-page {
        background: linear-gradient(180deg, #fff 0%, #f5f6f7 34%, #f5f6f7 100%);
    }

    .product-breadcrumb {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        gap: 8px;
        margin-bottom: 22px;
        color: var(--slate-light);
        font-size: 0.82rem;
    }

    .product-breadcrumb a {
        color: var(--slate-dark);
        text-decoration: none;
        font-weight: 700;
    }

    .product-breadcrumb a:hover {
        color: #db0f0f;
    }

    .product-show-card {
        padding: clamp(22px, 4vw, 36px);
        border: 1px solid rgba(79, 88, 93, 0.1);
        border-radius: 8px;
        background: #fff;
        box-shadow: 0 18px 55px rgba(54, 62, 66, 0.11);
    }

    .product-image-box {
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 440px;
        padding: 28px;
        border: 1px solid rgba(79, 88, 93, 0.1);
        border-radius: 8px;
        background: linear-gradient(180deg, #fff 0%, #fafafa 100%);
    }

    .product-image-box img {
        width: 100%;
        max-height: 420px;
        object-fit: contain;
    }

    .product-category {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        min-height: 32px;
        padding: 7px 12px;
        border-radius: 5px;
        background: rgba(219, 15, 15, 0.09);
        color: #db0f0f;
        font-size: 0.75rem;
        font-weight: 800;
        letter-spacing: 0.06em;
        text-transform: uppercase;
    }

    .product-title {
        margin: 18px 0 14px;
        color: var(--slate-dark);
        font-family: 'Barlow Condensed', sans-serif;
        font-size: clamp(2.1rem, 4vw, 3.4rem);
        font-weight: 800;
        line-height: 1;
        text-transform: uppercase;
    }

    .product-price {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        margin-bottom: 16px;
        color: #db0f0f;
        font-size: 1.55rem;
        font-weight: 800;
    }

    .product-status {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        margin-bottom: 18px;
        padding: 7px 12px;
        border-radius: 5px;
        font-size: 0.78rem;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 0.06em;
    }

    .product-status.in-stock {
        background: rgba(25, 135, 84, 0.1);
        color: #198754;
    }

    .product-status.on-order {
        background: rgba(220, 53, 69, 0.1);
        color: #dc3545;
    }

    .product-short-description,
    .product-description-full {
        color: var(--slate-light);
        line-height: 1.85;
    }

    .product-actions .btn-whatsapp,
    .product-actions .btn-contact {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 9px;
        min-height: 46px;
        padding: 12px 20px;
        border-radius: 6px;
        color: #fff;
        text-decoration: none;
        font-size: 0.84rem;
        font-weight: 800;
        letter-spacing: 0.04em;
        text-transform: uppercase;
        transition: transform 0.2s, background 0.2s;
    }

    .product-actions .btn-whatsapp {
        background: #25D366;
    }

    .product-actions .btn-contact {
        background: var(--slate-dark);
    }

    .product-actions .btn-whatsapp:hover,
    .product-actions .btn-contact:hover {
        transform: translateY(-2px);
        color: #fff;
    }

    .product-actions .btn-whatsapp:hover {
        background: #1ebe5d;
    }

    .product-actions .btn-contact:hover {
        background: #db0f0f;
    }

    .info-card {
        padding: 28px;
        border: 1px solid rgba(79, 88, 93, 0.1);
        border-radius: 8px;
        background: #fff;
        box-shadow: 0 10px 32px rgba(54, 62, 66, 0.07);
    }

    .info-card h2 {
        margin: 0 0 22px;
        color: var(--slate-dark);
        font-family: 'Barlow Condensed', sans-serif;
        font-size: 2rem;
        font-weight: 800;
        text-transform: uppercase;
    }

    .spec-grid {
        display: grid;
        grid-template-columns: repeat(4, minmax(0, 1fr));
        gap: 12px;
    }

    .spec-item {
        padding: 16px;
        border: 1px solid rgba(79, 88, 93, 0.1);
        border-radius: 8px;
        background: #f8f9fa;
    }

    .spec-item span {
        display: block;
        margin-bottom: 6px;
        color: var(--slate-light);
        font-size: 0.72rem;
        font-weight: 800;
        letter-spacing: 0.08em;
        text-transform: uppercase;
    }

    .spec-item strong {
        color: var(--slate-dark);
        font-size: 0.95rem;
    }

    @media (max-width: 991px) {
        .product-image-box {
            min-height: 340px;
        }

        .spec-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }
    }

    @media (max-width: 575px) {
        .product-actions a {
            width: 100%;
        }

        .spec-grid {
            grid-template-columns: 1fr;
        }
    }
</style>

<main class="product-detail-page">
    <section class="site-section">
        <div class="container">
            <nav class="product-breadcrumb" aria-label="Fil d'Ariane">
                <a href="/">Accueil</a>
                <i class="bi bi-chevron-right"></i>
                <a href="/products">Produits</a>
                <i class="bi bi-chevron-right"></i>
                <span>{{ $product->categorie->nom }}</span>
            </nav>

            <div class="product-show-card">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6">
                        <div class="product-image-box">
                            <img
                                src="{{ $product->image ? asset('storage/'.$product->image) : asset('images/logo.png') }}"
                                alt="{{ $product->nom }}"
                                class="img-fluid">
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <span class="product-category">
                            <i class="bi bi-tag-fill"></i>
                            {{ $product->categorie->nom }}
                        </span>

                        <h1 class="product-title">{{ $product->nom }}</h1>

                        <div class="product-price">
                            <i class="bi bi-cash-stack"></i>
                            {{ number_format($product->prix, 2) }} MAD
                        </div>

                        <div>
                            @if($product->stock > 0)
                                <span class="product-status in-stock">
                                    <i class="bi bi-check-circle-fill"></i>
                                    En stock
                                </span>
                            @else
                                <span class="product-status on-order">
                                    <i class="bi bi-clock-fill"></i>
                                    Sur commande
                                </span>
                            @endif
                        </div>

                        <p class="product-short-description">
                            {{ Str::limit($product->description, 260) }}
                        </p>

                        <div class="product-actions d-flex gap-3 flex-wrap mt-4">
                            <a href="https://wa.me/212669809872?text={{ urlencode('Bonjour, je souhaite demander un devis pour le produit : '.$product->nom) }}"
                               target="_blank"
                               class="btn-whatsapp">
                                <i class="bi bi-whatsapp"></i>
                                Demander un devis
                            </a>

                            <a href="/contact" class="btn-contact">
                                <i class="bi bi-envelope"></i>
                                Contactez-nous
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="info-card mt-4">
                <h2>Informations produit</h2>
                <div class="spec-grid">
                    <div class="spec-item">
                        <span>Catégorie</span>
                        <strong>{{ $product->categorie->nom }}</strong>
                    </div>
                    <div class="spec-item">
                        <span>Prix HT</span>
                        <strong>{{ number_format($product->prix, 2) }} MAD</strong>
                    </div>
                    <div class="spec-item">
                        <span>TVA</span>
                        <strong>{{ $product->tva }} %</strong>
                    </div>
                    <div class="spec-item">
                        <span>Prix TTC</span>
                        <strong>{{ number_format($product->prix_ttc, 2) }} MAD</strong>
                    </div>
                </div>
            </div>

            <div class="info-card mt-4">
                <h2>Description</h2>
                <p class="product-description-full mb-0">
                    {!! nl2br(e($product->description)) !!}
                </p>
            </div>

            @if($similarProducts->count())
                <div class="mt-5">
                    <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">
                        <h2 class="section-title mb-0">Produits similaires</h2>
                        <a href="/products" class="btn-voir-tous">
                            <i class="bi bi-grid"></i>
                            Voir le catalogue
                        </a>
                    </div>

                    <div class="row g-4">
                        @foreach($similarProducts as $item)
                            <div class="col-lg-3 col-md-6">
                                <div class="product-card h-100">
                                    <div class="product-card-img-wrap">
                                        <img
                                            src="{{ $item->image ? asset('storage/'.$item->image) : asset('images/logo.png') }}"
                                            alt="{{ $item->nom }}">
                                    </div>

                                    <div class="product-card-body">
                                        <div class="product-card-name" title="{{ $item->nom }}">
                                            {{ $item->nom }}
                                        </div>
                                        <div class="product-card-price">
                                            <i class="bi bi-tag-fill"></i>
                                            {{ number_format($item->prix, 2) }} MAD
                                        </div>
                                    </div>

                                    <div class="product-card-footer">
                                        <a href="/products/{{ $item->id }}" class="btn-detail">
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
    </section>
</main>

@endsection
