@extends('front.layouts.app')

@section('content')

<style>

        .service-card{
        background:#fff;
        border-radius:8px;
        padding:30px;
        border:1px solid rgba(79,88,93,.08);
        transition:.3s;
        height:100%;
    }

    .service-card:hover{
        transform:translateY(-6px);
        box-shadow:0 12px 35px rgba(0,0,0,.08);
    }

    .service-icon{
        width:70px;
        height:70px;
        background:#db0f0f;
        color:#fff;
        border-radius:50%;
        display:flex;
        align-items:center;
        justify-content:center;
        font-size:28px;
        margin-bottom:20px;
    }

    .service-card h3{
        font-family:'Barlow Condensed',sans-serif;
        color:var(--slate-dark);
        margin-bottom:20px;
    }

    .service-card ul{
        margin:0;
        padding-left:20px;
    }

    .service-card li{
        margin-bottom:12px;
        color:#666;
    }

    .feature-box{
        background:#fff;
        padding:30px;
        border-radius:8px;
        text-align:center;
        height:100%;
    }

    .feature-box i{
        font-size:42px;
        color:#db0f0f;
        margin-bottom:15px;
    }

    .service-cta{
        background:var(--slate-dark);
        color:#fff;
        text-align:center;
        padding:70px 0;
    }

    .btn-red{
        display:inline-block;
        margin-top:25px;
        background:#db0f0f;
        color:#fff;
        padding:14px 30px;
        border-radius:5px;
        text-decoration:none;
        transition:.3s;
    }

    .btn-red:hover{
        background:#fff;
        color:#db0f0f;
    }

    /* ------service-list icon------- */
    .service-list{
    list-style:none;
    padding:0;
    margin:0;
    }

    .service-list li{
        display:flex;
        align-items:flex-start;
        gap:12px;
        margin-bottom:14px;
        color:#555;
        line-height:1.6;
    }

    .service-list i{
        color:#db0f0f;
        font-size:1rem;
        flex-shrink:0;
        margin-top:3px;
    }
</style>


<section class="page-hero">

    <div class="container">

        <span class="page-kicker">
            Nos Services
        </span>

        <h1 class="page-title">
            Des solutions complètes pour votre <span>laboratoire</span>
        </h1>

        <p class="page-lead">
            Nous accompagnons nos clients dans toutes les étapes de leurs projets,
            de l'étude technique jusqu'à la maintenance de leurs équipements.
        </p>

    </div>

</section>

<section class="">

    <div class="container">

    <div class="row g-4">

        {{-- Installation --}}
        <div class="col-lg-6">

            <div class="service-card">

                <div class="service-icon">
                    <i class="bi bi-tools"></i>
                </div>

                <h3>Installation et mise en marche</h3>

                <ul class="service-list">
                    <li><i class="bi bi-wrench-adjustable-circle-fill"></i> Pré-installation</li>
                    <li><i class="bi bi-gear-fill"></i> Installation professionnelle</li>
                    <li><i class="bi bi-play-circle-fill"></i> Mise en marche et vérification</li>
                </ul>

            </div>

        </div>

        {{-- Formation --}}
        <div class="col-lg-6">

            <div class="service-card">

                <div class="service-icon">
                    <i class="bi bi-mortarboard"></i>
                </div>

                <h3>Formation produit</h3>

                <ul class="service-list">
                    <li><i class="bi bi-book-fill"></i> Initiation à l'utilisation de base</li>
                    <li><i class="bi bi-mortarboard-fill"></i> Approfondissement des fonctionnalités</li>
                    <li><i class="bi bi-people-fill"></i> Séances pratiques et mises en situation</li>
                </ul>

            </div>

        </div>

        {{-- Assistance --}}
        <div class="col-lg-6">

            <div class="service-card">

                <div class="service-icon">
                    <i class="bi bi-headset"></i>
                </div>

                <h3>Assistance technique</h3>

                <ul class="service-list">
                    <li><i class="bi bi-search"></i> Diagnostic et analyse</li>
                    <li><i class="bi bi-headset"></i> Assistance personnalisée</li>
                    <li><i class="bi bi-arrow-repeat"></i> Suivi et rétroaction</li>
                </ul>

            </div>

        </div>

        {{-- Stock --}}
        <div class="col-lg-6">

            <div class="service-card">

                <div class="service-icon">
                    <i class="bi bi-box-seam"></i>
                </div>

                <h3>Disponibilité de stock</h3>

                <ul class="service-list">
                    <li><i class="bi bi-box-seam-fill"></i> Achat et stockage préventif</li>
                    <li><i class="bi bi-boxes"></i> Gestion de stock réactive</li>
                    <li><i class="bi bi-truck"></i> Personnalisation de la livraison</li>
                </ul>

            </div>

        </div>

    </div>

    </div>

    </section>

    <section >

        <div class="container">

        <div class="text-center mb-5">

        <h2 class="section-title">

        Pourquoi choisir AQUALAB ?

        </h2>

        </div>

        <div class="row">

        <div class="col-md-4">

        <div class="feature-box">

        <i class="bi bi-award"></i>

        <h5>Expertise</h5>

        <p>
        Une équipe expérimentée à votre service.
        </p>

        </div>

        </div>

        <div class="col-md-4">

        <div class="feature-box">

        <i class="bi bi-shield-check"></i>

        <h5>Qualité</h5>

        <p>
        Des équipements fiables et conformes.
        </p>

        </div>

        </div>

        <div class="col-md-4">

        <div class="feature-box">

        <i class="bi bi-clock-history"></i>

        <h5>Réactivité</h5>

        <p>
        Intervention rapide et support personnalisé.
        </p>

        </div>

        </div>

        </div>

        </div>

        </section>

        <section class="service-cta">

            <div class="container">

            <h2>

            Besoin d'un accompagnement ?

            </h2>

            <p>

            Notre équipe est à votre disposition pour répondre
            à toutes vos questions.

            </p>

            <a href="/contact" class="btn-red">

            <i class="bi bi-envelope"></i>

            Contactez-nous

            </a>

            </div>

            </section>

@endsection