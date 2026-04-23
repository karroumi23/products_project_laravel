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
            --accent: #db0f0f;
            --accent-light: #ffffff;
            --border: rgba(79, 88, 93, 0.15);
        }

        * { box-sizing: border-box; }

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
        .topbar a:hover { color: var(--accent-light); }
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
        .navbar-logo img { height: 42px; width: auto; }

        /* ─── NAV LINKS ──────────────────────────────────────────── */
        .nav-menu {
            display: flex;
            align-items: stretch;
            list-style: none;
            margin: 0;
            padding: 0;
            gap: 0;
        }
        .nav-menu li { display: flex; align-items: stretch; }
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
            transition: color 0.2s, border-color 0.2s;
            position: relative;
        }
        .nav-menu li a i { font-size: 0.9rem; opacity: 0.7; }
        .nav-menu li a:hover { color: var(--accent); }
        .nav-menu li a.active { color: var(--accent); font-weight: 600; }

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

        /* ─── ACCENT BAR ─────────────────────────────────────────── */
        .navbar-accent-bar {
            height: 1.5px;
            background: #db0f0f;
        }

        /* ─── MOBILE MENU ────────────────────────────────────────── */
        .mobile-menu {
            display: none;
            background: var(--white);
            border-top: 1px solid var(--border);
            padding: 8px 0;
        }
        .mobile-menu.open { display: block; }
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
            background: rgba(219,15,15,0.04);
        }

        /* ─── RESPONSIVE ─────────────────────────────────────────── */
        @media (max-width: 991px) {
            .nav-menu,
            .navbar-actions .btn-contact,
            .nav-icon-btn { display: none; }
            .mobile-toggler { display: flex; }
            .topbar { display: none; }
        }
    </style>

    {{-- hero-section style --}}
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
            margin-top: 0px;
        }
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
        .hero-section::before {
            content: '';
            position: absolute;
            left: 0; top: 15%; bottom: 15%;
            width: 4px;
            background: #e30613;
            border-radius: 0 4px 4px 0;
            z-index: 1;
        }
        .hero-content { position: relative; z-index: 2; }
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
        .hero-title {
            font-size: clamp(2rem, 4vw, 3rem);
            font-weight: 800;
            line-height: 1.15;
            letter-spacing: -0.02em;
            color: #ffffff;
        }
        .hero-highlight { color: #e30613; position: relative; }
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
        .hero-stats {
            display: flex;
            align-items: center;
            gap: 24px;
            flex-wrap: wrap;
        }
        .hero-stat { display: flex; flex-direction: column; }
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

    {{-- cards-products style --}}
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
            height: auto;
            align-self: flex-start;
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
            max-height: 4.8em;
            overflow: hidden;
            transition: max-height 0.1s ease;
        }
        .product-card-desc.expanded { max-height: 1000px; }
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
        .btn-voir-plus:hover { color: #a00; }
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
        .btn-detail:hover { background: #db0f0f; color: #fff; }
        .btn-voir-tous {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-size: 0.78rem;
            font-weight: 600;
            letter-spacing: 0.05em;
            text-transform: uppercase;
            color: var(--slate);
            border: 1px solid rgba(79,88,93,0.2);
            padding: 7px 16px;
            border-radius: 4px;
            text-decoration: none;
            transition: all 0.2s;
            white-space: nowrap;
        }
        .btn-voir-tous:hover {
            background: #db0f0f;
            border-color: #db0f0f;
            color: #fff;
        }
    </style>

    {{-- filter-products  title + search + reset style --}}
    <style>
            /* ─── FILTER WRAPPER ─────────────────────────────────────── */
        .filter-wrapper {
            background: var(--slate-dark);
            padding: 24px 0;
            border-bottom: 2px solid #db0f0f;
        }

        /* ─── ROW 1 : title + search + reset ────────────────────── */
        .filter-row1 {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            margin-bottom: 18px;
            flex-wrap: wrap;
        }

        .filter-title {
            font-family: 'Barlow Condensed', sans-serif;
            font-size: 0.72rem;
            font-weight: 700;
            letter-spacing: 0.18em;
            text-transform: uppercase;
            color: rgba(255,255,255,0.35);
            display: flex;
            align-items: center;
            gap: 8px;
            white-space: nowrap;
        }
        .filter-title::before {
            content: '';
            width: 18px;
            height: 2px;
            background: #db0f0f;
            display: inline-block;
            flex-shrink: 0;
        }

        /* Search bar */
        .search-bar {
            position: relative;
            display: flex;
            align-items: center;
            flex: 1;
            max-width: 360px;
        }
        .search-bar input {
            width: 100%;
            background: rgba(255,255,255,0.06);
            border: 1px solid rgba(255,255,255,0.12);
            border-radius: 4px;
            color: #fff;
            font-family: 'DM Sans', sans-serif;
            font-size: 0.82rem;
            padding: 8px 36px 8px 36px;
            outline: none;
            transition: border-color 0.2s, background 0.2s;
        }
        .search-bar input::placeholder { color: rgba(255,255,255,0.25); }
        .search-bar input:focus {
            border-color: #db0f0f;
            background: rgba(255,255,255,0.09);
        }
        .search-icon {
            position: absolute;
            left: 11px;
            color: rgba(255,255,255,0.3);
            font-size: 0.78rem;
            pointer-events: none;
        }
        .search-clear {
            position: absolute;
            right: 10px;
            color: rgba(255,255,255,0.3);
            font-size: 0.9rem;
            cursor: pointer;
            transition: color 0.15s;
            line-height: 1;
        }
        .search-clear:hover { color: #db0f0f; }

        /* Reset button */
        .filter-reset {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            font-size: 0.7rem;
            font-weight: 600;
            letter-spacing: 0.07em;
            text-transform: uppercase;
            color: rgba(255,255,255,0.3);
            text-decoration: none;
            border: 1px solid rgba(255,255,255,0.1);
            padding: 6px 13px;
            border-radius: 3px;
            transition: all 0.2s;
            white-space: nowrap;
        }
        .filter-reset:hover {
            color: #fff;
            border-color: #db0f0f;
            background: rgba(219,15,15,0.15);
        }

        /* ─── ROW 2 : filter groups ──────────────────────────────── */
        .filter-groups {
            display: flex;
            gap: 0;
            border: 1px solid rgba(255,255,255,0.07);
            border-radius: 5px;
            overflow: visible;
        }

        .filter-group-box {
            flex: 1;
            display: flex;
            flex-direction: column;
            border-right: 1px solid rgba(255,255,255,0.07);
            min-width: 0;
        }
        .filter-group-box:last-child { border-right: none; }

        .filter-group-label {
            display: flex;
            align-items: center;
            gap: 6px;
            padding: 8px 14px;
            font-size: 0.65rem;
            font-weight: 700;
            letter-spacing: 0.13em;
            text-transform: uppercase;
            color: rgba(255,255,255,0.28);
            background: rgba(0,0,0,0.18);
            border-bottom: 1px solid rgba(255,255,255,0.05);
        }
        .filter-group-label i { color: #db0f0f; font-size: 0.7rem; }

        .filter-group-pills {
            display: flex;
            flex-wrap: wrap;
            gap: 5px;
            padding: 9px 11px;
            background: rgba(0,0,0,0.08);
        }

        /* ─── PILLS ──────────────────────────────────────────────── */
        .fpill {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            padding: 4px 12px;
            border-radius: 3px;
            border: 1px solid rgba(255,255,255,0.1);
            background: rgba(255,255,255,0.04);
            color: rgba(255,255,255,0.55);
            font-size: 0.73rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.15s;
            white-space: nowrap;
            font-family: 'DM Sans', sans-serif;
        }
        .fpill:hover {
            border-color: rgba(219,15,15,0.45);
            color: #fff;
            background: rgba(219,15,15,0.1);
        }
        .fpill.active {
            background: #db0f0f;
            border-color: #db0f0f;
            color: #fff;
            font-weight: 600;
            box-shadow: 0 2px 8px rgba(219,15,15,0.3);
        }
        .fpill-parent { color: rgba(255,255,255,0.7); font-weight: 600; }
        .fpill-arrow { font-size: 0.58rem; transition: transform 0.2s; }
        .fpill-children {
            display: none;
            flex-wrap: wrap;
            gap: 5px;
            width: 100%;
            padding-top: 7px;
            margin-top: 5px;
            border-top: 1px dashed rgba(255,255,255,0.07);
        }
        .fpill-children.open { display: flex; }
        .fpill-child { font-size: 0.7rem; padding: 3px 10px; border-style: dashed; opacity: 0.75; }

        /* ─── RESULTS BAR ────────────────────────────────────────── */
        .results-bar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 18px 0 22px 0;
            flex-wrap: wrap;
            gap: 10px;
            border-bottom: 1px solid rgba(79,88,93,0.1);
            margin-bottom: 28px;
        }
        .results-count {
            font-size: 0.8rem;
            font-weight: 500;
            color: var(--slate-light);
        }
        .results-count strong {
            font-family: 'Barlow Condensed', sans-serif;
            font-size: 1.3rem;
            font-weight: 700;
            color: #db0f0f;
            margin-right: 4px;
        }
        .active-filter-tags { display: flex; gap: 6px; flex-wrap: wrap; }
        .active-filter-tag {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            background: rgba(219,15,15,0.07);
            border: 1px solid rgba(219,15,15,0.18);
            color: #db0f0f;
            font-size: 0.7rem;
            font-weight: 600;
            padding: 3px 10px;
            border-radius: 3px;
            text-transform: uppercase;
            letter-spacing: 0.04em;
        }

        /* ─── PAGINATION ─────────────────────────────────────────── */
        .pagination .page-link {
            color: var(--slate-dark);
            border-color: rgba(79,88,93,0.15);
            font-size: 0.82rem;
            font-weight: 500;
            padding: 7px 14px;
            border-radius: 3px !important;
            margin: 0 2px;
            transition: all 0.15s;
        }
        .pagination .page-link:hover { background: #db0f0f; border-color: #db0f0f; color: #fff; }
        .pagination .page-item.active .page-link {
            background: #db0f0f;
            border-color: #db0f0f;
            color: #fff;
            box-shadow: 0 2px 8px rgba(219,15,15,0.3);
        }

        /* ─── MOBILE ─────────────────────────────────────────────── */
        @media (max-width: 767px) {
            .filter-row1 { flex-direction: column; align-items: stretch; }
            .search-bar { max-width: 100%; }
            .filter-groups { flex-direction: column; }
            .filter-group-box { border-right: none; border-bottom: 1px solid rgba(255,255,255,0.07); }
            .filter-group-box:last-child { border-bottom: none; }
        }
    </style>


    {{-- SEARCH BAR   style --}}



</head>
<body>

<!-- TOP BAR -->
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

<!-- MAIN NAVBAR -->
<nav class="main-navbar">
    <div class="container">
        <a class="navbar-logo" href="/">
            <img src="{{ asset('images/logo.png') }}" alt="Aqualab Technologie">
        </a>
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
        <button class="mobile-toggler" id="mobileToggler" aria-label="Menu">
            <span></span>
            <span></span>
            <span></span>
        </button>
    </div>
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



{{-- CONTENT --}}
@yield('content')





<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js">
</script>
<script>
    const toggler = document.getElementById('mobileToggler');
    const mobileMenu = document.getElementById('mobileMenu');
    toggler.addEventListener('click', () => {
        mobileMenu.classList.toggle('open');
        const spans = toggler.querySelectorAll('span');
        if (mobileMenu.classList.contains('open')) {
            spans[0].style.transform = 'translateY(7px) rotate(45deg)';
            spans[1].style.opacity = '0';
            spans[2].style.transform = 'translateY(-7px) rotate(-45deg)';
        } else {
            spans.forEach(s => { s.style.transform = ''; s.style.opacity = ''; });
        }
    });
    window.addEventListener('scroll', () => {
        const nav = document.querySelector('.main-navbar');
        nav.style.boxShadow = window.scrollY > 10
            ? '0 2px 24px rgba(79, 88, 93, 0.14)'
            : '0 1px 16px rgba(79, 88, 93, 0.08)';
    });
</script>

</body>
</html>