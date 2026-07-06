<x-filament-panels::page>

@php
    $productsCount = \App\Models\Product::count();
    $categoriesCount = \App\Models\Categorie::count();
    $sectionsCount = \App\Models\Section::count();
    $usersCount = \App\Models\User::count();
    $latestProducts = \App\Models\Product::latest()->take(6)->get();
@endphp

<style>
    .aq-dash {
        --card-bg: #ffffff;
        --card-border: rgba(15, 23, 42, 0.06);
        --text-main: #0f172a;
        --text-muted: #64748b;
        --shadow: 0 10px 30px rgba(15, 23, 42, 0.06);
    }
    .dark .aq-dash {
        --card-bg: #1e1e2d;
        --card-border: rgba(255, 255, 255, 0.06);
        --text-main: #f1f5f9;
        --text-muted: #94a3b8;
        --shadow: 0 10px 30px rgba(0, 0, 0, 0.35);
    }

    .aq-dash { display: flex; flex-direction: column; gap: 28px; }

    /* ---- Hero ---- */
    .aq-hero {
        position: relative;
        overflow: hidden;
        border-radius: 24px;
        padding: 36px 40px;
        background: linear-gradient(120deg, #db0f0f 0%, #f4585a 100%);
        color: #fff;
        box-shadow: var(--shadow);
    }
    .aq-hero-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 6px 14px;
        border-radius: 999px;
        background: rgba(255,255,255,0.18);
        font-size: 12px;
        font-weight: 600;
        letter-spacing: 0.03em;
    }
    .aq-hero h1 {
        margin: 18px 0 8px;
        font-size: 32px;
        font-weight: 800;
        line-height: 1.15;
    }
    .aq-hero p {
        margin: 0;
        font-size: 15px;
        color: rgba(255,255,255,0.9);
        max-width: 520px;
    }
    .aq-hero-deco {
        position: absolute;
        right: -40px;
        top: -40px;
        width: 220px;
        height: 220px;
        border-radius: 50%;
        background: rgba(255,255,255,0.08);
    }
    .aq-hero-deco2 {
        position: absolute;
        right: 60px;
        bottom: -60px;
        width: 140px;
        height: 140px;
        border-radius: 50%;
        background: rgba(255,255,255,0.08);
    }

    /* ---- Stat cards ---- */
    .aq-stats-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 18px;
    }
    @media (max-width: 1024px) { .aq-stats-grid { grid-template-columns: repeat(2, 1fr); } }
    @media (max-width: 640px) { .aq-stats-grid { grid-template-columns: 1fr; } }

    .aq-stat-card {
        position: relative;
        overflow: hidden;
        border-radius: 20px;
        padding: 20px 22px;
        color: #fff;
        box-shadow: var(--shadow);
        min-height: 108px;
    }
    .aq-stat-card p.label { margin: 0 0 8px; font-size: 13px; font-weight: 500; opacity: 0.9; }
    .aq-stat-card h2.value { margin: 0; font-size: 30px; font-weight: 800; line-height: 1; }
    .aq-stat-icon {
        position: absolute;
        top: 18px;
        right: 18px;
        width: 42px;
        height: 42px;
        border-radius: 12px;
        background: rgba(255,255,255,0.22);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 19px;
    }
    .aq-stat-deco {
        position: absolute;
        right: -18px;
        bottom: -18px;
        width: 90px;
        height: 90px;
        border-radius: 50%;
        background: rgba(255,255,255,0.10);
    }

    /* ---- Content cards ---- */
    .aq-row {
        display: grid;
        grid-template-columns: 2fr 1fr;
        gap: 18px;
    }
    @media (max-width: 1024px) { .aq-row { grid-template-columns: 1fr; } }

    .aq-card {
        border-radius: 20px;
        background: var(--card-bg);
        border: 1px solid var(--card-border);
        box-shadow: var(--shadow);
        padding: 22px 24px;
    }
    .aq-card-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 18px;
    }
    .aq-card-header h2 {
        margin: 0;
        font-size: 17px;
        font-weight: 700;
        color: var(--text-main);
    }
    .aq-card-header a {
        font-size: 13px;
        font-weight: 700;
        color: #db0f0f;
        text-decoration: none;
    }
    .aq-card-header a:hover { text-decoration: underline; }

    .aq-product-row {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 13px 14px;
        border-radius: 12px;
        border: 1px solid var(--card-border);
        margin-bottom: 10px;
    }
    .aq-product-row:last-child { margin-bottom: 0; }
    .aq-product-name { margin: 0; font-size: 14px; font-weight: 600; color: var(--text-main); }
    .aq-product-cat { font-size: 12px; color: var(--text-muted); }
    .aq-product-tag {
        font-size: 11px;
        font-weight: 700;
        padding: 4px 10px;
        border-radius: 999px;
        background: rgba(219, 15, 15, 0.1);
        color: #db0f0f;
        white-space: nowrap;
    }

    .aq-action {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 14px 16px;
        border-radius: 14px;
        color: #fff;
        font-weight: 700;
        font-size: 14px;
        text-decoration: none;
        margin-bottom: 12px;
        transition: filter 0.15s ease;
    }
    .aq-action:last-child { margin-bottom: 0; }
    .aq-action:hover { filter: brightness(0.92); color: #fff; }
    .aq-action.red { background: #db0f0f; }
    .aq-action.dark-slate { background: #363e42; }
    .aq-action.blue { background: #0891b2; }
</style>

<div class="aq-dash">

    {{-- Hero --}}
    <div class="aq-hero">
        <div class="aq-hero-deco"></div>
        <div class="aq-hero-deco2"></div>
        <span class="aq-hero-badge">🚀 AQUALAB Dashboard</span>
        <h1>Bonjour, {{ auth()->user()->name }} 👋</h1>
        <p>Gérez vos produits, catégories et le contenu du site depuis une interface moderne.</p>
    </div>

    {{-- Stats --}}
    <div class="aq-stats-grid">
        <div class="aq-stat-card" style="background: linear-gradient(135deg, #db0f0f, #f4585a);">
            <p class="label">Produits</p>
            <h2 class="value">{{ $productsCount }}</h2>
            <div class="aq-stat-icon">📦</div>
            <div class="aq-stat-deco"></div>
        </div>

        <div class="aq-stat-card" style="background: linear-gradient(135deg, #0891b2, #38bdf8);">
            <p class="label">Catégories</p>
            <h2 class="value">{{ $categoriesCount }}</h2>
            <div class="aq-stat-icon">🏷️</div>
            <div class="aq-stat-deco"></div>
        </div>

        <div class="aq-stat-card" style="background: linear-gradient(135deg, #7c3aed, #a78bfa);">
            <p class="label">Sections</p>
            <h2 class="value">{{ $sectionsCount }}</h2>
            <div class="aq-stat-icon">📄</div>
            <div class="aq-stat-deco"></div>
        </div>

        <div class="aq-stat-card" style="background: linear-gradient(135deg, #d97706, #fbbf24);">
            <p class="label">Utilisateurs</p>
            <h2 class="value">{{ $usersCount }}</h2>
            <div class="aq-stat-icon">👤</div>
            <div class="aq-stat-deco"></div>
        </div>
    </div>

    {{-- Second row --}}
    <div class="aq-row">

        {{-- Latest products --}}
        <div class="aq-card">
            <div class="aq-card-header">
                <h2>Derniers Produits</h2>
                <a href="{{ route('filament.admin.resources.products.index') }}">Voir tout →</a>
            </div>

            @forelse($latestProducts as $product)
                <div class="aq-product-row">
                    <div>
                        <p class="aq-product-name">{{ $product->nom }}</p>
                        <span class="aq-product-cat">{{ optional($product->categorie)->nom }}</span>
                    </div>
                    <span class="aq-product-tag">Produit</span>
                </div>
            @empty
                <p style="color: var(--text-muted); font-size: 14px;">Aucun produit pour le moment.</p>
            @endforelse
        </div>

        {{-- Quick actions --}}
        <div class="aq-card">
            <div class="aq-card-header">
                <h2>Actions rapides</h2>
            </div>

            <a href="{{ route('filament.admin.resources.products.create') }}" class="aq-action red">
                Nouveau Produit <span>➜</span>
            </a>
            <a href="{{ route('filament.admin.resources.categories.create') }}" class="aq-action dark-slate">
                Nouvelle Catégorie <span>➜</span>
            </a>
            <a href="{{ route('filament.admin.resources.sections.create') }}" class="aq-action blue">
                Nouvelle Section <span>➜</span>
            </a>
        </div>

    </div>

</div>

</x-filament-panels::page>