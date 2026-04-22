@extends('front.layouts.app')
@section('content')

{{-- HERO --}}
<section class="hero-section text-white">
  <div class="hero-overlay"></div>
  <div class="container hero-content py-5">
    <div class="row align-items-center min-vh-100">
      <div class="col-md-6 col-lg-5">
        <div class="hero-badge mb-4">
          <span></span> Qualité & Précision
        </div>
        <h1 class="hero-title mb-4">
          Solutions Professionnelles pour
          <span class="hero-highlight">Laboratoire</span> &amp; Industrie
        </h1>
        <p class="hero-subtitle mb-5">
          Découvrez nos produits de qualité, équipements spécialisés et services adaptés à vos besoins professionnels.
        </p>
        <div class="d-flex gap-3 flex-wrap">
          <a href="/products" class="btn-hero-primary">
            <i class="bi bi-grid-fill"></i> Voir les Produits
          </a>
          <a href="/services" class="btn-hero-outline">
            <i class="bi bi-tools"></i> Nos Services
          </a>
        </div>
        <div class="hero-stats mt-5">
          <div class="hero-stat"><strong>500+</strong><span>Produits</span></div>
          <div class="hero-divider"></div>
          <div class="hero-stat"><strong>20+</strong><span>Années d'exp.</span></div>
          <div class="hero-divider"></div>
          <div class="hero-stat"><strong>100%</strong><span>Certifié</span></div>
        </div>
      </div>
    </div>
  </div>
</section>

{{-- PRODUCTS --}}
<section class="products-section">
  <div class="container">

    {{-- Header --}}
    <div class="d-flex align-items-center justify-content-between flex-wrap gap-3 mb-4">
      <h2 class="section-title mb-0">Nos Produits</h2>
      <a href="/products" class="btn-voir-tous">
        <i class="bi bi-grid"></i> Voir tous les produits
      </a>
    </div>

    {{-- FILTRES --}}
    <form method="GET" action="{{ url('/') }}" class="filter-bar mb-5" id="filterForm">

      {{-- Catégorie --}}
      <div class="filter-group">
        <label class="filter-label">
          <i class="bi bi-tag"></i> Catégorie
        </label>
        <div class="filter-pills" id="catPills">
          <button type="button"
            class="pill {{ !request('categorie') ? 'active' : '' }}"
            onclick="setFilter('categorie', '')">
            Toutes
          </button>
          @foreach($categories as $cat)
            @if($cat->enfants->count())
              {{-- Parent avec enfants --}}
              <button type="button"
                class="pill pill-parent {{ request('categorie') && $cat->enfants->pluck('id')->contains(request('categorie')) ? 'active' : '' }}"
                onclick="toggleChildren('children-{{ $cat->id }}')">
                {{ $cat->nom }} <i class="bi bi-chevron-down pill-arrow"></i>
              </button>
              <div class="pill-children" id="children-{{ $cat->id }}">
                @foreach($cat->enfants as $enfant)
                  <button type="button"
                    class="pill pill-child {{ request('categorie') == $enfant->id ? 'active' : '' }}"
                    onclick="setFilter('categorie', '{{ $enfant->id }}')">
                    {{ $enfant->nom }}
                  </button>
                @endforeach
              </div>
            @else
              <button type="button"
                class="pill {{ request('categorie') == $cat->id ? 'active' : '' }}"
                onclick="setFilter('categorie', '{{ $cat->id }}')">
                {{ $cat->nom }}
              </button>
            @endif
          @endforeach
        </div>
      </div>

      {{-- Prix --}}
      <div class="filter-group filter-group-inline">
        <label class="filter-label">
          <i class="bi bi-currency-dollar"></i> Prix
        </label>
        <div class="filter-pills">
          <button type="button" class="pill {{ !request('prix') ? 'active' : '' }}"
            onclick="setFilter('prix', '')">Défaut</button>
          <button type="button" class="pill {{ request('prix') == 'asc' ? 'active' : '' }}"
            onclick="setFilter('prix', 'asc')">
            <i class="bi bi-sort-numeric-down"></i> Croissant
          </button>
          <button type="button" class="pill {{ request('prix') == 'desc' ? 'active' : '' }}"
            onclick="setFilter('prix', 'desc')">
            <i class="bi bi-sort-numeric-up"></i> Décroissant
          </button>
        </div>
      </div>

      {{-- Ancienneté --}}
      <div class="filter-group filter-group-inline">
        <label class="filter-label">
          <i class="bi bi-clock-history"></i> Ancienneté
        </label>
        <div class="filter-pills">
          <button type="button" class="pill {{ !request('tri') ? 'active' : '' }}"
            onclick="setFilter('tri', '')">
            <i class="bi bi-stars"></i> Récents
          </button>
          <button type="button" class="pill {{ request('tri') == 'ancien' ? 'active' : '' }}"
            onclick="setFilter('tri', 'ancien')">
            <i class="bi bi-hourglass-split"></i> Anciens
          </button>
        </div>
      </div>

      {{-- Hidden inputs --}}
      <input type="hidden" name="categorie" id="input-categorie" value="{{ request('categorie') }}">
      <input type="hidden" name="prix"      id="input-prix"      value="{{ request('prix') }}">
      <input type="hidden" name="tri"       id="input-tri"       value="{{ request('tri') }}">
    </form>

    {{-- CARDS --}}
    <div class="row g-4">
      @forelse($products as $product)
      <div class="col-sm-6 col-lg-4">
        <div class="product-card">
          <div class="product-card-img-wrap">
            <img src="{{ asset('storage/'.$product->image) }}" alt="{{ $product->nom }}">
          </div>
          <div class="product-card-body">
            <div class="product-card-name">{{ $product->nom }}</div>
            <div class="product-card-price">
              <i class="bi bi-tag-fill"></i> {{ $product->prix }} MAD
            </div>
            <p class="product-card-desc">{{ $product->description }}</p>
            <button class="btn-voir-plus" style="display:none">
              <i class="bi bi-chevron-down"></i> Voir plus
            </button>
          </div>
          <div class="product-card-footer">
            <a href="/products/{{ $product->id }}" class="btn-detail">
              <i class="bi bi-eye"></i> Voir le produit
            </a>
          </div>
        </div>
      </div>
      @empty
        <div class="col-12 text-center py-5">
          <i class="bi bi-search" style="font-size:2.5rem; color:#db0f0f; opacity:0.4"></i>
          <p class="mt-3" style="color:var(--slate-light)">Aucun produit trouvé pour ces filtres.</p>
          <a href="{{ url('/') }}" class="btn-hero-primary mt-2" style="width:fit-content; margin:auto">
            Réinitialiser
          </a>
        </div>
      @endempty
    </div>

  </div>
</section>

<script>
// Set a filter value and submit
function setFilter(name, value) {
  document.getElementById('input-' + name).value = value;
  document.getElementById('filterForm').submit();
}

// Toggle subcategory pills visibility
function toggleChildren(id) {
  const el = document.getElementById(id);
  el.classList.toggle('open');
}

// Voir plus / Voir moins
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
@endsection