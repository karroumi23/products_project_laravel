<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aqualab Technologie</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Fonts: Barlow Condensed (display) + DM Sans (body) -->
    <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@400;600;700&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    {{-- navbar style --}}
    <style>
        :root {
            --white: #FFFFFF;
            --slate: #4F585D;
            --slate-light: #6b767c;
            --slate-dark: #363e42;
            --accent: #db0f0f;       /* deep ocean blue — fits scientific/industrial */
            --accent-light: #ffffff;
            --border: rgba(79, 88, 93, 0.15);
        }

        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'DM Sans', sans-serif;
            color: var(--slate);
            background: #f5f6f7;
            margin: 0;
        }

        /* ─── TOP BAR ────────────────────────────────────────────── */
        .topbar {
            background: var(--slate-dark);
            color: rgba(255,255,255,0.65);
            font-size: 0.72rem;
            letter-spacing: 0.04em;
            padding: 6px 0;
            border-bottom: 1px solid rgba(255,255,255,0.06);
        }

        .topbar a {
            color: rgba(255,255,255,0.65);
            text-decoration: none;
            transition: color 0.2s;
        }

        .topbar a:hover {
            color: var(--accent-light);
        }

        .topbar .topbar-divider {
            width: 1px;
            height: 12px;
            background: rgba(255,255,255,0.2);
            display: inline-block;
            margin: 0 10px;
            vertical-align: middle;
        }

        /* ─── MAIN NAVBAR ────────────────────────────────────────── */
        .main-navbar {
            background: var(--white);
            border-bottom: 1px solid var(--border);
            padding: 0;
            position: sticky;
            top: 0;
            z-index: 1000;
            box-shadow: 0 1px 16px rgba(79, 88, 93, 0.08);
        }

        .main-navbar .container {
            display: flex;
            align-items: stretch;
            justify-content: space-between;
            min-height: 58px;
        }

        /* ─── LOGO ───────────────────────────────────────────────── */
        .navbar-logo {
            display: flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
            padding: 12px 0;
            flex-shrink: 0;
            margin-right: 40px;
        }

        .navbar-logo img {
            height: 42px;
            width: auto;
        }

        /* Fallback text logo if no image */
        .logo-text {
            display: flex;
            flex-direction: column;
            line-height: 1.1;
        }

        .logo-text .logo-main {
            font-family: 'Barlow Condensed', sans-serif;
            font-weight: 700;
            font-size: 1.35rem;
            letter-spacing: 0.08em;
            color: var(--slate-dark);
            text-transform: uppercase;
        }

        .logo-text .logo-main span {
            color: var(--accent);
        }

        .logo-text .logo-sub {
            font-size: 0.6rem;
            letter-spacing: 0.18em;
            text-transform: uppercase;
            color: var(--slate-light);
            font-weight: 500;
        }

        /* ─── NAV LINKS ──────────────────────────────────────────── */
        .nav-menu {
            display: flex;
            align-items: stretch;
            list-style: none;
            margin: 0;
            padding: 0;
            gap: 0;
        }

        .nav-menu li {
            display: flex;
            align-items: stretch;
        }

        .nav-menu li a {
            display: flex;
            align-items: center;
            gap: 6px;
            padding: 0 18px;
            font-size: 0.82rem;
            font-weight: 500;
            letter-spacing: 0.06em;
            text-transform: uppercase;
            color: var(--slate);
            text-decoration: none;
            /* border-bottom: 2px solid transparent; */
            transition: color 0.2s, border-color 0.2s;
            position: relative;
        }

        .nav-menu li a i {
            font-size: 0.9rem;
            opacity: 0.7;
        }

        .nav-menu li a:hover {
            color: var(--accent);
            border-bottom-color: var(--accent-light);
        }

        .nav-menu li a.active {
            color: var(--accent);
            border-bottom-color: var(--accent);
            font-weight: 600;
        }

        /* ─── RIGHT SIDE ACTIONS ─────────────────────────────────── */
        .navbar-actions {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-left: auto;
        }

        .btn-contact {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: var(--accent);
            color: white !important;
            font-size: 0.78rem;
            font-weight: 600;
            letter-spacing: 0.05em;
            text-transform: uppercase;
            padding: 8px 18px;
            border-radius: 2px;
            text-decoration: none;
            transition: background 0.2s, transform 0.15s;
            border: none;
        }

        .btn-contact:hover {
            background: var(--slate-dark);
            transform: translateY(-1px);
        }

        /* ─── SEARCH ICON ────────────────────────────────────────── */
        .nav-icon-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 36px;
            height: 36px;
            border-radius: 4px;
            border: 1px solid var(--border);
            color: var(--slate);
            background: transparent;
            transition: all 0.2s;
            cursor: pointer;
            text-decoration: none;
        }

        .nav-icon-btn:hover {
            background: var(--accent);
            border-color: var(--accent);
            color: white;
        }

        /* ─── MOBILE TOGGLER ─────────────────────────────────────── */
        .mobile-toggler {
            display: none;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            border: 1px solid var(--border);
            border-radius: 4px;
            background: transparent;
            cursor: pointer;
            margin-left: auto;
            flex-direction: column;
            gap: 5px;
        }

        .mobile-toggler span {
            display: block;
            width: 22px;
            height: 2px;
            background: var(--slate);
            border-radius: 2px;
            transition: all 0.3s;
        }

        /* ─── ACCENT BAR (bottom decoration) ────────────────────── */
        .navbar-accent-bar {
            height: 1.5px;
            background :#db0f0f;
            /* background: linear-gradient(90deg, var(--accent) 0%, var(--accent-light) 100%, transparent 100%); */
        }

        /* ─── MOBILE MENU ────────────────────────────────────────── */
        .mobile-menu {
            display: none;
            background: var(--white);
            border-top: 1px solid var(--border);
            padding: 8px 0;
        }

        .mobile-menu.open {
            display: block;
        }

        .mobile-menu a {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 12px 20px;
            font-size: 0.85rem;
            font-weight: 500;
            letter-spacing: 0.05em;
            text-transform: uppercase;
            color: var(--slate);
            text-decoration: none;
            border-left: 3px solid transparent;
            transition: all 0.2s;
        }

        .mobile-menu a:hover,
        .mobile-menu a.active {
            color: var(--accent);
            border-left-color: var(--accent);
            background: rgba(0, 119, 182, 0.04);
        }

        /* ─── RESPONSIVE ─────────────────────────────────────────── */
        @media (max-width: 991px) {
            .nav-menu,
            .navbar-actions .btn-contact,
            .nav-icon-btn {
                display: none;
            }

            .mobile-toggler {
                display: flex;
            }

            .topbar {
                display: none;
            }
        }

        /* ─── DEMO CONTENT ───────────────────────────────────────── */
        .demo-content {
            max-width: 700px;
            margin: 80px auto;
            text-align: center;
            color: var(--slate-light);
            font-size: 0.9rem;
        }
    </style>
    {{-- hero-section  style --}}
    <style>
                .hero-section {
        min-height: 100vh;
        background-image: url('{{ asset("images/hero-bg1.png") }}');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        position: relative;
        display: flex;
        align-items: center;
        }

        /* Dark overlay for readability over the bg image */
        .hero-overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(
            120deg,
            rgba(10, 20, 40, 0.82) 0%,
            rgba(10, 20, 40, 0.60) 55%,
            rgba(10, 20, 40, 0.20) 100%
        );
        z-index: 0;
        }

        /* Red left accent bar */
        .hero-section::before {
        content: '';
        position: absolute;
        left: 0; top: 15%; bottom: 15%;
        width: 4px;
        background: #e30613;
        border-radius: 0 4px 4px 0;
        z-index: 1;
        }

        .hero-content {
        position: relative;
        z-index: 2;
        }

        /* Badge */
        .hero-badge {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: rgba(227, 6, 19, 0.15);
        border: 1px solid rgba(227, 6, 19, 0.4);
        color: #ff6b75;
        font-size: 0.78rem;
        font-weight: 600;
        letter-spacing: 0.1em;
        text-transform: uppercase;
        padding: 6px 16px;
        border-radius: 100px;
        }
        .hero-badge span {
        width: 7px; height: 7px;
        background: #e30613;
        border-radius: 50%;
        display: inline-block;
        animation: pulse-dot 1.6s ease-in-out infinite;
        }
        @keyframes pulse-dot {
        0%, 100% { opacity: 1; transform: scale(1); }
        50% { opacity: 0.5; transform: scale(1.4); }
        }

        /* Title */
        .hero-title {
        font-size: clamp(2rem, 4vw, 3rem);
        font-weight: 800;
        line-height: 1.15;
        letter-spacing: -0.02em;
        color: #ffffff;
        }
        .hero-highlight {
        color: #e30613;
        position: relative;
        }
        .hero-highlight::after {
        content: '';
        position: absolute;
        left: 0; bottom: -4px;
        width: 100%; height: 3px;
        background: #e30613;
        border-radius: 2px;
        opacity: 0.5;
        }

        .hero-subtitle {
        font-size: 1.05rem;
        color: rgba(255,255,255,0.78);
        line-height: 1.7;
        max-width: 480px;
        }

        /* Buttons */
        .btn-hero-primary {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: #e30613;
        color: #fff;
        font-weight: 700;
        font-size: 0.92rem;
        letter-spacing: 0.03em;
        padding: 14px 28px;
        border-radius: 6px;
        text-decoration: none;
        border: 2px solid #e30613;
        transition: background 0.2s, transform 0.2s, box-shadow 0.2s;
        box-shadow: 0 4px 20px rgba(227,6,19,0.35);
        }
        .btn-hero-primary:hover {
        background: #c0000f;
        border-color: #c0000f;
        transform: translateY(-2px);
        box-shadow: 0 8px 28px rgba(227,6,19,0.45);
        color: #fff;
        }

        .btn-hero-outline {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: transparent;
        color: #fff;
        font-weight: 700;
        font-size: 0.92rem;
        letter-spacing: 0.03em;
        padding: 14px 28px;
        border-radius: 6px;
        text-decoration: none;
        border: 2px solid rgba(255,255,255,0.45);
        transition: border-color 0.2s, background 0.2s, transform 0.2s;
        }
        .btn-hero-outline:hover {
        border-color: #fff;
        background: rgba(255,255,255,0.1);
        transform: translateY(-2px);
        color: #fff;
        }

        /* Stats bar */
        .hero-stats {
        display: flex;
        align-items: center;
        gap: 24px;
        flex-wrap: wrap;
        }
        .hero-stat {
        display: flex;
        flex-direction: column;
        }
        .hero-stat strong {
        font-size: 1.5rem;
        font-weight: 800;
        color: #fff;
        line-height: 1;
        }
        .hero-stat span {
        font-size: 0.75rem;
        color: rgba(255,255,255,0.55);
        margin-top: 3px;
        text-transform: uppercase;
        letter-spacing: 0.08em;
        }
        .hero-divider {
        width: 1px;
        height: 36px;
        background: rgba(255,255,255,0.2);
        }
    </style>
    {{-- cards-products  style --}}
    <style>
            .products-section {
            background: #f5f6f7;
            padding: 60px 0;
        }

        .products-section .section-title {
            font-family: 'Barlow Condensed', sans-serif;
            font-size: 2rem;
            font-weight: 700;
            color: var(--slate-dark);
            letter-spacing: 0.04em;
            text-transform: uppercase;
            position: relative;
            display: inline-block;
            padding-bottom: 10px;
        }

        .products-section .section-title::after {
            content: '';
            position: absolute;
            left: 0; bottom: 0;
            width: 40px; height: 3px;
            background: #db0f0f;
            border-radius: 2px;
        }

        .product-card {
            background: #fff;
            border: 1px solid rgba(79,88,93,0.1);
            border-radius: 6px;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            height: 100%;
            transition: box-shadow 0.25s, transform 0.25s;
        }

        .product-card:hover {
            box-shadow: 0 8px 32px rgba(79,88,93,0.13);
            transform: translateY(-3px);
        }

        .product-card-img-wrap {
            width: 100%;
            height: 200px;
            overflow: hidden;
            background: #f0f1f2;
            flex-shrink: 0;
        }

        .product-card-img-wrap img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            transition: transform 0.4s ease;
        }

        .product-card:hover .product-card-img-wrap img {
            transform: scale(1.04);
        }

        .product-card-body {
            padding: 18px 20px;
            display: flex;
            flex-direction: column;
            flex: 1;
        }

        .product-card-name {
            font-family: 'Barlow Condensed', sans-serif;
            font-size: 1.1rem;
            font-weight: 700;
            color: var(--slate-dark);
            letter-spacing: 0.03em;
            text-transform: uppercase;
            margin-bottom: 6px;
        }

        .product-card-price {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            background: rgba(219,15,15,0.08);
            color: #db0f0f;
            font-weight: 700;
            font-size: 0.9rem;
            padding: 3px 10px;
            border-radius: 3px;
            margin-bottom: 10px;
            width: fit-content;
        }

        .product-card-desc {
    font-size: 0.84rem;
    color: var(--slate-light);
    line-height: 1.6;
    flex: 1;
    max-height: 4.8em; /* 3 lines × 1.6 line-height */
    overflow: hidden;
    transition: max-height 0.3s ease;
}

