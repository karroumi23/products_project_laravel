@extends('front.layouts.app')

@section('content')

<style>
    .products-page {
        --page-bg: #f5f6f7;
        --panel-bg: #ffffff;
        --ink: var(--slate-dark);
        --muted: var(--slate-light);
        --line: rgba(79, 88, 93, 0.12);
        --soft-red: rgba(219, 15, 15, 0.08);
        background:
            linear-gradient(180deg, #ffffff 0%, var(--page-bg) 34%, var(--page-bg) 100%);
        min-height: 100vh;
    }

    .products-hero {
        position: relative;
        overflow: hidden;
        background: var(--slate-dark);
        color: #fff;
        padding: 58px 0 34px;
        border-bottom: 3px solid #db0f0f;
    }

    .products-hero::before {
        content: '';
        position: absolute;
        inset: 0;
        background:
            radial-gradient(circle at 12% 18%, rgba(219, 15, 15, 0.22), transparent 28%),
            linear-gradient(135deg, rgba(255, 255, 255, 0.08), transparent 42%);
        pointer-events: none;
    }

    .products-hero .container {
        position: relative;
        z-index: 1;
    }

    .products-eyebrow {
        display: inline-flex;
        align-items: center;
        gap: 9px;
        margin-bottom: 14px;
        color: rgba(255, 255, 255, 0.72);
        font-size: 0.74rem;
        font-weight: 700;
        letter-spacing: 0.16em;
        text-transform: uppercase;
    }

    .products-eyebrow::before {
        content: '';
        width: 28px;
        height: 2px;
        background: #db0f0f;
        border-radius: 999px;
    }

    .products-hero-title {
        max-width: 760px;
        margin: 0;
        color: #fff;
        font-family: 'Barlow Condensed', sans-serif;
        font-size: clamp(2.2rem, 5vw, 4.2rem);
        font-weight: 800;
        line-height: 0.98;
        text-transform: uppercase;
    }

    .products-hero-title span {
        color: #db0f0f;
    }

    .products-hero-text {
        max-width: 660px;
        margin: 18px 0 0;
        color: rgba(255, 255, 255, 0.72);
        font-size: 1rem;
        line-height: 1.75;
    }

    .products-hero-meta {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        margin-top: 24px;
    }

    .products-meta-chip {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        min-height: 38px;
        padding: 8px 14px;
        border: 1px solid rgba(255, 255, 255, 0.14);
        border-radius: 6px;
        background: rgba(255, 255, 255, 0.06);
        color: rgba(255, 255, 255, 0.82);
        font-size: 0.82rem;
        font-weight: 600;
    }

    .products-meta-chip i {
        color: #db0f0f;
    }

    .products-toolbar {
        margin-top: -26px;
        position: relative;
        z-index: 2;
    }

    .filter-wrapper.products-filter {
        background: transparent;
        padding: 0;
        border: 0;
    }

    .products-filter-panel {
        background: #fff;
        border: 1px solid rgba(79, 88, 93, 0.1);
        border-radius: 8px;
        box-shadow: 0 18px 55px rgba(54, 62, 66, 0.12);
        overflow: hidden;
    }

    .products-filter .filter-row1 {
        display: grid;
        grid-template-columns: auto minmax(240px, 430px) auto;
        align-items: center;
        gap: 16px;
        margin: 0;
        padding: 18px;
        border-bottom: 1px solid rgba(79, 88, 93, 0.1);
    }

    .products-filter .filter-title {
        color: var(--slate-dark);
        font-size: 0.8rem;
        letter-spacing: 0.12em;
    }

    .products-filter .filter-title::before {
        width: 24px;
        background: #db0f0f;
    }

    .products-filter .search-bar {
        max-width: none;
    }

    .products-filter .search-bar input {
        height: 44px;
        background: #f5f6f7;
        border: 1px solid rgba(79, 88, 93, 0.14);
        border-radius: 6px;
        color: var(--slate-dark);
        font-size: 0.9rem;
        padding: 10px 40px 10px 40px;
    }

    .products-filter .search-bar input::placeholder {
        color: rgba(79, 88, 93, 0.48);
    }

    .products-filter .search-bar input:focus {
        background: #fff;
        border-color: #db0f0f;
        box-shadow: 0 0 0 4px rgba(219, 15, 15, 0.08);
    }

    .products-filter .search-icon,
    .products-filter .search-clear {
        color: rgba(79, 88, 93, 0.48);
    }

    .products-filter .search-clear:hover {
        color: #db0f0f;
    }

    .products-filter .filter-reset {
        justify-self: end;
        min-height: 38px;
        color: #db0f0f;
        border-color: rgba(219, 15, 15, 0.24);
        background: rgba(219, 15, 15, 0.06);
        border-radius: 5px;
    }

    .products-filter .filter-reset:hover {
        background: #db0f0f;
        border-color: #db0f0f;
        color: #fff;
    }

    .products-filter .filter-groups {
        display: grid;
        grid-template-columns: 1.2fr 1fr 0.8fr;
        gap: 0;
        border: 0;
        border-radius: 0;
    }

    .products-filter .filter-group-box {
        border-right: 1px solid rgba(79, 88, 93, 0.1);
        background: #fff;
    }

    .products-filter .filter-group-box:last-child {
        border-right: 0;
    }

    .products-filter .filter-group-label {
        padding: 12px 16px 8px;
        color: rgba(54, 62, 66, 0.62);
        background: #fff;
        border: 0;
        font-size: 0.68rem;
    }

    .products-filter .filter-group-label i {
        color: #db0f0f;
    }

    .products-filter .filter-group-pills {
        gap: 8px;
        padding: 0 16px 18px;
        background: #fff;
    }

    .products-filter .fpill {
        min-height: 34px;
        padding: 7px 13px;
        border-radius: 5px;
        border: 1px solid rgba(79, 88, 93, 0.14);
        background: #f8f9fa;
        color: var(--slate);
        font-size: 0.78rem;
    }

    .products-filter .fpill:hover {
        color: #db0f0f;
        border-color: rgba(219, 15, 15, 0.36);
        background: rgba(219, 15, 15, 0.06);
    }

    .products-filter .fpill.active {
        background: #db0f0f;
        border-color: #db0f0f;
        color: #fff;
        box-shadow: 0 8px 22px rgba(219, 15, 15, 0.22);
    }

    .products-filter .fpill-parent {
        color: var(--slate-dark);
    }

    .products-filter .fpill-children {
        border-top-color: rgba(79, 88, 93, 0.12);
    }

    .products-list-section {
        padding: 36px 0 64px;
    }

    .products-results-bar {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 16px;
        margin-bottom: 24px;
        padding: 0 0 18px;
        border-bottom: 1px solid rgba(79, 88, 93, 0.12);
    }

    .products-results-title {
        margin: 0;
        color: var(--slate-dark);
        font-family: 'Barlow Condensed', sans-serif;
        font-size: 1.9rem;
        font-weight: 800;
        line-height: 1;
        text-transform: uppercase;
    }

    .results-count {
        margin-top: 6px;
        color: var(--slate-light);
        font-size: 0.9rem;
    }

    .results-count strong {
        color: #db0f0f;
        font-weight: 800;
    }

    .active-filter-tags {
        display: flex;
        justify-content: flex-end;
        gap: 8px;
        flex-wrap: wrap;
    }

    .active-filter-tag {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        min-height: 31px;
        padding: 6px 11px;
        border-radius: 5px;
        background: rgba(219, 15, 15, 0.07);
        border: 1px solid rgba(219, 15, 15, 0.18);
        color: #db0f0f;
        font-size: 0.72rem;
        font-weight: 700;
        letter-spacing: 0.04em;
        text-transform: uppercase;
    }

    .product-card-pg {
        height: 100%;
        min-height: 0;
        display: flex;
        flex-direction: column;
        overflow: hidden;
        background: #fff;
        border: 1px solid rgba(79, 88, 93, 0.1);
        border-radius: 8px;
        box-shadow: 0 8px 28px rgba(54, 62, 66, 0.06);
        transition: transform 0.22s ease, box-shadow 0.22s ease, border-color 0.22s ease;
    }

    .product-card-pg:hover {
        transform: translateY(-5px);
        border-color: rgba(219, 15, 15, 0.28);
        box-shadow: 0 18px 46px rgba(54, 62, 66, 0.14);
    }

    /* .product-card-media {
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        height: 230px;
        padding: 20px;
        background:
            linear-gradient(180deg, #fff 0%, #fafafa 100%);
        border-bottom: 1px solid rgba(79, 88, 93, 0.08);
    } */
    .product-card-media {
        position: relative;
        height: 260px;
        padding: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        background: #fff;
     }
    .product-card-media::after {
        content: '';
        position: absolute;
        left: 18px;
        right: 18px;
        bottom: -1px;
        height: 2px;
        background: #db0f0f;
        transform: scaleX(0);
        transform-origin: left;
        transition: transform 0.25s ease;
    }

    .product-card-pg:hover .product-card-media::after {
        transform: scaleX(1);
    }

    .product-card-media img {
        display: block;
        max-width: 100%;
        max-height: 100%;
        width: auto;
        height: auto;
        object-fit: contain;
        transition: transform .35s ease;
    }

    /* .product-card-pg:hover .product-card-media img {
        transform: scale(1.05);
    } */

    .product-card-badge {
        position: absolute;
        top: 14px;
        left: 14px;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        max-width: calc(100% - 28px);
        min-height: 28px;
        padding: 5px 10px;
        border-radius: 5px;
        background: rgba(54, 62, 66, 0.9);
        color: #fff;
        font-size: 0.68rem;
        font-weight: 700;
        letter-spacing: 0.04em;
        text-transform: uppercase;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .product-card-badge i {
        color: #db0f0f;
        flex: 0 0 auto;
    }

    .product-card-body {
        display: flex;
        flex: 1;
        flex-direction: column;
        padding: 18px 18px 16px;
    }

    .product-card-name {
        margin: 0;
        color: var(--slate-dark);
        font-family: 'Barlow Condensed', sans-serif;
        font-size: 1.25rem;
        font-weight: 800;
        line-height: 1.08;
        text-transform: uppercase;
    }

    .product-card-price-row {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
        margin-top: 12px;
    }

    .product-card-price {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        width: fit-content;
        padding: 7px 11px;
        border-radius: 5px;
        background: #db0f0f;
        color: #fff;
        font-size: 0.84rem;
        font-weight: 800;
        line-height: 1;
    }

    .product-card-stock {
        color: var(--slate-light);
        font-size: 0.74rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.06em;
        white-space: nowrap;
    }

    .product-description {
        margin-top: 14px;
    }

    .description-text {
        display: -webkit-box;
        -webkit-line-clamp: 3;
        line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
        color: #626c71;
        font-size: 0.9rem;
        line-height: 1.7;
    }

    .description-text.expanded {
        display: block;
        overflow: visible;
    }

    .voir-plus-btn {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        margin-top: 8px;
        padding: 0;
        border: none;
        background: transparent;
        color: #db0f0f;
        cursor: pointer;
        font-size: 0.82rem;
        font-weight: 700;
    }

    .voir-plus-btn:hover {
        color: var(--slate-dark);
    }

    .product-card-footer {
        margin-top: auto;
        padding: 0 18px 18px;
    }

    .btn-detail {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        width: 100%;
        min-height: 42px;
        padding: 10px 16px;
        border-radius: 6px;
        background: var(--slate-dark);
        color: #fff;
        font-size: 0.76rem;
        font-weight: 800;
        letter-spacing: 0.08em;
        text-decoration: none;
        text-transform: uppercase;
        transition: background 0.18s ease, transform 0.18s ease;
    }

    .btn-detail:hover {
        background: #db0f0f;
        color: #fff;
        transform: translateY(-1px);
    }

    .products-empty {
        padding: 58px 22px;
        border: 1px dashed rgba(79, 88, 93, 0.2);
        border-radius: 8px;
        background: #fff;
        text-align: center;
    }

    .products-empty-icon {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 58px;
        height: 58px;
        margin-bottom: 14px;
        border-radius: 8px;
        background: rgba(219, 15, 15, 0.08);
        color: #db0f0f;
        font-size: 1.7rem;
    }

    .products-empty p {
        color: var(--slate-light);
        margin-bottom: 18px;
    }

    .products-empty .btn-hero-primary {
        width: fit-content;
        margin: 0 auto;
        display: inline-flex;
    }

    .products-page .pagination .page-link {
        color: var(--slate-dark);
        border-color: rgba(79, 88, 93, 0.16);
        border-radius: 5px !important;
        margin: 0 3px;
    }

    .products-page .pagination .page-link:hover,
    .products-page .pagination .page-item.active .page-link {
        background: #db0f0f;
        border-color: #db0f0f;
        color: #fff;
    }

    @media (max-width: 991px) {
        .products-filter .filter-row1 {
            grid-template-columns: 1fr;
        }

        .products-filter .filter-reset {
            justify-self: start;
        }

        .products-filter .filter-groups {
            grid-template-columns: 1fr;
        }

        .products-filter .filter-group-box,
        .products-filter .filter-group-box:last-child {
            border-right: 0;
            border-bottom: 1px solid rgba(79, 88, 93, 0.1);
        }

        .products-filter .filter-group-box:last-child {
            border-bottom: 0;
        }
    }

    @media (max-width: 575px) {
        .products-hero {
            padding: 42px 0 32px;
        }

        .products-results-bar {
            align-items: flex-start;
            flex-direction: column;
        }

        .active-filter-tags {
            justify-content: flex-start;
        }

        .product-card-media {
            height: 210px;
        }
    }
</style>

<main class="products-page">
    <section class="products-hero">
        <div class="container">
            <div class="products-eyebrow">Catalogue produits</div>
            <h1 class="products-hero-title">
                Nos solutions <span>professionnelles</span>
            </h1>
            <p class="products-hero-text">
                Explorez une sélection d'équipements et instruments techniques pour laboratoire,
                industrie, contrôle et métrologie.
            </p>
            <div class="products-hero-meta">
                <span class="products-meta-chip">
                    <i class="bi bi-grid-3x3-gap-fill"></i>
                    {{ $products->total() }} produit{{ $products->total() > 1 ? 's' : '' }}
                </span>
                <span class="products-meta-chip">
                    <i class="bi bi-funnel-fill"></i>
                    Filtres rapides
                </span>
                <span class="products-meta-chip">
                    <i class="bi bi-shield-check"></i>
                    Matériel sélectionné
                </span>
            </div>
        </div>
    </section>

    {{-- FILTER --}}
    <div class="filter-wrapper products-filter products-toolbar">
        <div class="container">
            <div class="products-filter-panel">
                <form method="GET" action="{{ url('/products') }}" id="filterForm">
                    <div class="filter-row1">
                        <span class="filter-title">Filtrer les produits</span>

                        <div class="search-bar">
                            <i class="bi bi-search search-icon"></i>
                            <input
                                type="text"
                                id="searchInput"
                                placeholder="Rechercher un produit..."
                                value="{{ request('search') }}"
                                autocomplete="off"
                            >
                            <span class="search-clear" id="searchClear"
                                  style="{{ request('search') ? '' : 'display:none' }}">
                                <i class="bi bi-x"></i>
                            </span>
                        </div>

                        @if(request('categorie') || request('prix') || request('tri') || request('search'))
                            <a href="{{ url('/products') }}" class="filter-reset">
                                <i class="bi bi-x-lg"></i> Réinitialiser
                            </a>
                        @endif
                    </div>

                    <div class="filter-groups">
                        {{-- Catégorie --}}
                        <div class="filter-group-box">
                            <div class="filter-group-label">
                                <i class="bi bi-tag-fill"></i> Catégorie
                            </div>
                            <div class="filter-group-pills">
                                <button type="button"
                                    class="fpill {{ !request('categorie') ? 'active' : '' }}"
                                    onclick="setFilter('categorie', '')">Toutes</button>
                                @foreach($categories as $cat)
                                    @if($cat->enfants->count())
                                        <button type="button"
                                            class="fpill fpill-parent {{ request('categorie') && $cat->enfants->pluck('id')->contains(request('categorie')) ? 'active' : '' }}"
                                            onclick="toggleChildren('children-{{ $cat->id }}')">
                                            {{ $cat->nom }} <i class="bi bi-chevron-down fpill-arrow"></i>
                                        </button>
                                        <div class="fpill-children {{ request('categorie') && $cat->enfants->pluck('id')->contains(request('categorie')) ? 'open' : '' }}"
                                             id="children-{{ $cat->id }}">
                                            @foreach($cat->enfants as $enfant)
                                                <button type="button"
                                                    class="fpill fpill-child {{ request('categorie') == $enfant->id ? 'active' : '' }}"
                                                    onclick="setFilter('categorie', '{{ $enfant->id }}')">
                                                    {{ $enfant->nom }}
                                                </button>
                                            @endforeach
                                        </div>
                                    @else
                                        <button type="button"
                                            class="fpill {{ request('categorie') == $cat->id ? 'active' : '' }}"
                                            onclick="setFilter('categorie', '{{ $cat->id }}')">
                                            {{ $cat->nom }}
                                        </button>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        {{-- prix --}}
                        <div class="filter-group-box">
                            <div class="filter-group-label">
                                <i class="bi bi-bar-chart-fill"></i> Prix
                            </div>
                            <div class="filter-group-pills">
                                <button type="button" class="fpill {{ !request('prix') ? 'active' : '' }}"
                                    onclick="setFilter('prix', '')">Défaut</button>
                                <button type="button" class="fpill {{ request('prix') == 'asc' ? 'active' : '' }}"
                                    onclick="setFilter('prix', 'asc')">
                                    <i class="bi bi-sort-numeric-down"></i> Croissant
                                </button>
                                <button type="button" class="fpill {{ request('prix') == 'desc' ? 'active' : '' }}"
                                    onclick="setFilter('prix', 'desc')">
                                    <i class="bi bi-sort-numeric-up"></i> Décroissant
                                </button>
                            </div>
                        </div>
                        {{-- Ancienneté --}}
                        <div class="filter-group-box">
                            <div class="filter-group-label">
                                <i class="bi bi-clock-fill"></i> Ancienneté
                            </div>
                            <div class="filter-group-pills">
                                <button type="button" class="fpill {{ !request('tri') ? 'active' : '' }}"
                                    onclick="setFilter('tri', '')">
                                    <i class="bi bi-stars"></i> Récents
                                </button>
                                <button type="button" class="fpill {{ request('tri') == 'ancien' ? 'active' : '' }}"
                                    onclick="setFilter('tri', 'ancien')">
                                    <i class="bi bi-hourglass-split"></i> Anciens
                                </button>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="categorie" id="input-categorie" value="{{ request('categorie') }}">
                    <input type="hidden" name="prix" id="input-prix" value="{{ request('prix') }}">
                    <input type="hidden" name="tri" id="input-tri" value="{{ request('tri') }}">
                    <input type="hidden" name="search" id="input-search" value="{{ request('search') }}">
                </form>
            </div>
        </div>
    </div>

    {{-- PRODUCTS --}}
    <section class="products-list-section">
        <div class="container">
            <div class="products-results-bar">
                <div>
                    <h2 class="products-results-title">Catalogue</h2>
                    <div class="results-count">
                        <strong>{{ $products->total() }}</strong>
                        produit{{ $products->total() > 1 ? 's' : '' }} trouvé{{ $products->total() > 1 ? 's' : '' }}
                    </div>
                </div>

                <div class="active-filter-tags">
                    @if(request('search'))
                        <span class="active-filter-tag"><i class="bi bi-search"></i> "{{ request('search') }}"</span>
                    @endif
                    @if(request('categorie'))
                        <span class="active-filter-tag"><i class="bi bi-tag-fill"></i> Catégorie filtrée</span>
                    @endif
                    @if(request('prix') == 'asc')
                        <span class="active-filter-tag"><i class="bi bi-sort-numeric-down"></i> Prix croissant</span>
                    @elseif(request('prix') == 'desc')
                        <span class="active-filter-tag"><i class="bi bi-sort-numeric-up"></i> Prix décroissant</span>
                    @endif
                    @if(request('tri') == 'ancien')
                        <span class="active-filter-tag"><i class="bi bi-hourglass-split"></i> Anciens d'abord</span>
                    @endif
                </div>
            </div>

            <div class="row g-4">
                @forelse($products as $product)
                    <div class="col-sm-6 col-lg-4">
                        <article class="product-card-pg">
                            <div class="product-card-media">
                                @if($product->categorie)
                                    <span class="product-card-badge" title="{{ $product->categorie->nom }}">
                                        <i class="bi bi-tag-fill"></i>
                                        {{ $product->categorie->nom }}
                                    </span>
                                @endif
                                <img
                                    src="{{ $product->image ? asset('storage/'.$product->image) : asset('images/logo.png') }}"
                                    alt="{{ $product->nom }}"
                                >
                            </div>

                            <div class="product-card-body">
                                <h3 class="product-card-name" title="{{ $product->nom }}">
                                    {{ $product->nom }}
                                </h3>

                                <div class="product-card-price-row">
                                    <div class="product-card-price">
                                        <i class="bi bi-tag-fill"></i>
                                        {{ number_format($product->prix, 2) }} MAD
                                    </div>
                                    @if($product->stock > 0)
                                        <span class="product-card-stock">En stock</span>
                                    @else
                                        <span class="product-card-stock">Sur commande</span>
                                    @endif
                                </div>

                                @if($product->description)
                                    <div class="product-description">
                                        <span class="description-text">
                                            {{ $product->description }}
                                        </span>

                                        @if(Str::length($product->description) > 150)
                                            <button type="button" class="voir-plus-btn">
                                                Voir plus <i class="bi bi-chevron-down"></i>
                                            </button>
                                        @endif
                                    </div>
                                @endif
                            </div>

                            <div class="product-card-footer">
                                <a href="/products/{{ $product->id }}" class="btn-detail">
                                    <i class="bi bi-eye"></i>
                                    Voir le produit
                                </a>
                            </div>
                        </article>
                    </div>
               {{-- filter if empty --}}
                @empty
                    <div class="col-12">
                        <div class="products-empty">
                            <div class="products-empty-icon">
                                <i class="bi bi-search"></i>
                            </div>
                            <p>Aucun produit ne correspond à votre recherche.</p>
                            <a href="{{ url('/products') }}" class="btn-hero-primary">
                                <i class="bi bi-arrow-counterclockwise"></i>
                                Réinitialiser
                            </a>
                        </div>
                    </div>
                @endempty
            </div>

            @if($products->hasPages())
                <div class="d-flex justify-content-center mt-5">
                    {{ $products->links('pagination::bootstrap-5') }}
                </div>
            @endif
        </div>
    </section>
</main>

<script>
    const searchInput = document.getElementById('searchInput');
    const searchClear = document.getElementById('searchClear');
    let searchTimer;

    if (searchInput && searchClear) {
        searchInput.addEventListener('input', function () {
            clearTimeout(searchTimer);
            searchClear.style.display = this.value ? '' : 'none';

            searchTimer = setTimeout(function () {
                document.getElementById('input-search').value = searchInput.value;
                document.getElementById('filterForm').submit();
            }, 400);
        });

        searchClear.addEventListener('click', function () {
            searchInput.value = '';
            document.getElementById('input-search').value = '';
            document.getElementById('filterForm').submit();
        });
    }

    function setFilter(name, value) {
        document.getElementById('input-' + name).value = value;
        document.getElementById('filterForm').submit();
    }

    function toggleChildren(id) {
        document.getElementById(id).classList.toggle('open');
    }

    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.voir-plus-btn').forEach(function (button) {
            button.addEventListener('click', function () {
                const text = this.previousElementSibling;
                const expanded = text.classList.toggle('expanded');

                this.innerHTML = expanded
                    ? 'Voir moins <i class="bi bi-chevron-up"></i>'
                    : 'Voir plus <i class="bi bi-chevron-down"></i>';
            });
        });
    });
</script>

@endsection
