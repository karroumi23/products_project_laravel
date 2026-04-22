@extends('front.layouts.app')
@section('content')

<section class="products-section">
  <div class="container">

    {{-- Header --}}
    <div class="d-flex align-items-center justify-content-between flex-wrap gap-3 mb-4">
      <h2 class="section-title mb-0">Tous les Produits</h2>
      <span class="products-count">
        {{ $products->total() }} produit{{ $products->total() > 1 ? 's' : '' }}
      </span>
    </div>

    {{-- FILTRES --}}
    <form method="GET" action="{{ url('/products') }}" class="filter-bar mb-5" id="filterForm">

      {{-- Catégorie --}}
      <div class="filter-group">
        <label class="filter-label">
          <i class="bi bi-tag"></i> Catégorie
        </label>
        <div class="filter-pills">
          <button type="button"
            class="pill {{ !request('categorie') ? 'active' : '' }}"
            onclick="setFilter('categorie', '')">
            Toutes
          </button>
          @foreach($categories as $cat)
            @if($cat->enfants->count())
              <button type="button"
                class="pill pill-parent {{ request('categorie') && $cat->enfants->pluck('id')->contains(request('categorie')) ? 'active' : '' }}"
                onclick="toggleChildren('children-{{ $cat->id }}')">
                {{ $cat->nom }} <i class="bi bi-chevron-down pill-arrow"></i>
              </button>
              <div class="pill-children {{ request('categorie') && $cat->enfants->pluck('id')->contains(request('categorie')) ? 'open' : '' }}"
                   id="children-{{ $cat->id }}">
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

      {{-- Reset --}}
      @if(request('categorie') || request('prix') || request('tri'))
      <div class="filter-group filter-group-inline">
        <a href="{{ url('/products') }}" class="pill pill-reset">
          <i class="bi bi-x-circle"></i> Réinitialiser
        </a>
      </div>
      @endif

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
          <p class="mt-3" style="color:var(--slate-light)">Aucun produit trouvé.</p>
          <a href="{{ url('/products') }}" class="btn-hero-primary mt-2"
             style="width:fit-content; margin:0 auto; display:inline-flex">
            Réinitialiser
          </a>
        </div>
      @endempty
    </div>

    {{-- PAGINATION --}}
    @if($products->hasPages())
    <div class="d-flex justify-content-center mt-5">
      {{ $products->links('pagination::bootstrap-5') }}
    </div>
    @endif

  </div>
</section>

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
@endsection