.product-card-desc.expanded {
    max-height: 500px;
}

        .btn-voir-plus {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            margin-top: 8px;
            font-size: 0.78rem;
            font-weight: 600;
            color: #db0f0f;
            background: none;
            border: none;
            padding: 0;
            cursor: pointer;
            letter-spacing: 0.04em;
            text-transform: uppercase;
            width: fit-content;
            transition: color 0.2s;
        }

        .btn-voir-plus:hover {
            color: #a00;
        }

        .product-card-footer {
            padding: 12px 20px;
            border-top: 1px solid rgba(79,88,93,0.08);
            background: #fafafa;
        }

        .btn-detail {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
            width: 100%;
            background: var(--slate-dark);
            color: #fff;
            font-size: 0.78rem;
            font-weight: 600;
            letter-spacing: 0.06em;
            text-transform: uppercase;
            padding: 9px 16px;
            border-radius: 3px;
            text-decoration: none;
            transition: background 0.2s;
        }

        .btn-detail:hover {
            background: #db0f0f;
            color: #fff;
        }
    </style>
</head>
<body>

<!-- ═══════════════════════════════════════════
     TOP BAR
═══════════════════════════════════════════ -->
<div class="topbar">
    <div class="container d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center gap-2">
            <i class="bi bi-telephone-fill"></i>
            <a href="tel:+212XXXXXXXXX">+212 5XX-XXXXXX</a>
            <span class="topbar-divider"></span>
            <i class="bi bi-envelope-fill"></i>
            <a href="mailto:contact@aqualab.ma">contact@aqualab.ma</a>
        </div>
        <div class="d-flex align-items-center gap-2">
            <i class="bi bi-geo-alt-fill"></i>
            <span>Maroc — Casablanca</span>
            <span class="topbar-divider"></span>
            <span>Lun – Ven : 08h30 – 17h30</span>
        </div>
    </div>
