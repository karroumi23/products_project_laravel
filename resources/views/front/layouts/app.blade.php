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
            height: 2px;
            background: linear-gradient(90deg, var(--accent) 0%, var(--accent-light) 100%, transparent 100%);
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
            {{-- <img src="{{ asset('images/logo.png') }}" alt="Aqualab Technologie"> --}}

            {{-- Text fallback (remove once real logo is available) --}}
            <div class="logo-text">
                <span class="logo-main"><span>AQUA</span>LAB</span>
                <span class="logo-sub">Technologie</span>
            </div>
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

<!-- ═══════════════════════════════════════════
     CONTENT
═══════════════════════════════════════════ -->
<div class="container mt-5">
    @yield('content')
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

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