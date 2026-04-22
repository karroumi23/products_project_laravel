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
      <div class="mb-5">
        <h2 class="section-title">Nos Produits</h2>
      </div>
      <div class="row g-4">
        @foreach($products as $product)
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
        @endforeach
      </div>
    </div>
  </section>

  <script>
  document.addEventListener('DOMContentLoaded', function () {
      // For each card, check if desc overflows and show button
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