</div>

<!-- ═══════════════════════════════════════════
     MAIN NAVBAR
═══════════════════════════════════════════ -->
<nav class="main-navbar">
    <div class="container">

        <!-- LOGO -->
        <a class="navbar-logo" href="/">
            {{-- Replace with your actual logo: --}}
            <img src="{{ asset('images/logo.png') }}" alt="Aqualab Technologie">
        </a>

        <!-- NAV LINKS (desktop) -->
        <ul class="nav-menu">
            <li>
                <a href="/" class="{{ request()->is('/') ? 'active' : '' }}">
                    <i class="bi bi-house-door"></i> Accueil
                </a>
            </li>
            <li>
                <a href="/products" class="{{ request()->is('products*') ? 'active' : '' }}">
                    <i class="bi bi-grid"></i> Produits
                </a>
            </li>
            <li>
                <a href="/services" class="{{ request()->is('services*') ? 'active' : '' }}">
                    <i class="bi bi-tools"></i> Services
                </a>
            </li>
            <li>
                <a href="/apropos" class="{{ request()->is('apropos*') ? 'active' : '' }}">
                    <i class="bi bi-info-circle"></i> À Propos
                </a>
            </li>
        </ul>



        <!-- MOBILE TOGGLER -->
        <button class="mobile-toggler" id="mobileToggler" aria-label="Menu">
            <span></span>
            <span></span>
            <span></span>
        </button>

    </div>

    <!-- ACCENT BAR -->
    <div class="navbar-accent-bar"></div>
