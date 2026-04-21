<!DOCTYPE html>
<html>
<head>
    <title>My Shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">

        <a class="navbar-brand" href="/">LOGO</a>

        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto">

                <li class="nav-item">
                    <a class="nav-link" href="/">Accueil</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/products">Produits</a>
                </li>

                <li class="nav-item">
                                    <a class="nav-link" href="/services">Services</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/apropos">À Propos</a>
                </li>



            </ul>
        </div>

    </div>
</nav>

<!-- CONTENT -->
<div class="container mt-4">
    @yield('content')
</div>

</body>
</html>