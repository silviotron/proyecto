<div class="cart-table-area section-padding-100">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-lg-8">
                <div class="cart-title mt-50">
                    <h2>Carrito</h2>
                </div>
                <div class="cart-table clearfix">
                    <table class="table table-responsive">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Nombre</th>
                                <th>Precio</th>
                                <th>Cantidad</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($_SESSION['carrito'] as $v) { ?>
                                
                            
                            
                            <tr>
                                <td class="cart_product_img">
                                    <a href="/tienda/producto/<?php echo $v['producto']['id']; ?>"><img src="assets/images/product/<?php echo $v['producto']['id']; ?>.jpg"  alt="Product"></a>
                                </td>
                                <td class="cart_product_desc">
                                    <h5><?php echo $v['producto']['nombre']; ?></h5>
                                </td>
                                <td class="price">
                                    <span><?php echo $v['producto']['precio'].' €'; ?></span>
                                </td>
                                <td class="qty">
                                    <span><?php echo $v['cantidad']; ?></span>
                                </td>
                            </tr>
                            <?php } ?>
                            
                            
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-12 col-lg-4">
                <div class="cart-summary">
                    <h5>Cart Total</h5>
                    <ul class="summary-table">
                        <li><span>subtotal:</span> <span><?php echo $total.' €'; ?></span></li>
                        <li><span>delivery:</span> <span>Free</span></li>
                        <li><span>total:</span> <span>$140.00</span></li>
                    </ul>
                    <div class="cart-btn mt-100">
                        <a href="cart.html" class="btn amado-btn w-100">Checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

