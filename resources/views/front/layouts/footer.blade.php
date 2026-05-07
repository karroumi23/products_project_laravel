<footer class="main-footer">

    {{-- TOP FOOTER --}}
    <div class="footer-top">
        <div class="container">
            <div class="row g-5">

                {{-- Col 1 : Logo + desc + socials --}}
                <div class="col-lg-4 col-md-6">
                    <a href="/" class="footer-logo">
                        <img src="{{ asset('images/logo.png') }}" alt="Aqualab Technologie">
                    </a>
                    <p class="footer-desc">
                        Distribution et installation de matériels industriel,
                        scientifique et de laboratoire.
                    </p>
                    <div class="footer-socials">
                        <a href="#" class="social-btn" aria-label="LinkedIn">
                            <i class="bi bi-linkedin"></i>
                        </a>
                        <a href="#" class="social-btn" aria-label="YouTube">
                            <i class="bi bi-youtube"></i>
                        </a>
                        <a href="#" class="social-btn" aria-label="X / Twitter">
                            <i class="bi bi-twitter-x"></i>
                        </a>
                        <a href="#" class="social-btn" aria-label="Facebook">
                            <i class="bi bi-facebook"></i>
                        </a>
                    </div>
                </div>

                {{-- Col 2 : Navigation --}}
                <div class="col-lg-2 col-md-6 col-6">
                    <h4 class="footer-heading">Company</h4>
                    <ul class="footer-links">
                        <li><a href="/">Accueil</a></li>
                        <li><a href="/services">Services</a></li>
                        <li><a href="/products">Produits</a></li>
                        <li><a href="/apropos">À Propos</a></li>
                        <li><a href="/contact">Contact</a></li>
                    </ul>
                </div>

                {{-- Col 3 : Services rapides --}}
                <div class="col-lg-2 col-md-6 col-6">
                    <h4 class="footer-heading">Services</h4>
                    <ul class="footer-links">
                        <li><a href="#">Installation</a></li>
                        <li><a href="#">Formation</a></li>
                        <li><a href="#">Assistance</a></li>
                        <li><a href="#">Stock & Pièces</a></li>
                    </ul>
                </div>

                {{-- Col 4 : Contact --}}
                <div class="col-lg-4 col-md-6">
                    <h4 class="footer-heading">Contactez-Nous</h4>
                    <ul class="footer-contact-list">
                        <li>
                            <div class="contact-icon"><i class="bi bi-geo-alt-fill"></i></div>
                            <span>409, Ambassadeur ben aicha roche noir,<br>Casablanca — Maroc</span>
                        </li>
                        <li>
                            <div class="contact-icon"><i class="bi bi-telephone-fill"></i></div>
                            <a href="tel:+212522309650">05 22 30 96 50</a>
                        </li>
                        <li>
                            <div class="contact-icon"><i class="bi bi-envelope-fill"></i></div>
                            <a href="mailto:info@aqualab.ma">info@aqualab.ma</a>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </div>

    {{-- BOTTOM BAR --}}
    <div class="footer-bottom">
        <div class="container d-flex align-items-center justify-content-between flex-wrap gap-2">
            <span>© {{ date('Y') }} <strong>Aqualab Technologie</strong>. Tous droits réservés.</span>
            <span>Conçu & développé par <strong>Karroumi-A</strong></span>
        </div>
    </div>

</footer>