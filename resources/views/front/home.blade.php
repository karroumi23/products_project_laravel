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

        {{-- Header: title + arrows + voir tous --}}
        <div class="d-flex align-items-center justify-content-between flex-wrap gap-3 mb-4">
            <h2 class="section-title">Nos Produits</h2>
            <div class="d-flex align-items-center gap-2">
                <div class="slider-nav">
                    <button class="slider-btn" id="sliderPrev">
                        <i class="bi bi-chevron-left"></i>
                    </button>
                    <button class="slider-btn" id="sliderNext">
                        <i class="bi bi-chevron-right"></i>
                    </button>
                </div>
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
                            <div class="product-card-name" title="{{ $product->nom }}">{{ $product->nom }}</div>
                            <div class="product-card-price">
                                <i class="bi bi-tag-fill"></i> {{ $product->prix }} MAD
                            </div>
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







{{-- voir plus js --}}
{{-- slide js  --}}
<script>
    // Wait for the DOM to be fully loaded before running the slider
    document.addEventListener('DOMContentLoaded', function () {

        // ─── DOM ELEMENTS ─────────────────────────────────────────
        const track    = document.getElementById('sliderTrack');   // the moving container of all slides
        const prevBtn  = document.getElementById('sliderPrev');    // left arrow button
        const nextBtn  = document.getElementById('sliderNext');    // right arrow button
        const dotsWrap = document.getElementById('sliderDots');    // container for dot indicators
        const items    = track.querySelectorAll('.slide-item');    // all individual slide cards
        const total    = items.length;                             // total number of slides

        // ─── STATE ────────────────────────────────────────────────
        let current  = 0;              // index of the currently visible first slide
        let perView  = getPerView();   // how many slides are visible at once
        let maxIndex = Math.max(0, total - perView); // maximum index we can scroll to

        // ─── FUNCTIONS ────────────────────────────────────────────

        /**
         * Returns how many slides to show at once
         * based on the current screen width (responsive).
         * mobile  < 576px  → 1 slide
         * tablet  < 992px  → 2 slides
         * desktop ≥ 992px  → 3 slides
         */
        function getPerView() {
            if (window.innerWidth < 576) return 1;
            if (window.innerWidth < 992) return 2;
            return 3;
        }

        /**
         * Returns the width of one slide including the gap (16px).
         * Used to calculate how many pixels to translate the track.
         */
        function getSlideWidth() {
            return items[0].offsetWidth + 16; // slide width + gap between slides
        }

        /**
         * Builds the dot indicators dynamically based on
         * the total number of pages (total slides / slides per view).
         * Each dot navigates to the corresponding page when clicked.
         */
        function buildDots() {
            dotsWrap.innerHTML = ''; // clear existing dots before rebuilding
            const pages = Math.ceil(total / perView); // number of pages
            for (let i = 0; i < pages; i++) {
                const dot = document.createElement('button');
                dot.classList.add('slider-dot');
                if (i === 0) dot.classList.add('active'); // first dot is active by default
                dot.addEventListener('click', () => goTo(i * perView)); // navigate to page on click
                dotsWrap.appendChild(dot);
            }
        }

        /**
         * Updates the active dot to match the current slide position.
         * Calculates which page we are on and highlights the correct dot.
         */
        function updateDots() {
            const dots = dotsWrap.querySelectorAll('.slider-dot');
            const page = Math.round(current / perView); // current page index
            dots.forEach((d, i) => d.classList.toggle('active', i === page));
        }

        /**
         * Moves the slider to a specific slide index.
         * - Clamps the index between 0 and maxIndex to prevent overflow.
         * - Translates the track horizontally using CSS transform.
         * - Enables/disables prev & next buttons based on position.
         * - Updates the active dot indicator.
         *
         * @param {number} index - The target slide index to navigate to
         */
        function goTo(index) {
            current = Math.max(0, Math.min(index, maxIndex)); // clamp within valid range
            track.style.transform = `translateX(-${current * getSlideWidth()}px)`; // move track
            prevBtn.disabled = current === 0;          // disable prev if at the start
            nextBtn.disabled = current >= maxIndex;    // disable next if at the end
            updateDots();
        }

        // ─── EVENT LISTENERS ──────────────────────────────────────

        // Previous button: go back by one group of slides
        prevBtn.addEventListener('click', () => goTo(current - perView));

        // Next button: go forward by one group of slides
        nextBtn.addEventListener('click', () => goTo(current + perView));

        // On window resize: recalculate perView and maxIndex,
        // reset to first slide, and rebuild dots for new layout
        window.addEventListener('resize', () => {
            perView  = getPerView();
            maxIndex = Math.max(0, total - perView);
            current  = 0;
            buildDots();
            goTo(0);
        });

        // ─── INIT ─────────────────────────────────────────────────
        buildDots(); // build dots on page load
        goTo(0);     // start at the first slide
    });
</script>



    @endsection
