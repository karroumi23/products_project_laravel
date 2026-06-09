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

    {{-- titles style --}}
    <style>
                .section-title{
            font-size: 52px;
            font-weight: 800;
            color: #1e293b;
            margin-bottom: 15px;
            position: relative;
            line-height: 1.1;
        }

        .section-title::after{
            content: '';
            width: 90px;
            height: 2px;
            background: linear-gradient(to right, #e20613, #ff4d5a);
            position: absolute;
            left: 0;
            bottom: -12px;
            border-radius: 30px;
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
            margin-bottom: 50px;
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

    {{-- products slider  section home page --}}
    <style>

        /* ─── SLIDER ─────────────────────────────────────────────── */
        .slider-wrapper { overflow: hidden; border-radius: 8px; }
        .slider-track {
            display: flex; gap: 16px;
            transition: transform 0.38s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            will-change: transform;
        }
        .slide-item {
            flex: 0 0 calc(33.333% - 11px);
            min-width: calc(33.333% - 11px);
        }
        .product-card {
            background: #fff; border-radius: 8px; overflow: hidden;
            display: flex; flex-direction: column;
            height: 340px;
            border: 1px solid rgba(79,88,93,0.08);
            transition: box-shadow 0.22s, transform 0.22s;
            position: relative;
        }
        .product-card:hover { box-shadow: 0 12px 40px rgba(79,88,93,0.14); transform: translateY(-4px); }
        .product-card-img-wrap {
            width: 100%; height: 180px; flex-shrink: 0;
            overflow: hidden; background: #f8f8f8; position: relative;
        }
        .product-card-img-wrap img { width: 100%; height: 100%; object-fit: cover; transition: transform 0.5s ease; }
        .product-card:hover .product-card-img-wrap img { transform: scale(1.06); }
        .product-card-img-wrap::after {
            content: ''; position: absolute; bottom: 0; left: 0;
            width: 100%; height: 2px; background: #db0f0f;
            transform: scaleX(0); transform-origin: left; transition: transform 0.3s ease;
        }
        .product-card:hover .product-card-img-wrap::after { transform: scaleX(1); }
        .product-card-body { padding: 12px 16px 8px 16px; display: flex; flex-direction: column; flex: 1; min-height: 0; }
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
        .product-card-footer { padding: 0 16px 14px 16px; margin-top: auto; }
        .btn-detail {
            display: flex; align-items: center; justify-content: center; gap: 7px;
            width: 100%; background: var(--slate-dark); color: #fff;
            font-size: 0.72rem; font-weight: 700; letter-spacing: 0.08em;
            text-transform: uppercase; padding: 9px 16px; border-radius: 4px;
            text-decoration: none; transition: background 0.18s;
        }
        .btn-detail:hover { background: #db0f0f; color: #fff; }
        .slider-btn {
            display: flex; align-items: center; justify-content: center;
            width: 36px; height: 36px; border-radius: 4px;
            border: 1.5px solid rgba(79,88,93,0.2);
            background: #fff; color: var(--slate);
            cursor: pointer; transition: all 0.15s; font-size: 0.85rem;
        }
        .slider-btn:hover { background: #db0f0f; border-color: #db0f0f; color: #fff; }
        .slider-btn:disabled { opacity: 0.25; cursor: not-allowed; pointer-events: none; }
        .slider-dots { display: flex; align-items: center; justify-content: center; gap: 6px; margin-top: 18px; }
        .slider-dot {
            width: 7px; height: 7px; border-radius: 50%;
            background: rgba(79,88,93,0.18); border: none; cursor: pointer;
            transition: all 0.2s; padding: 0;
        }
        .slider-dot.active { background: #db0f0f; width: 22px; border-radius: 4px; }
        .btn-voir-tous {
            display: inline-flex; align-items: center; gap: 6px;
            font-size: 0.75rem; font-weight: 700; letter-spacing: 0.06em;
            text-transform: uppercase; color: #fff; background: #db0f0f;
            border: 1.5px solid #db0f0f; padding: 8px 18px; border-radius: 4px;
            text-decoration: none; transition: all 0.18s; white-space: nowrap;
        }
        .btn-voir-tous:hover { background: var(--slate-dark); border-color: var(--slate-dark); color: #fff; }
        @media (max-width: 991px) {
            .slide-item { flex: 0 0 calc(50% - 8px); min-width: calc(50% - 8px); }
        }
        @media (max-width: 575px) {
            .slide-item { flex: 0 0 100%; min-width: 100%; }
            .product-card { height: 320px; }
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


    {{-- PARTNERS SECTION home page --}}
    <style>
        /* ─── PARTNERS SECTION ───────────────────────────────────── */
        .partners-section {
            background: #f5f6f7;
            padding: 60px 0;
            border-top: 1px solid rgba(79,88,93,0.08);
        }

        /* Slider */
        .partners-slider-wrapper { overflow: hidden; }
        .partners-slider-track {
            display: flex;
            gap: 20px;
            transition: transform 0.38s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            will-change: transform;
        }
        .partner-slide {
            flex: 0 0 calc(25% - 15px);
            min-width: calc(25% - 15px);
        }

        /* Card */
        .partner-card {
            background: #fff;
            border: 1px solid rgba(79,88,93,0.1);
            border-radius: 8px;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            height: 100%;
            transition: box-shadow 0.22s, transform 0.22s, border-color 0.22s;
            position: relative;
        }
        .partner-card::before {
            content: '';
            position: absolute;
            top: 0; left: 0;
            width: 100%; height: 3px;
            background: #db0f0f;
            transform: scaleX(0);
            transform-origin: left;
            transition: transform 0.3s ease;
        }
        .partner-card:hover {
            box-shadow: 0 8px 32px rgba(79,88,93,0.12);
            transform: translateY(-4px);
            border-color: rgba(219,15,15,0.25);
        }
        .partner-card:hover::before { transform: scaleX(1); }

        /* Logo area */
        .partner-card-img {
            width: 100%;
            height: 130px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #fafafa;
            border-bottom: 1px solid rgba(79,88,93,0.07);
            padding: 20px;
        }
        .partner-card-img img {
            max-width: 100%;
            max-height: 70px;
            object-fit: contain;
            filter: grayscale(80%);
            opacity: 0.7;
            transition: filter 0.3s, opacity 0.3s;
        }
        .partner-card:hover .partner-card-img img {
            filter: grayscale(0%);
            opacity: 1;
        }

        /* Body */
        .partner-card-body {
            padding: 16px 18px 20px 18px;
            display: flex;
            flex-direction: column;
            flex: 1;
        }
        .partner-card-name {
            font-family: 'Barlow Condensed', sans-serif;
            font-size: 1rem;
            font-weight: 700;
            letter-spacing: 0.06em;
            text-transform: uppercase;
            color: var(--slate-dark);
            margin-bottom: 8px;
            transition: color 0.2s;
        }
        .partner-card:hover .partner-card-name { color: #db0f0f; }
        .partner-card-desc {
            font-size: 0.78rem;
            color: var(--slate-light);
            line-height: 1.6;
            flex: 1;
        }

        /* Nav arrows */
        .partner-slider-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 36px; height: 36px;
            border-radius: 4px;
            border: 1.5px solid rgba(79,88,93,0.2);
            background: #fff;
            color: var(--slate);
            cursor: pointer;
            transition: all 0.15s;
            font-size: 0.85rem;
        }
        .partner-slider-btn:hover { background: #db0f0f; border-color: #db0f0f; color: #fff; }
        .partner-slider-btn:disabled { opacity: 0.25; cursor: not-allowed; pointer-events: none; }

        /* Dots */
        .partner-dots {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            margin-top: 20px;
        }
        .partner-dot {
            width: 7px; height: 7px;
            border-radius: 50%;
            background: rgba(79,88,93,0.18);
            border: none; cursor: pointer;
            transition: all 0.2s; padding: 0;
        }
        .partner-dot.active { background: #db0f0f; width: 22px; border-radius: 4px; }

        /* Responsive */
        @media (max-width: 991px) {
            .partner-slide { flex: 0 0 calc(50% - 10px); min-width: calc(50% - 10px); }
        }
        @media (max-width: 575px) {
            .partner-slide { flex: 0 0 100%; min-width: 100%; }
        }
    </style>

    {{-- SERVICES SECTION home page --}}
    <style>
        /* ─── SERVICES SECTION ───────────────────────────────────── */
        .services-section {
            background: #f5f6f7;
            padding: 60px 0;
        }
        .services-subtitle {
            color: var(--slate-light);
            font-size: 0.88rem;
        }

        /* Accordion */
        .service-accordion {
            background: #fff;
            border: 1px solid rgba(79,88,93,0.1);
            border-radius: 6px;
            overflow: hidden;
            transition: box-shadow 0.2s;
        }
        .service-accordion:hover {
            box-shadow: 0 4px 20px rgba(79,88,93,0.1);
        }
        .service-accordion-header {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 18px 24px;
            background: #fff;
            border: none;
            cursor: pointer;
            transition: background 0.18s;
            text-align: left;
        }
        .service-accordion-header:hover {
            background: rgba(219,15,15,0.03);
        }
        .service-accordion.open .service-accordion-header {
            background: var(--slate-dark);
            border-bottom: 2px solid #db0f0f;
        }
        .service-icon-sm {
            width: 38px; height: 38px;
            background: rgba(219,15,15,0.08);
            border-radius: 6px;
            display: flex; align-items: center; justify-content: center;
            font-size: 1rem; color: #db0f0f;
            flex-shrink: 0;
            transition: background 0.18s, color 0.18s;
        }
        .service-accordion.open .service-icon-sm {
            background: #db0f0f;
            color: #fff;
        }
        .service-accordion-title {
            font-family: 'Barlow Condensed', sans-serif;
            font-size: 1rem; font-weight: 700;
            letter-spacing: 0.05em; text-transform: uppercase;
            color: var(--slate-dark);
            transition: color 0.18s;
        }
        .service-accordion.open .service-accordion-title {
            color: #fff;
        }
        .service-chevron {
            font-size: 0.85rem;
            color: var(--slate-light);
            transition: transform 0.3s ease, color 0.18s;
            flex-shrink: 0;
        }
        .service-accordion.open .service-chevron {
            transform: rotate(180deg);
            color: #fff;
        }
        .service-accordion-body {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.35s ease, padding 0.35s ease;
            padding: 0 24px;
        }
        .service-accordion.open .service-accordion-body {
            max-height: 300px;
            padding: 18px 24px;
        }
        .service-accordion-desc {
            font-size: 0.85rem;
            color: var(--slate-light);
            line-height: 1.7;
            margin: 0;
        }
    </style>

     {{--  À Propos page --}}
    <style>
                body{
            background: #f4f6f9;
        }

        /* ================= HERO ================= */

        .about-hero{
            position: relative;
            padding: 120px 0 100px;
            background:
                linear-gradient(rgba(11,16,27,0.88), rgba(11,16,27,0.92)),
                url('{{ asset("images/about-bg.jpg") }}');
            background-size: cover;
            background-position: center;
            overflow: hidden;
        }

        .about-hero::before{
            content: '';
            position: absolute;
            top: -100px;
            right: -100px;
            width: 350px;
            height: 350px;
            background: rgba(226, 6, 19, 0.08);
            border-radius: 50%;
        }

        .about-hero::after{
            content: '';
            position: absolute;
            bottom: -120px;
            left: -120px;
            width: 320px;
            height: 320px;
            background: rgba(255,255,255,0.03);
            border-radius: 50%;
        }

        .about-badge{
            display: inline-block;
            background: rgba(226, 6, 19, 0.15);
            color: #ff2d3d;
            padding: 10px 22px;
            border-radius: 50px;
            font-size: 14px;
            font-weight: 700;
            letter-spacing: 1px;
            margin-bottom: 25px;
            border: 1px solid rgba(255,255,255,0.08);
        }

        .about-title{
            color: #fff;
            font-size: 65px;
            line-height: 1.1;
            font-weight: 800;
            margin-bottom: 25px;
        }

        .about-title span{
            color: #e20613;
        }

        .about-description{
            color: #cfd5df;
            font-size: 18px;
            line-height: 1.9;
            max-width: 850px;
        }

        /* ================= INFO SECTION ================= */

        .about-info{
            padding: 90px 0;
            position: relative;
        }

        .section-heading{
            font-size: 48px;
            font-weight: 800;
            color: #1e293b;
            margin-bottom: 20px;
            position: relative;
        }

        .section-heading::after{
            content: '';
            width: 90px;
            height: 4px;
            background: #e20613;
            position: absolute;
            left: 0;
            bottom: -12px;
            border-radius: 20px;
        }

        .about-card{
            background: #fff;
            border-radius: 24px;
            padding: 45px;
            box-shadow: 0 15px 40px rgba(0,0,0,0.06);
            border: 1px solid #edf1f7;
            transition: 0.4s ease;
            height: 100%;
        }

        .about-card:hover{
            transform: translateY(-8px);
        }

        .about-card p{
            color: #64748b;
            line-height: 2;
            font-size: 16px;
        }

        .about-card strong{
            color: #1e293b;
        }

        /* ================= TIMELINE ================= */

        .timeline-section{
            padding: 100px 0;
            background: #0f172a;
            position: relative;
            overflow: hidden;
        }

        .timeline-title{
            text-align: center;
            color: #fff;
            font-size: 52px;
            font-weight: 800;
            margin-bottom: 80px;
        }

        .timeline{
            position: relative;
            max-width: 1100px;
            margin: auto;
        }

        .timeline::before{
            content: '';
            position: absolute;
            left: 50%;
            top: 0;
            transform: translateX(-50%);
            width: 4px;
            height: 100%;
            background: linear-gradient(to bottom, #e20613, #ffffff20);
        }

        .timeline-item{
            position: relative;
            width: 50%;
            padding: 20px 50px;
            margin-bottom: 50px;
        }

        .timeline-item.left{
            left: 0;
            text-align: right;
        }

        .timeline-item.right{
            left: 50%;
        }

        .timeline-content{
            background: #1e293b;
            padding: 35px;
            border-radius: 24px;
            position: relative;
            border: 1px solid rgba(255,255,255,0.06);
            box-shadow: 0 10px 35px rgba(0,0,0,0.25);
            transition: 0.4s ease;
        }

        .timeline-content:hover{
            transform: translateY(-8px);
            border-color: rgba(226,6,19,0.4);
        }

        .timeline-year{
            display: inline-block;
            background: #e20613;
            color: white;
            font-weight: 700;
            padding: 8px 20px;
            border-radius: 40px;
            margin-bottom: 18px;
            font-size: 14px;
            letter-spacing: 1px;
        }

        .timeline-content h3{
            color: #fff;
            font-size: 26px;
            margin-bottom: 18px;
            font-weight: 700;
        }

        .timeline-content p{
            color: #cbd5e1;
            line-height: 1.9;
            margin: 0;
        }

        .timeline-dot{
            position: absolute;
            top: 50px;
            width: 22px;
            height: 22px;
            background: #e20613;
            border-radius: 50%;
            border: 5px solid #fff;
            z-index: 2;
            box-shadow: 0 0 20px rgba(226,6,19,0.6);
        }

        .timeline-item.left .timeline-dot{
            right: -11px;
        }

        .timeline-item.right .timeline-dot{
            left: -11px;
        }

        /* ================= RESPONSIVE ================= */

        @media(max-width: 991px){

            .about-title{
                font-size: 45px;
            }

            .timeline::before{
                left: 20px;
            }

            .timeline-item{
                width: 100%;
                padding-left: 70px;
                padding-right: 15px;
                text-align: left !important;
            }

            .timeline-item.right{
                left: 0;
            }

            .timeline-dot{
                left: 10px !important;
            }
        }

        @media(max-width: 768px){

            .about-title{
                font-size: 38px;
            }

            .section-heading,
            .timeline-title{
                font-size: 36px;
            }

            .about-card,
            .timeline-content{
                padding: 28px;
            }
        }
    </style>

    {{-- footer SECTION  --}}
    <style>
        /* ─── FOOTER ─────────────────────────────────────────────── */
        .main-footer {
            background: #fff;
            border-top: 1px solid rgba(79,88,93,0.1);
        }

        /* Top section */
        .footer-top {
            padding: 60px 0 48px 0;
        }

        /* Logo */
        .footer-logo img {
            height: 48px;
            width: auto;
            margin-bottom: 16px;
            display: block;
        }

        /* Description */
        .footer-desc {
            font-size: 0.83rem;
            color: var(--slate-light);
            line-height: 1.7;
            max-width: 280px;
            margin-bottom: 20px;
        }

        /* Social buttons */
        .footer-socials {
            display: flex;
            gap: 8px;
        }
        .social-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 36px; height: 36px;
            border-radius: 4px;
            border: 1px solid rgba(79,88,93,0.15);
            color: var(--slate);
            font-size: 0.9rem;
            text-decoration: none;
            transition: all 0.18s;
            background: transparent;
        }
        .social-btn:hover {
            background: #db0f0f;
            border-color: #db0f0f;
            color: #fff;
            transform: translateY(-2px);
        }

        /* Headings */
        .footer-heading {
            font-family: 'Barlow Condensed', sans-serif;
            font-size: 0.72rem;
            font-weight: 700;
            letter-spacing: 0.16em;
            text-transform: uppercase;
            color: #db0f0f;
            margin-bottom: 20px;
            position: relative;
            padding-bottom: 10px;
        }
        .footer-heading::after {
            content: '';
            position: absolute;
            left: 0; bottom: 0;
            width: 24px; height: 2px;
            background: #db0f0f;
            border-radius: 2px;
        }

        /* Nav links */
        .footer-links {
            list-style: none;
            padding: 0; margin: 0;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
        .footer-links li a {
            font-size: 0.82rem;
            font-weight: 500;
            letter-spacing: 0.05em;
            text-transform: uppercase;
            color: var(--slate-light);
            text-decoration: none;
            transition: color 0.18s, padding-left 0.18s;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }
        .footer-links li a::before {
            content: '';
            width: 0; height: 1px;
            background: #db0f0f;
            transition: width 0.2s;
            display: inline-block;
        }
        .footer-links li a:hover {
            color: #db0f0f;
        }
        .footer-links li a:hover::before {
            width: 12px;
        }

        /* Contact list */
        .footer-contact-list {
            list-style: none;
            padding: 0; margin: 0;
            display: flex;
            flex-direction: column;
            gap: 16px;
        }
        .footer-contact-list li {
            display: flex;
            align-items: flex-start;
            gap: 12px;
        }
        .contact-icon {
            width: 32px; height: 32px;
            background: rgba(219,15,15,0.08);
            border-radius: 4px;
            display: flex; align-items: center; justify-content: center;
            color: #db0f0f;
            font-size: 0.85rem;
            flex-shrink: 0;
            margin-top: 1px;
        }
        .footer-contact-list li span,
        .footer-contact-list li a {
            font-size: 0.82rem;
            color: var(--slate-light);
            line-height: 1.6;
            text-decoration: none;
            transition: color 0.18s;
        }
        .footer-contact-list li a:hover {
            color: #db0f0f;
        }

        /* Bottom bar */
        .footer-bottom {
            background: var(--slate-dark);
            padding: 14px 0;
            font-size: 0.72rem;
            color: rgba(255,255,255,0.4);
            letter-spacing: 0.04em;
        }
        .footer-bottom strong {
            color: rgba(255,255,255,0.7);
            font-weight: 600;
        }

        @media (max-width: 767px) {
            .footer-top { padding: 40px 0 32px 0; }
        }
    </style>



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

{{-- FOOTER --}}
@include('front.layouts.footer')   {{-- ← ajoute cette ligne --}}


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