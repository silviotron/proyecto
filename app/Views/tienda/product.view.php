        <div class="single-product-area section-padding-100 clearfix">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mt-50">
                                <li class="breadcrumb-item"><a href="">Home</a></li>
                                <li class="breadcrumb-item"><a href="tienda">Tienda</a></li>
                                <?php if ($producto['id_categoria']!=null) {?>
                                    <li class="breadcrumb-item"><a href="tienda/<?php echo $producto['nombre_categoria'] ?>"><?php echo $producto['nombre_categoria'] ?></a></li>
                                <?php } ?>
                                <li class="breadcrumb-item active" aria-current="page"><?php echo $producto['nombre'] ?></li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-lg-7">
                        <div class="single_product_thumb">
                            <img class="d-block w-100" src="assets/images/product/<?php echo $producto['id'] ?>.jpg" alt="Foto">
                        </div>
                    </div>
                    <div class="col-12 col-lg-5">
                        <div class="single_product_desc">

                            <div class="product-meta-data">
                                <div class="line"></div>
                                <p class="product-price"><?php echo $producto['precio']." € ".$producto['formato'] ?></p>
                                <a href="product-details.html">
                                    <h6><?php echo $producto['nombre'] ?></h6>
                                </a>

                                <div class="ratings-review mb-15 d-flex align-items-center justify-content-between">
                                    <div class="ratings" style="visibility: hidden">
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                    </div>
                                    <div class="review">
                                        <a href="review/<?php echo $producto['id'] ?>">Write A Review</a>
                                    </div>
                                </div>

                                <p class="avaibility"><i class="fa fa-circle" style="<?php echo $producto['stock']==0?'color: red':'' ?>"></i><?php echo $producto['stock']==0?' No disponible':' Disponible' ?> </p>
                            </div>
                            <div class="short_overview my-5">
                                <p><?php echo $producto['descripcion'] ?></p>
                            </div>

                            <form class="cart clearfix" method="post">
                                <div class="cart-btn d-flex mb-50">
                                    <p>Qty</p>
                                    <div class="quantity">
                                        <span class="qty-minus"
                                            onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 1 ) effect.value--;return false;"><i
                                                class="fa fa-caret-down" aria-hidden="true"></i></span>
                                        <input type="number" class="qty-text" id="qty" step="1" min="1" max="300"
                                            name="quantity" value="1">
                                        <span class="qty-plus"
                                            onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty )) effect.value++;return false;"><i
                                                class="fa fa-caret-up" aria-hidden="true"></i></span>
                                    </div>
                                </div>
                                <a href="/carrito/add/<?php echo $producto['id'] ?>"  class="btn amado-btn">Add to cart</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>



