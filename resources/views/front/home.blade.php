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


{{-- PRODUCTS SLIDESHOW --}}
<section class="products-section">
    <div class="container">

        {{-- Header --}}
        <div class="d-flex align-items-center justify-content-between flex-wrap gap-3 mb-5">
            <div>
                <h2 class="section-title mb-0">Nos Produits</h2>
            </div>
            <div class="d-flex align-items-center gap-3">
                {{-- Arrows --}}
                <div class="slider-nav">
                    <button class="slider-btn" id="sliderPrev">
                        <i class="bi bi-chevron-left"></i>
                    </button>
                    <button class="slider-btn" id="sliderNext">
                        <i class="bi bi-chevron-right"></i>
                    </button>
                </div>
                {{-- Voir tous --}}
                <a href="/products" class="btn-voir-tous">
                    <i class="bi bi-grid"></i> Voir tous les produits
                </a>
            </div>
        </div>

        {{-- Slider --}}
        <div class="slider-wrapper">
            <div class="slider-track" id="sliderTrack">
                @foreach($products as $product)
                <div class="slide-item">
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

        {{-- Dots --}}
        <div class="slider-dots" id="sliderDots"></div>

    </div>
</section>






{{-- voir plus  --}}
{{-- voir plus  --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {

        // ─── VOIR PLUS ────────────────────────────────────────────
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

        // ─── SLIDER ───────────────────────────────────────────────
        const track      = document.getElementById('sliderTrack');
        const prevBtn    = document.getElementById('sliderPrev');
        const nextBtn    = document.getElementById('sliderNext');
        const dotsWrap   = document.getElementById('sliderDots');
        const items      = track.querySelectorAll('.slide-item');
        const total      = items.length;

        let current      = 0;
        let perView      = getPerView();
        let maxIndex     = Math.max(0, total - perView);

        // Build dots
        function buildDots() {
            dotsWrap.innerHTML = '';
            const pages = Math.ceil(total / perView);
            for (let i = 0; i < pages; i++) {
                const dot = document.createElement('button');
                dot.classList.add('slider-dot');
                if (i === 0) dot.classList.add('active');
                dot.addEventListener('click', () => goTo(i * perView));
                dotsWrap.appendChild(dot);
            }
        }

        function updateDots() {
            const dots  = dotsWrap.querySelectorAll('.slider-dot');
            const page  = Math.round(current / perView);
            dots.forEach((d, i) => d.classList.toggle('active', i === page));
        }

        function getPerView() {
            if (window.innerWidth < 576) return 1;
            if (window.innerWidth < 992) return 2;
            return 3;
        }

        function getSlideWidth() {
            return items[0].offsetWidth + 24; // width + gap
        }

        function goTo(index) {
            current = Math.max(0, Math.min(index, maxIndex));
            track.style.transform = `translateX(-${current * getSlideWidth()}px)`;
            prevBtn.disabled = current === 0;
            nextBtn.disabled = current >= maxIndex;
            updateDots();
        }

        prevBtn.addEventListener('click', () => goTo(current - perView));
        nextBtn.addEventListener('click', () => goTo(current + perView));

        // Resize handler
        window.addEventListener('resize', () => {
            perView  = getPerView();
            maxIndex = Math.max(0, total - perView);
            current  = 0;
            buildDots();
            goTo(0);
        });

        // Init
        buildDots();
        goTo(0);
    });
    </script>

    @endsection
