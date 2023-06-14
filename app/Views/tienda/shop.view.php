<div class="shop_sidebar_area">

    <div class="widget catagory mb-50">

        <h6 class="widget-title mb-30">Catagories</h6>

        <div class="catagories-menu">
            <ul>
                <li class="<?php echo -1==$categoriaSeleccionada?'active':'' ?>"><a href="/tienda">Todo</a></li>
                <?php foreach ($categorias as $categoria) { ?>
                <li class="<?php echo $categoria['id_categoria']==$categoriaSeleccionada?'active':'' ?>"><a href="/tienda/categoria/<?php echo $categoria['id_categoria'] ?>"><?php echo $categoria['nombre_categoria'] ?></a></li>
                <?php } ?>
            </ul>
        </div>
    </div>
</div>

<div class="amado_product_area section-padding-100">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
            </div>
        </div>
        <div class="row">
            <?php foreach ($productos as $producto) { ?>
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
                                <div class="ratings" style="visibility: hidden;">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                </div>
                                <div class="cart">
                                    <a href="/carrito/add/<?php echo $producto['id'] ?>" data-toggle="tooltip" data-placement="left" title="Add to Cart"><i style="font-size: 20px" class="bi bi-cart"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>


        </div>
        
    </div>
</div>
</div>