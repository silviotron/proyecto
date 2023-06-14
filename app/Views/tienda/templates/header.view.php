<!DOCTYPE html>
<html lang="en">

    <head>
        <base href="/">
        <meta charset="UTF-8">
        <meta name="description" content="">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


        <title>Calceta - <?php echo $titulo ?></title>

        <link href="assets/img/favicon.png" rel="icon">

        <link rel="stylesheet" href="css/core-style.css">
        <link rel="stylesheet" href="style.css">
        
        <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    </head>

    <body>

        <div class="search-wrapper section-padding-100">
            <div class="search-close">
                <i class="fa fa-close" aria-hidden="true"></i>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="search-content">
                            <form action="/tienda" method="post">
                                <input type="search" name="search" id="search" placeholder="Buscar...">
                                <button type="submit"><i class="bi bi-search"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="main-content-wrapper d-flex clearfix">

            <div class="mobile-nav">

                <div class="amado-navbar-brand">
                    <a href="/"><img src="assets/img/logo.png" alt="logo"></a>
                </div>

                <div class="amado-navbar-toggler">
                    <span></span><span></span><span></span>
                </div>
            </div>

            <header class="header-area clearfix">

                <div class="nav-close">
                    <i class="fa fa-close" aria-hidden="true"></i>
                </div>

                <div class="logo">
                    <a href="/"><img src="assets/img/logo.png" alt="logo"></a>
                </div>

                <nav class="amado-nav">
                    <ul>
                        <li class="<?php echo isset($seccion) && $seccion === '/' ? 'active' : ''; ?>" ><a href="/">Home</a></li>
                        <li class="<?php echo isset($seccion) && $seccion === '/tienda' ? 'active' : ''; ?>"><a href="/tienda">Shop</a></li>
                    </ul>
                </nav>

                <div class="amado-btn-group mt-30 mb-50">
                    <a href="<?php echo isset($_SESSION['usuario']) ? '/session/borrar' : '/login' ?>" class="btn amado-btn mb-15"><?php echo isset($_SESSION['usuario']) ? 'Logout' : 'Login' ?></a>
                </div>

                <div class="cart-fav-search mb-100">
                    <a href="/carrito" class="cart-nav"><i class="bi bi-cart"></i> Cart <span>(<?php echo isset($_SESSION['carrito']) ? count($_SESSION['carrito']) : '0' ?>)</span></a>
                    <a href="#" class="search-nav"><i class="bi bi-search"></i> Search</a>
                </div>

                <div class="social-info d-flex justify-content-between">
                    <a href="https://goo.gl/maps/SW1pJExJcGcTDVrU8" target="_blank"><i class="bi bi-geo-alt"  aria-hidden="true"></i></a>
                    <a href="https://www.instagram.com/planetacalceta/" target="_blank"><i class="bi bi-instagram"  aria-hidden="true"></i></a>
                    <a href="https://www.facebook.com/people/calceta/100041290436579/" target="_blank"><i class="bi bi-facebook"  aria-hidden="true"></i></a>
                    <a href="https://www.paxinasgalegas.es/calceta-467645em.html" target="_blank"><i class="bi bi-info-circle"  aria-hidden="true"></i></a>
                </div>
            </header>

