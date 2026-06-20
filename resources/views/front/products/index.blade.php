@extends('front.layouts.app')
@section('content')

<style>
    .product-card-pg {
        background: #fff; border-radius: 8px; overflow: hidden;
        display: flex; flex-direction: column;
        height: auto;
        min-height:28rem;
        border: 1px solid rgba(79,88,93,0.08);
        transition: box-shadow 0.22s, transform 0.22s;
        position: relative;
    }
    .product-card-pg:hover {
        box-shadow: 0 12px 40px rgba(79,88,93,0.14);
        transform: translateY(-4px);
    }

        /* Show full image without cropping */
    .product-card-img-wrap {
        width: 100%;
        height: 200px;
        flex-shrink: 0;
        overflow: hidden;
        background: #fff;
        position: relative;
        padding: 10px;
    }
    .product-card-img-wrap img {
        width: 100%;
        height: 100%;
        object-fit: contain;   /* ← full image visible */
        object-position: center center;
        transition: transform 0.5s ease;
        display: block;
    }
    .product-card-pg:hover .product-card-img-wrap img {
        transform: scale(1.06);
    }
    .product-card-img-wrap::after {
        content: '';
        position: absolute;
        bottom: 0; left: 0;
        width: 100%;
        height: 2px;
        background: #db0f0f;
        transform: scaleX(0);
        transform-origin: left;
        transition: transform 0.3s ease;
    }
    .product-card-pg:hover .product-card-img-wrap::after {
        transform: scaleX(1);
    }
    .product-card-body {
        padding: 12px 16px 8px 16px;
        display: flex;
        flex-direction: column;
        flex: 1;
        min-height: 0;
    }
    .product-card-name {
        font-family: 'Barlow Condensed', sans-serif;
        font-size: 1rem; font-weight: 700; color: var(--slate-dark);
        letter-spacing: 0.03em; text-transform: uppercase; margin-bottom: 6px;
        white-space: nowrap; overflow: hidden; text-overflow: ellipsis;
    }
    .product-card-price {
        display: inline-flex; align-items: center; gap: 4px;
        background: #db0f0f; color: #fff;
        font-weight: 700; font-size: 0.8rem;
        padding: 3px 10px; border-radius: 2px; width: fit-content;
    }
    /* Clamp description to 3 lines */

    .product-card-footer { padding: 0 16px 14px 16px; margin-top: auto; }
    .btn-detail {
        display: flex; align-items: center; justify-content: center; gap: 7px;
        width: 100%; background: var(--slate-dark); color: #fff;
        font-size: 0.72rem; font-weight: 700; letter-spacing: 0.08em;
        text-transform: uppercase; padding: 9px 16px; border-radius: 4px;
        text-decoration: none; transition: background 0.18s;
    }
    .btn-detail:hover { background: #db0f0f; color: #fff; }

    .slider-dot.active { background: #db0f0f; width: 22px; border-radius: 4px; }
    .btn-voir-tous {
        display: inline-flex; align-items: center; gap: 6px;
        font-size: 0.75rem; font-weight: 700; letter-spacing: 0.06em;
        text-transform: uppercase; color: #fff; background: #db0f0f;
        border: 1.5px solid #db0f0f; padding: 8px 18px; border-radius: 4px;
        text-decoration: none; transition: all 0.18s; white-space: nowrap;
    }
    .btn-voir-tous:hover {
        background: var(--slate-dark);
        border-color: var(--slate-dark);
        color: #fff;
    }

    .product-description {
      margin-top: 12px;
    }

    .description-text {
        display: -webkit-box;
        -webkit-line-clamp: 3;
        line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
        color: #5a5a5a;
        line-height: 1.7;
        font-size: 0.95rem;
    }

    .description-text.expanded {
        display: block;
        overflow: visible;
    }

    .voir-plus-btn {
        border: none;
        background: transparent;
        color: #db0f0f;
        font-weight: 600;
        font-size: .85rem;
        padding: 0;
        margin-top: 6px;
        cursor: pointer;
    }

    .voir-plus-btn:hover {
        color: var(--slate-dark);
    }

   /* Responsive */
    @media (max-width: 1199px) {
        .slide-item {
            flex: 0 0 calc(33.333% - 11px);
            min-width: calc(33.333% - 11px);
        }
    }
    @media (max-width: 991px) {
        .slide-item {
            flex: 0 0 calc(50% - 8px);
            min-width: calc(50% - 8px);
        }
    }
    @media (max-width: 575px) {
        .slide-item { flex: 0 0 100%; min-width: 100%; }
    }
</style>


 {{-- FILTER --}}
<div class="filter-wrapper">
    <div class="container">
        <form method="GET" action="{{ url('/products') }}" id="filterForm">

            {{-- Row 1: title + search + reset --}}
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

            {{-- Row 2: filter groups --}}
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

                {{-- Prix --}}
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
            <input type="hidden" name="prix"      id="input-prix"      value="{{ request('prix') }}">
            <input type="hidden" name="tri"       id="input-tri"       value="{{ request('tri') }}">
            <input type="hidden" name="search"    id="input-search"    value="{{ request('search') }}">
        </form>
    </div>
</div>

{{-- PRODUCTS --}}
<section class="products-section">
    <div class="container">
         {{-- filter --}}
        <div class="results-bar">
            <div class="results-count">
                <strong>{{ $products->total() }}</strong>
                produit{{ $products->total() > 1 ? 's' : '' }} trouvé{{ $products->total() > 1 ? 's' : '' }}
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
                <div class="product-card-pg">
                    <div class="product-card-img-wrap">
                        <img src="{{ asset('storage/'.$product->image) }}" alt="{{ $product->nom }}">
                    </div>

                    <div class="product-card-body">
                        <div class="product-card-name">
                            {{ $product->nom }}
                        </div>

                        <div class="product-card-price">
                            <i class="bi bi-tag-fill"></i>
                            {{ $product->prix }} MAD
                        </div>

                        <div class="product-description">
                            <span class="description-text">
                                {{ $product->description }}
                            </span>

                            @if(strlen($product->description) > 150)
                                <button class="voir-plus-btn">
                                    Voir plus
                                </button>
                            @endif
                        </div>
                    </div>

                    <div class="product-card-footer">
                        <a href="/products/{{ $product->id }}" class="btn-detail">
                            <i class="bi bi-eye"></i>
                            Voir le produit
                        </a>
                    </div>
                </div>
            </div>
            @empty
                <div class="col-12 text-center py-5">
                    <i class="bi bi-search" style="font-size:2.5rem; color:#db0f0f; opacity:0.4"></i>
                    <p class="mt-3" style="color:var(--slate-light)">Aucun produit trouvé.</p>
                    <a href="{{ url('/products') }}" class="btn-hero-primary mt-2"
                       style="width:fit-content; margin:0 auto; display:inline-flex">
                        Réinitialiser
                    </a>
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








{{-- search by name script --}}
<script>
    // Live search — soumet après 400ms sans frappe
        const searchInput = document.getElementById('searchInput');
        const searchClear = document.getElementById('searchClear');
        let searchTimer;

        searchInput.addEventListener('input', function () {
            clearTimeout(searchTimer);
            // Affiche/masque le X
            searchClear.style.display = this.value ? '' : 'none';
            // Attend 400ms puis soumet
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
</script>

<script>
    function setFilter(name, value) {
        document.getElementById('input-' + name).value = value;
        document.getElementById('filterForm').submit();
    }
    function toggleChildren(id) {
        document.getElementById(id).classList.toggle('open');
    }
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.product-card').forEach(function (card) {
            var desc = card.querySelector('.product-card-desc');
            var btn  = card.querySelector('.btn-voir-plus');
            if (desc.scrollHeight > desc.clientHeight) {
                btn.style.display = 'inline-flex';
            }
            btn.addEventListener('click', function () {
                var expanded = desc.classList.contains('expanded');
                desc.classList.toggle('expanded', !expanded);
                btn.innerHTML = !expanded
                    ? '<i class="bi bi-chevron-up"></i> Voir moins'
                    : '<i class="bi bi-chevron-down"></i> Voir plus';
            });
        });
    });



</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {

        document.querySelectorAll('.voir-plus-btn').forEach(button => {

            button.addEventListener('click', function () {

                const text = this.previousElementSibling;

                text.classList.toggle('expanded');

                this.textContent =
                    text.classList.contains('expanded')
                    ? 'Voir moins'
                    : 'Voir plus';
            });

        });

    });
    </script>

@endsection