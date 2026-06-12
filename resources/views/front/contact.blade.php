@extends('front.layouts.app')
@section('content')

@if(session('success'))
<div class="container mt-3">
    <div class="alert alert-success d-flex align-items-center gap-2" role="alert">
        <i class="bi bi-check-circle-fill"></i> {{ session('success') }}
    </div>
</div>
@endif

<style>
    .contact-hero {
        background: var(--slate-dark);
        padding: 50px 0;
        border-bottom: 3px solid #db0f0f;
    }
    .contact-hero h1 {
        font-family: 'Barlow Condensed', sans-serif;
        font-size: 2.2rem;
        font-weight: 700;
        letter-spacing: 0.04em;
        text-transform: uppercase;
        color: #fff;
        margin-bottom: 10px;
    }
    .contact-hero h1 span { color: #db0f0f; }
    .contact-hero p {
        color: rgba(255,255,255,0.55);
        font-size: 0.9rem;
        max-width: 600px;
        line-height: 1.7;
        margin: 0;
    }

    .contact-section { background: #f5f6f7; padding: 50px 0; }

    .contact-card {
        background: #fff;
        border: 1px solid rgba(79,88,93,0.1);
        border-radius: 8px;
        padding: 28px;
        height: 100%;
    }

    .contact-card h3 {
        font-family: 'Barlow Condensed', sans-serif;
        font-size: 1.1rem;
        font-weight: 700;
        letter-spacing: 0.05em;
        text-transform: uppercase;
        color: var(--slate-dark);
        margin-bottom: 18px;
        position: relative;
        padding-bottom: 10px;
    }
    .contact-card h3::after {
        content: '';
        position: absolute;
        left: 0; bottom: 0;
        width: 32px; height: 3px;
        background: #db0f0f;
        border-radius: 2px;
    }

    /* Info items */
    .info-item {
        display: flex;
        align-items: flex-start;
        gap: 14px;
        margin-bottom: 18px;
    }
    .info-item:last-child { margin-bottom: 0; }
    .info-icon {
        width: 40px; height: 40px;
        background: rgba(219,15,15,0.08);
        border-radius: 6px;
        display: flex; align-items: center; justify-content: center;
        color: #db0f0f;
        font-size: 1.05rem;
        flex-shrink: 0;
    }
    .info-text strong {
        display: block;
        font-size: 0.85rem;
        color: var(--slate-dark);
        margin-bottom: 2px;
    }
    .info-text span, .info-text a {
        font-size: 0.83rem;
        color: var(--slate-light);
        text-decoration: none;
        line-height: 1.6;
    }
    .info-text a:hover { color: #db0f0f; }

    /* Hours table */
    .hours-table { width: 100%; font-size: 0.85rem; }
    .hours-table tr { border-bottom: 1px solid rgba(79,88,93,0.08); }
    .hours-table tr:last-child { border-bottom: none; }
    .hours-table td { padding: 10px 0; color: var(--slate-light); }
    .hours-table td:first-child { font-weight: 600; color: var(--slate-dark); }
    .hours-table td:last-child { text-align: right; }
    .status-open {
        display: inline-flex; align-items: center; gap: 6px;
        color: #198754; font-size: 0.78rem; font-weight: 600;
        text-transform: uppercase; letter-spacing: 0.05em;
    }
    .status-open::before {
        content: ''; width: 7px; height: 7px;
        background: #198754; border-radius: 50%;
        display: inline-block;
    }

    /* Form */
    .form-control-aqua {
        border: 1px solid rgba(79,88,93,0.18);
        border-radius: 4px;
        padding: 10px 14px;
        font-size: 0.85rem;
        transition: border-color 0.2s, box-shadow 0.2s;
        width: 100%;
    }
    .form-control-aqua:focus {
        outline: none;
        border-color: #db0f0f;
        box-shadow: 0 0 0 3px rgba(219,15,15,0.08);
    }
    .form-label-aqua {
        font-size: 0.78rem;
        font-weight: 700;
        letter-spacing: 0.06em;
        text-transform: uppercase;
        color: var(--slate-dark);
        margin-bottom: 6px;
        display: block;
    }
    .btn-submit {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: #db0f0f;
        color: #fff;
        font-size: 0.82rem;
        font-weight: 700;
        letter-spacing: 0.06em;
        text-transform: uppercase;
        padding: 12px 28px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        transition: background 0.2s;
    }
    .btn-submit:hover { background: var(--slate-dark); }

    /* Map */
    .map-wrap {
        border-radius: 8px;
        overflow: hidden;
        border: 1px solid rgba(79,88,93,0.1);
        height: 320px;
    }
    .map-wrap iframe { width: 100%; height: 100%; border: 0; display: block; }
</style>

{{-- HERO --}}
<div class="contact-hero">
    <div class="container">
        <h1>Contactez<span>-Nous</span></h1>
        <p>
            Nous sommes là pour répondre à toutes vos questions, préoccupations ou commentaires.
            N'hésitez pas à nous contacter de la manière qui vous convient le mieux.
            Notre équipe dévouée est prête à vous aider.
        </p>
    </div>
</div>

{{-- CONTENT --}}
<div class="contact-section">
    <div class="container">
        <div class="row g-4">

            {{-- LEFT: Info + Hours --}}
            <div class="col-lg-4">
                <div class="d-flex flex-column gap-4 h-100">

                    {{-- Coordonnées --}}
                    <div class="contact-card">
                        <h3>Nos Coordonnées</h3>

                        <div class="info-item">
                            <div class="info-icon"><i class="bi bi-geo-alt-fill"></i></div>
                            <div class="info-text">
                                <strong>Adresse</strong>
                                <span>409, Ambassadeur ben aicha roche noir,<br>Casablanca — Maroc</span>
                            </div>
                        </div>

                        <div class="info-item">
                            <div class="info-icon"><i class="bi bi-telephone-fill"></i></div>
                            <div class="info-text">
                                <strong>Téléphone</strong>
                                <a href="tel:+212669809872">06 69 80 98 72</a>
                            </div>
                        </div>

                        <div class="info-item">
                            <div class="info-icon"><i class="bi bi-envelope-fill"></i></div>
                            <div class="info-text">
                                <strong>Email</strong>
                                <a href="mailto:wondersky500@gmail.com">wondersky500@gmail.com</a>
                            </div>
                        </div>

                    </div>

                    {{-- Horaires --}}
                    <div class="contact-card">
                        <h3>Horaires d'ouverture</h3>
                        <p style="font-size:0.83rem; color:var(--slate-light); margin-bottom:16px;">
                            Notre équipe est disponible pour vous assister aux heures suivantes :
                        </p>
                        <table class="hours-table">
                            <tr>
                                <td>Lundi - Vendredi</td>
                                <td>08:30 - 17:00</td>
                            </tr>
                            <tr>
                                <td>Samedi</td>
                                <td>Fermé</td>
                            </tr>
                            <tr>
                                <td>Dimanche</td>
                                <td>Fermé</td>
                            </tr>
                            <tr>
                                <td colspan="2" class="pt-3">
                                    <span class="status-open">Ouvert actuellement</span>
                                </td>
                            </tr>
                        </table>
                    </div>

                </div>
            </div>

            {{-- RIGHT: Form + Map --}}
            <div class="col-lg-8">
                <div class="contact-card mb-4">
                    <h3>Envoyez-nous un message</h3>

                    <form method="POST" action="{{ route('contact.submit') }}">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label-aqua">Nom complet</label>
                                <input type="text" name="nom" class="form-control-aqua" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label-aqua">Email</label>
                                <input type="email" name="email" class="form-control-aqua" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label-aqua">Téléphone</label>
                                <input type="tel" name="telephone" class="form-control-aqua">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label-aqua">Sujet</label>
                                <input type="text" name="sujet" class="form-control-aqua">
                            </div>
                            <div class="col-12">
                                <label class="form-label-aqua">Message</label>
                                <textarea name="message" rows="5" class="form-control-aqua" required></textarea>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn-submit">
                                    <i class="bi bi-send-fill"></i> Envoyer le message
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                {{-- Map --}}
                <div class="map-wrap">
                    <iframe
                        src="https://www.google.com/maps?q=409+Ambassadeur+ben+aicha+roche+noir+Casablanca&output=embed"
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection