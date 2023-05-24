<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/">
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <title>Amado - Furniture Ecommerce Template | Cart</title>

    <link rel="icon" href="img/core-img/favicon.ico">

    <link rel="stylesheet" href="css/core-style.css">
    <link rel="stylesheet" href="style.css">
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
                        <form action="#" method="get">
                            <input type="search" name="search" id="search" placeholder="Type your keyword...">
                            <button type="submit"><img src="img/core-img/search.png" alt=""></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="main-content-wrapper d-flex clearfix">

        <div class="mobile-nav">

            <div class="amado-navbar-brand">
                <a href="index.html"><img src="img/core-img/logo.png" alt=""></a>
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
                <a href="index.html"><img src="img/core-img/logo.png" alt=""></a>
            </div>

            <nav class="amado-nav">
                <ul>
                    <li><a href="/">Home</a></li>
                    <li class="active"><a href="/tienda">Shop</a></li>
                </ul>
            </nav>

            <div class="amado-btn-group mt-30 mb-100">
                <a href="<?php echo isset($_SESSION['usuario'])?'/session/borrar':'/login'?>" class="btn amado-btn mb-15"><?php echo isset($_SESSION['usuario'])?'Logout':'Login'?></a>
            </div>

            <div class="cart-fav-search mb-100">
                <a href="/carrito" class="cart-nav"><img src="img/core-img/cart.png" alt=""> Cart <span>(0)</span></a>
                <a href="#" class="fav-nav"><img src="img/core-img/favorites.png" alt=""> Favourite</a>
                <a href="#" class="search-nav"><img src="img/core-img/search.png" alt=""> Search</a>
            </div>

            <div class="social-info d-flex justify-content-between">
                <a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
            </div>
        </header>

