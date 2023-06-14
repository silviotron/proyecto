<div class="products-catagories-area clearfix">
    <div class="amado-pro-catagory clearfix">
        <?php
        foreach ($categorias as $categoria) { ?>
            <div class="single-products-catagory clearfix">
                <a href="/tienda/categoria/<?php echo $categoria['categoria']['id_categoria'] ?>">
                    <img src="assets/images/product/<?php echo $categoria['producto']['id'] ?>.jpg">

                    <div class="hover-content">
                        <div class="line"></div>
                        <p><?php echo 'Desde ' . $categoria['producto']['id'] . ' €' ?></p>
                        <h4><?php echo $categoria['categoria']['nombre_categoria'] ?></h4>
                    </div>
                </a>
            </div>
        <?php } ?>

    </div>
</div>

</div>

</div>