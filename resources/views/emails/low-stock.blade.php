<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alerte Stock Faible</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background: #f5f6f7;
            color: #4F585D;
        }
        .wrapper {
            max-width: 600px;
            margin: 40px auto;
            background: #fff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 24px rgba(0,0,0,0.08);
        }

        /* Header */
        .header {
            background: #363e42;
            padding: 32px 40px;
            border-bottom: 3px solid #db0f0f;
        }
        .header-logo {
            font-size: 1.4rem;
            font-weight: 800;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            color: #fff;
        }
        .header-logo span { color: #db0f0f; }
        .header-tagline {
            font-size: 0.72rem;
            color: rgba(255,255,255,0.4);
            letter-spacing: 0.12em;
            text-transform: uppercase;
            margin-top: 3px;
        }

        /* Alert banner */
        .alert-banner {
            background: #db0f0f;
            padding: 16px 40px;
            display: flex;
            align-items: center;
            gap: 12px;
        }
        .alert-icon {
            font-size: 1.4rem;
        }
        .alert-text {
            color: #fff;
            font-size: 0.9rem;
            font-weight: 600;
            letter-spacing: 0.03em;
        }
        .alert-text span {
            font-size: 0.75rem;
            font-weight: 400;
            opacity: 0.85;
            display: block;
            margin-top: 2px;
        }

        /* Body */
        .body {
            padding: 36px 40px;
        }
        .body-title {
            font-size: 1.1rem;
            font-weight: 700;
            color: #363e42;
            margin-bottom: 8px;
        }
        .body-subtitle {
            font-size: 0.84rem;
            color: #6b767c;
            line-height: 1.6;
            margin-bottom: 28px;
        }

        /* Table */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 28px;
        }
        thead tr {
            background: #363e42;
        }
        thead th {
            padding: 10px 14px;
            font-size: 0.68rem;
            font-weight: 700;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            color: rgba(255,255,255,0.6);
            text-align: left;
        }
        tbody tr {
            border-bottom: 1px solid rgba(79,88,93,0.1);
            transition: background 0.15s;
        }
        tbody tr:last-child { border-bottom: none; }
        tbody tr:nth-child(even) { background: #f9fafb; }
        tbody td {
            padding: 12px 14px;
            font-size: 0.84rem;
            color: #4F585D;
        }
        .stock-badge {
            display: inline-block;
            padding: 3px 10px;
            border-radius: 3px;
            font-size: 0.75rem;
            font-weight: 700;
            letter-spacing: 0.04em;
        }
        .stock-critical {
            background: rgba(219,15,15,0.1);
            color: #db0f0f;
            border: 1px solid rgba(219,15,15,0.2);
        }
        .stock-low {
            background: rgba(255,152,0,0.1);
            color: #e65100;
            border: 1px solid rgba(255,152,0,0.25);
        }

        /* CTA */
        .cta {
            text-align: center;
            margin-bottom: 28px;
        }
        .cta a {
            display: inline-block;
            background: #db0f0f;
            color: #fff;
            text-decoration: none;
            font-size: 0.82rem;
            font-weight: 700;
            letter-spacing: 0.06em;
            text-transform: uppercase;
            padding: 12px 28px;
            border-radius: 4px;
        }

        /* Footer */
        .footer {
            background: #f5f6f7;
            border-top: 1px solid rgba(79,88,93,0.1);
            padding: 20px 40px;
            text-align: center;
        }
        .footer p {
            font-size: 0.72rem;
            color: #6b767c;
            line-height: 1.6;
        }
        .footer strong { color: #363e42; }
    </style>
</head>
<body>
<div class="wrapper">

    {{-- Header --}}
    <div class="header">
        <div class="header-logo">AQUA<span>LAB</span></div>
        <div class="header-tagline">Technologie — Système de gestion des stocks</div>
    </div>

    {{-- Alert banner --}}
    <div class="alert-banner">
        <div class="alert-icon">⚠️</div>
        <div class="alert-text">
            Alerte : Stock faible détecté
            <span>{{ $products->count() }} produit(s) nécessitent votre attention immédiate</span>
        </div>
    </div>

    {{-- Body --}}
    <div class="body">
        <div class="body-title">Bonjour, Responsable Stock</div>
        <div class="body-subtitle">
            Le système de surveillance des stocks a détecté les produits suivants
            avec un niveau de stock critique (≤ 5 unités). Veuillez procéder
            au réapprovisionnement dès que possible.
        </div>

        {{-- Products table --}}
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Produit</th>
                    <th>Catégorie</th>
                    <th>Stock restant</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $index => $product)
                <tr>
                    <td style="color:#6b767c; font-size:0.75rem;">{{ $index + 1 }}</td>
                    <td><strong>{{ $product->nom }}</strong></td>
                    <td style="color:#6b767c;">{{ $product->categorie->nom ?? '—' }}</td>
                    <td>
                        <span class="stock-badge {{ $product->stock == 0 ? 'stock-critical' : 'stock-low' }}">
                            {{ $product->stock }} unité{{ $product->stock > 1 ? 's' : '' }}
                            {{ $product->stock == 0 ? '— RUPTURE' : '' }}
                        </span>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        {{-- CTA --}}
        <div class="cta">
            <a href="{{ url('/admin/products') }}">
                Gérer les stocks →
            </a>
        </div>
    </div>

    {{-- Footer --}}
    <div class="footer">
        <p>
            Cet email a été envoyé automatiquement par le système de surveillance des stocks.<br>
            <strong>Aqualab Technologie</strong> — Maroc, Casablanca<br>
            {{ now()->format('d/m/Y à H:i') }}
        </p>
    </div>

</div>
</body>
</html>