</nav>

<!-- MOBILE MENU -->
<div class="mobile-menu" id="mobileMenu">
    <a href="/" class="{{ request()->is('/') ? 'active' : '' }}">
        <i class="bi bi-house-door"></i> Accueil
    </a>
    <a href="/products" class="{{ request()->is('products*') ? 'active' : '' }}">
        <i class="bi bi-grid"></i> Produits
    </a>
    <a href="/services" class="{{ request()->is('services*') ? 'active' : '' }}">
        <i class="bi bi-tools"></i> Services
    </a>
    <a href="/apropos" class="{{ request()->is('apropos*') ? 'active' : '' }}">
        <i class="bi bi-info-circle"></i> À Propos
    </a>
</div>


{{-- ═══════════════════CONTENT════════════════════════  --}}
    @yield('content')

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
{{-- // Mobile --}}
<script>
    // Mobile menu toggle
    const toggler = document.getElementById('mobileToggler');
    const mobileMenu = document.getElementById('mobileMenu');

    toggler.addEventListener('click', () => {
        mobileMenu.classList.toggle('open');

        // Animate hamburger to X
        const spans = toggler.querySelectorAll('span');
        if (mobileMenu.classList.contains('open')) {
            spans[0].style.transform = 'translateY(7px) rotate(45deg)';
            spans[1].style.opacity = '0';
            spans[2].style.transform = 'translateY(-7px) rotate(-45deg)';
        } else {
            spans.forEach(s => { s.style.transform = ''; s.style.opacity = ''; });
        }
    });

    // Navbar shadow on scroll
    window.addEventListener('scroll', () => {
        const nav = document.querySelector('.main-navbar');
        if (window.scrollY > 10) {
            nav.style.boxShadow = '0 2px 24px rgba(79, 88, 93, 0.14)';
        } else {
            nav.style.boxShadow = '0 1px 16px rgba(79, 88, 93, 0.08)';
        }
    });
</script>

</body>
</html>