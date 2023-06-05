
<div class="shop_sidebar_area">

    <div class="widget catagory mb-50">

        <h6 class="widget-title mb-30">Catagories</h6>

        <div class="catagories-menu">
            <ul>
                <li class="active"><a href="#">Todo</a></li>
                <li ><a href="#">Categoría 1</a></li>
                <li><a href="#">Categoría 2</a></li>
                <li><a href="#">Categoría 3</a></li>
                <li><a href="#">Categoría 4</a></li>
                <li><a href="#">Categoría 5</a></li>
                <li><a href="#">Categoría 6</a></li>
                <li><a href="#">Categoría 7</a></li>
            </ul>
        </div>
    </div>

    <div class="widget brands mb-50">

        <h6 class="widget-title mb-30">Brands</h6>
        <div class="widget-desc">

            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="marca1">
                <label class="form-check-label" for="marca1">Marca 1</label>
            </div>

            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="marca2">
                <label class="form-check-label" for="marca2">Marca 2</label>
            </div>

            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="marca3">
                <label class="form-check-label" for="marca3">Marca 3</label>
            </div>

            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="marca4">
                <label class="form-check-label" for="marca4">Marca 4</label>
            </div>

            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="marca5">
                <label class="form-check-label" for="marca5">Marca 5</label>
            </div>
        </div>
    </div>

    <div class="widget color mb-50">

        <h6 class="widget-title mb-30">Color</h6>
        <div class="widget-desc">
            <ul class="d-flex">
                <li><a href="#" class="color1"></a></li>
                <li><a href="#" class="color2"></a></li>
                <li><a href="#" class="color3"></a></li>
                <li><a href="#" class="color4"></a></li>
                <li><a href="#" class="color5"></a></li>
                <li><a href="#" class="color6"></a></li>
                <li><a href="#" class="color7"></a></li>
                <li><a href="#" class="color8"></a></li>
            </ul>
        </div>
    </div>

    <div class="widget price mb-50">

        <h6 class="widget-title mb-30">Price</h6>
        <div class="widget-desc">
            <div class="slider-range">
                <div data-min="10" data-max="1000" data-unit="$"
                     class="slider-range-price ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all"
                     data-value-min="10" data-value-max="1000" data-label-result="">
                    <div class="ui-slider-range ui-widget-header ui-corner-all"></div>
                    <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
                    <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
                </div>
                <div class="range-price">$10 - $1000</div>
            </div>
        </div>
    </div>
</div>
<div class="amado_product_area section-padding-100">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="product-topbar d-xl-flex align-items-end justify-content-between">

                    <div class="total-products">
                        <p>Showing 1-8 0f 25</p>
                        <div class="view d-flex">
                            <a href="#"><i class="fa fa-th-large" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-bars" aria-hidden="true"></i></a>
                        </div>
                    </div>

                    <div class="product-sorting d-flex">
                        <div class="sort-by-date d-flex align-items-center mr-15">
                            <p>Sort by</p>
                            <form action="#" method="get">
                                <select name="select" id="sortBydate">
                                    <option value="value">Date</option>
                                    <option value="value">Newest</option>
                                    <option value="value">Popular</option>
                                </select>
                            </form>
                        </div>
                        <div class="view-product d-flex align-items-center">
                            <p>View</p>
                            <form action="#" method="get">
                                <select name="select" id="viewProduct">
                                    <option value="value">12</option>
                                    <option value="value">24</option>
                                    <option value="value">48</option>
                                    <option value="value">96</option>
                                </select>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <?php
            //var_dump($productos);
            foreach ($productos as $producto) {
                ?>
                <div class="col-12 col-sm-6 col-md-12 col-xl-6">
                    <div class="single-product-wrapper">
                        <a href="tienda/producto/<?php echo $producto['id'] ?>">
                            <div class="product-img">
                                <img src="assets/images/product/<?php echo $producto['id'] ?>.jpg" alt="sin imagen">
                            </div>
                        </a>
                        <div class="product-description d-flex align-items-center justify-content-between">

                            <div class="product-meta-data">
                                <div class="line"></div>
                                <p class="product-price"><?php echo $producto['precio'] . ' € ' . $producto['formato'] ?></p>
                                <a href="tienda/producto/<?php echo $producto['id'] ?>">
                                    <h6><?php echo $producto['nombre'] ?></h6>
                                </a>
                            </div>

                            <div class="ratings-cart text-right">
                                <div class="ratings">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                </div>
                                <div class="cart">
                                    <a href="/carrito/add/<?php echo $producto['id'] ?>" data-toggle="tooltip" data-placement="left" title="Add to Cart"><img src="img/core-img/cart.png" alt="cart"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
<?php } ?>


        </div>
        <div class="row">
            <div class="col-12">

                <nav aria-label="navigation">
                    <ul class="pagination justify-content-end mt-50">
                        <li class="page-item active"><a class="page-link" href="#">01.</a></li>
                        <li class="page-item"><a class="page-link" href="#">02.</a></li>
                        <li class="page-item"><a class="page-link" href="#">03.</a></li>
                        <li class="page-item"><a class="page-link" href="#">04.</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
</div>

