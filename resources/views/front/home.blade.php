@extends('front.layouts.app')
@section('content')

{{-- ═══════════════════════════════════════════════════════════
     RENDER SECTIONS IN ORDER
═══════════════════════════════════════════════════════════ --}}

@foreach($sections->sortBy('order') as $section)

    {{-- ─── HERO ─────────────────────────────────────────────── --}}
    @if($section->name === 'hero')
    @php $h = $section->content; @endphp
    <section class="hero-section text-white">
        <div class="hero-overlay"></div>
        <div class="container hero-content py-5">
            <div class="row align-items-center min-vh-100">
                <div class="col-md-6 col-lg-5">
                    <div class="hero-badge mb-4">
                        <span></span> {{ $h['badge_text'] }}
                    </div>
                    <h1 class="hero-title mb-4">
                        {{ $h['title_main'] }}
                        <span class="hero-highlight">{{ $h['title_highlight'] }}</span>
                        {{ $h['title_suffix'] }}
                    </h1>
                    <p class="hero-subtitle mb-5">{{ $h['subtitle'] }}</p>
                    <div class="d-flex gap-3 flex-wrap">
                        <a href="{{ $h['btn_primary_url'] }}" class="btn-hero-primary">
                            <i class="bi bi-grid-fill"></i> {{ $h['btn_primary_text'] }}
                        </a>
                        <a href="{{ $h['btn_secondary_url'] }}" class="btn-hero-outline">
                            <i class="bi bi-tools"></i> {{ $h['btn_secondary_text'] }}
                        </a>
                    </div>
                    <div class="hero-stats mt-5">
                        <div class="hero-stat">
                            <strong>{{ $h['stat1_number'] }}</strong>
                            <span>{{ $h['stat1_label'] }}</span>
                        </div>
                        <div class="hero-divider"></div>
                        <div class="hero-stat">
                            <strong>{{ $h['stat2_number'] }}</strong>
                            <span>{{ $h['stat2_label'] }}</span>
                        </div>
                        <div class="hero-divider"></div>
                        <div class="hero-stat">
                            <strong>{{ $h['stat3_number'] }}</strong>
                            <span>{{ $h['stat3_label'] }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif


    {{-- ─── PRODUCTS SLIDER ──────────────────────────────────── --}}
    @if($section->name === 'hero')
    <section class="products-section">
        <div class="container">
            <div class="d-flex align-items-center justify-content-between flex-wrap gap-3 mb-4">
                <h2 class="section-title">Nos Produits</h2>
                <div class="d-flex align-items-center gap-2">
                    <div class="d-flex gap-2">
                        <button class="slider-btn" id="sliderPrev"><i class="bi bi-chevron-left"></i></button>
                        <button class="slider-btn" id="sliderNext"><i class="bi bi-chevron-right"></i></button>
                    </div>
                    <a href="/products" class="btn-voir-tous">
                        <i class="bi bi-grid"></i> Voir tous les produits
                    </a>
                </div>
            </div>
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
            <div class="slider-dots" id="sliderDots"></div>
        </div>
    </section>
    @endif


    {{-- ─── PARTNERS ─────────────────────────────────────────── --}}
    @if($section->name === 'partners')
    @php $p = $section->content; @endphp
    <section class="partners-section">
        <div class="container mb-4">
            <h2 class="section-title">{{ $p['title'] ?? 'Partenaires Exclusifs' }}</h2>
        </div>
        <div class="partners-track-wrapper">
            <div class="partners-track">
                {{-- First set --}}
                @foreach($p['partners'] as $partner)
                <div class="partner-item">
                    <div class="partner-logo-wrap">
                        <img src="{{ Str::startsWith($partner['logo'], 'http') ? $partner['logo'] : asset('storage/'.$partner['logo']) }}"
                             alt="{{ $partner['name'] }}">
                    </div>
                    <span class="partner-name">{{ $partner['name'] }}</span>
                </div>
                @endforeach
                {{-- Duplicate for infinite loop --}}
                @foreach($p['partners'] as $partner)
                <div class="partner-item">
                    <div class="partner-logo-wrap">
                        <img src="{{ Str::startsWith($partner['logo'], 'http') ? $partner['logo'] : asset('storage/'.$partner['logo']) }}"
                             alt="{{ $partner['name'] }}">
                    </div>
                    <span class="partner-name">{{ $partner['name'] }}</span>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif


    {{-- ─── SERVICES ─────────────────────────────────────────── --}}
    @if($section->name === 'services')
    @php $s = $section->content; @endphp
    <section class="services-section">
        <div class="container">
            <div class="mb-5">
                <h2 class="section-title">{{ $s['title'] ?? 'Nos Services' }}</h2>
                @if(!empty($s['subtitle']))
                    <p class="services-subtitle">{{ $s['subtitle'] }}</p>
                @endif
            </div>
            <div class="row g-4">
                @foreach($s['services'] as $service)
                <div class="col-sm-6 col-lg-3">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="bi {{ $service['icon'] }}"></i>
                        </div>
                        <div class="service-title">{{ $service['title'] }}</div>
                        <p class="service-desc">{{ $service['description'] }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

@endforeach




{{-- voir plus js --}}

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const track    = document.getElementById('sliderTrack');
        const prevBtn  = document.getElementById('sliderPrev');
        const nextBtn  = document.getElementById('sliderNext');
        const dotsWrap = document.getElementById('sliderDots');
        const items    = track.querySelectorAll('.slide-item');
        const total    = items.length;

        let current  = 0;
        let perView  = getPerView();
        let maxIndex = Math.max(0, total - perView);

        function getPerView() {
            if (window.innerWidth < 576) return 1;
            if (window.innerWidth < 992) return 2;
            return 3;
        }
        function getSlideWidth() { return items[0].offsetWidth + 16; }
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
            const dots = dotsWrap.querySelectorAll('.slider-dot');
            const page = Math.round(current / perView);
            dots.forEach((d, i) => d.classList.toggle('active', i === page));
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
        window.addEventListener('resize', () => {
            perView  = getPerView();
            maxIndex = Math.max(0, total - perView);
            current  = 0;
            buildDots();
            goTo(0);
        });
        buildDots();
        goTo(0);
    });
</script>

@endsection
