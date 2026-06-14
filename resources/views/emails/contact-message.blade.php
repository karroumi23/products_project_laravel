<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: 'Segoe UI', Arial, sans-serif; background: #f5f6f7; color: #4F585D; }
        .wrapper { max-width: 600px; margin: 40px auto; background: #fff; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 24px rgba(0,0,0,0.08); }
        .header { background: #363e42; padding: 28px 36px; border-bottom: 3px solid #db0f0f; }
        .header-logo { font-size: 1.4rem; font-weight: 800; letter-spacing: 0.08em; text-transform: uppercase; color: #fff; }
        .header-logo span { color: #db0f0f; }
        .header-sub { font-size: 0.72rem; color: rgba(255,255,255,0.4); letter-spacing: 0.12em; text-transform: uppercase; margin-top: 3px; }
        .banner { background: #db0f0f; padding: 14px 36px; color: #fff; font-size: 0.88rem; font-weight: 600; }
        .body { padding: 32px 36px; }
        .body-title { font-size: 1rem; font-weight: 700; color: #363e42; margin-bottom: 20px; }
        .info-row { display: flex; border-bottom: 1px solid rgba(79,88,93,0.08); padding: 12px 0; }
        .info-row:last-of-type { border-bottom: none; }
        .info-label { width: 140px; font-size: 0.75rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.08em; color: #6b767c; flex-shrink: 0; padding-top: 1px; }
        .info-value { font-size: 0.85rem; color: #363e42; flex: 1; }
        .message-box { background: #f9fafb; border-left: 3px solid #db0f0f; border-radius: 0 4px 4px 0; padding: 16px 20px; margin-top: 20px; font-size: 0.85rem; color: #4F585D; line-height: 1.7; }
        .footer { background: #f5f6f7; border-top: 1px solid rgba(79,88,93,0.1); padding: 18px 36px; text-align: center; font-size: 0.72rem; color: #6b767c; }
        .footer strong { color: #363e42; }
    </style>
</head>
<body>
<div class="wrapper">

    <div class="header">
        <div class="header-logo">AQUA<span>LAB</span></div>
        <div class="header-sub">Nouveau message via le formulaire de contact</div>
    </div>

    <div class="banner">📩 Vous avez reçu un nouveau message de contact</div>

    <div class="body">
        <div class="body-title">Détails du message</div>

        <div class="info-row">
            <div class="info-label">Nom</div>
            <div class="info-value">{{ $nomClient }}</div>
        </div>
        <div class="info-row">
            <div class="info-label">Email</div>
            <div class="info-value">
                <a href="mailto:{{ $emailClient }}" style="color:#db0f0f">{{ $emailClient }}</a>
            </div>
        </div>
        <div class="info-row">
            <div class="info-label">Téléphone</div>
            <div class="info-value">{{ $telephone }}</div>
        </div>
        <div class="info-row">
            <div class="info-label">Sujet</div>
            <div class="info-value">{{ $sujet }}</div>
        </div>

        <div class="message-box">{{ $messageClient }}</div>
    </div>

    <div class="footer">
        <p>
            Message reçu via le site <strong>Aqualab Technologie</strong>
            — {{ now()->format('d/m/Y à H:i') }}
        </p>
    </div>

</div>
</body>
</html>