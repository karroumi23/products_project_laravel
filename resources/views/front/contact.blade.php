@extends('front.layouts.app')

{{-- Horaires d'ouverture --}}
@php
    use Carbon\Carbon;

    $now = Carbon::now('Africa/Casablanca');
    $day = $now->dayOfWeek;
    $hour = $now->format('H:i');

    $isOpen = ($day >= 1 && $day <= 5)
        && ($hour >= '08:30' && $hour <= '17:00');
@endphp

@section('content')

<style>
    .contact-alert {
        margin-top: 18px;
        border: 0;
        border-left: 4px solid #198754;
        border-radius: 6px;
        box-shadow: 0 10px 28px rgba(54, 62, 66, 0.08);
    }

    .contact-card-modern {
        padding: 28px;
    }

    .contact-card-modern h2,
    .contact-card-modern h3 {
        margin: 0 0 22px;
        color: var(--slate-dark);
        font-family: 'Barlow Condensed', sans-serif;
        font-size: 1.45rem;
        font-weight: 800;
        text-transform: uppercase;
    }

    .contact-info-list {
        display: grid;
        gap: 18px;
    }

    .contact-info-item {
        display: flex;
        gap: 14px;
        align-items: flex-start;
    }

    .contact-info-item strong {
        display: block;
        color: var(--slate-dark);
        margin-bottom: 3px;
    }

    .contact-info-item span,
    .contact-info-item a {
        color: var(--slate-light);
        line-height: 1.65;
        text-decoration: none;
    }

    .contact-info-item a:hover {
        color: #db0f0f;
    }

    .hours-table-modern {
        width: 100%;
        color: var(--slate-light);
        font-size: 0.92rem;
    }

    .hours-table-modern tr {
        border-bottom: 1px solid rgba(79, 88, 93, 0.1);
    }

    .hours-table-modern tr:last-child {
        border-bottom: 0;
    }

    .hours-table-modern td {
        padding: 12px 0;
    }

    .hours-table-modern td:first-child {
        color: var(--slate-dark);
        font-weight: 700;
    }

    .hours-table-modern td:last-child {
        text-align: right;
    }

    .status-open,
    .status-closed {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        font-weight: 800;
    }

    .status-open {
        color: #198754;
    }

    .status-closed {
        color: #dc3545;
    }

    .status-open i,
    .status-closed i {
        font-size: 0.55rem;
    }

    .form-label-aqua {
        display: block;
        margin-bottom: 7px;
        color: var(--slate-dark);
        font-size: 0.75rem;
        font-weight: 800;
        letter-spacing: 0.08em;
        text-transform: uppercase;
    }

    .form-control-aqua {
        width: 100%;
        min-height: 44px;
        border: 1px solid rgba(79, 88, 93, 0.16);
        border-radius: 6px;
        background: #f8f9fa;
        color: var(--slate-dark);
        font-size: 0.9rem;
        padding: 11px 13px;
        transition: border-color 0.2s, box-shadow 0.2s, background 0.2s;
    }

    textarea.form-control-aqua {
        min-height: 142px;
        resize: vertical;
    }

    .form-control-aqua:focus {
        outline: none;
        background: #fff;
        border-color: #db0f0f;
        box-shadow: 0 0 0 4px rgba(219, 15, 15, 0.08);
    }

    .btn-submit {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 9px;
        border: 0;
        background: #db0f0f;
        color: #fff;
        font-size: 0.82rem;
        font-weight: 800;
        letter-spacing: 0.06em;
        text-transform: uppercase;
        padding: 13px 24px;
        transition: background 0.2s, transform 0.2s;
    }

    .btn-submit:hover {
        background: var(--slate-dark);
        color: #fff;
        transform: translateY(-1px);
    }

    .contact-map-card {
        margin-top: 24px;
        padding: 18px;
    }

    .contact-map-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 16px;
        margin-bottom: 16px;
        flex-wrap: wrap;
    }

    .contact-map-header h2 {
        margin: 0;
        color: var(--slate-dark);
        font-family: 'Barlow Condensed', sans-serif;
        font-size: 1.45rem;
        font-weight: 800;
        text-transform: uppercase;
    }

    .contact-map-header span {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        color: var(--slate-light);
        font-size: 0.88rem;
        font-weight: 700;
    }

    .contact-map-header i {
        color: #db0f0f;
    }

    .map-wrap-modern {
        position: relative;
        width: 100%;
        aspect-ratio: 16 / 6;
        min-height: 340px;
        overflow: hidden;
        border: 1px solid rgba(79, 88, 93, 0.1);
        border-radius: 8px;
        box-shadow: 0 10px 32px rgba(54, 62, 66, 0.07);
    }

    .map-wrap-modern iframe {
        width: 100%;
        height: 100%;
        border: 0;
        display: block;
    }

    @media (max-width: 575px) {
        .contact-card-modern {
            padding: 22px;
        }

        .hours-table-modern td:last-child {
            text-align: left;
        }

        .hours-table-modern td {
            display: block;
            padding: 6px 0;
        }

        .contact-map-card {
            padding: 14px;
        }

        .map-wrap-modern {
            aspect-ratio: 1 / 1;
            min-height: 260px;
        }
    }
</style>

{{-- success alert --}}
@if(session('success'))
    <div class="container">
        <div class="alert alert-success contact-alert d-flex align-items-center gap-2" role="alert">
            <i class="bi bi-check-circle-fill"></i>
            {{ session('success') }}
        </div>
    </div>
@endif

{{-- hero --}}
<section class="page-hero">
    <div class="container">
        <span class="page-kicker">Contact</span>
        <h1 class="page-title">Parlons de votre <span>projet</span></h1>
        <p class="page-lead">
            Une question technique, une demande de devis ou un besoin d'accompagnement ?
            Notre équipe vous répond avec clarté et réactivité.
        </p>
    </div>
</section>

<section class="site-section">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-4">
                <div class="d-grid gap-4">
                    {{-- Coordonnées --}}
                    <div class="site-card contact-card-modern">
                        <h2>Coordonnées</h2>
                        <div class="contact-info-list">
                            <div class="contact-info-item">
                                <div class="icon-tile"><i class="bi bi-geo-alt-fill"></i></div>
                                <div>
                                    <strong>Adresse</strong>
                                    <span>409, Ambassadeur ben aicha roche noir,<br>Casablanca — Maroc</span>
                                </div>
                            </div>
                            <div class="contact-info-item">
                                <div class="icon-tile"><i class="bi bi-telephone-fill"></i></div>
                                <div>
                                    <strong>Téléphone</strong>
                                    <a href="tel:+212669809872">06 69 80 98 72</a>
                                </div>
                            </div>
                            <div class="contact-info-item">
                                <div class="icon-tile"><i class="bi bi-envelope-fill"></i></div>
                                <div>
                                    <strong>Email</strong>
                                    <a href="mailto:wondersky500@gmail.com">wondersky500@gmail.com</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Horaires --}}
                    <div class="site-card contact-card-modern">
                        <h2>Horaires</h2>
                        <table class="hours-table-modern">
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
                                <td colspan="2">
                                    @if($isOpen)
                                        <span class="status-open">
                                            <i class="bi bi-circle-fill"></i>
                                            Ouvert actuellement
                                        </span>
                                    @else
                                        <span class="status-closed">
                                            <i class="bi bi-circle-fill"></i>
                                            Fermé actuellement
                                        </span>
                                    @endif
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
           {{-- contact --}}
            <div class="col-lg-8">
                <div class="site-card contact-card-modern mb-4">
                    <h2>Envoyez-nous un message</h2>
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
                                <textarea name="message" class="form-control-aqua" required></textarea>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn-submit">
                                    <i class="bi bi-send-fill"></i>
                                    Envoyer le message
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
        {{-- map --}}
        <div class="site-card contact-map-card">
            <div class="contact-map-header">
                <h2>Notre localisation</h2>
                <span>
                    <i class="bi bi-geo-alt-fill"></i>
                    409, Ambassadeur ben aicha roche noir, Casablanca
                </span>
            </div>
            <div class="map-wrap-modern">
                <iframe
                    src="https://www.google.com/maps?q=409+Ambassadeur+ben+aicha+roche+noir+Casablanca&output=embed"
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>
    </div>
</section>

@endsection
