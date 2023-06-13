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
                                        <span><?php echo $v['producto']['precio'] . ' €'; ?></span>
                                    </td>
                                    <td class="qty">
                                        <span style="margin-right: 5px;"><a style="color: #277270" href="/carrito/restar/<?php echo $v['producto']['id']; ?>">-</a></span>
                                        <span><?php echo $v['cantidad']; ?></span>
                                        <span style="margin-left: 5px;"><a style="color: #277270" href="/carrito/sumar/<?php echo $v['producto']['id']; ?>">+</a></span>
                                        <span style="right: 4vw; position: absolute"><a style="color: #277270" href="/carrito/remove/<?php echo $v['producto']['id']; ?>">X</a></span>
                                    </td>                                    
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-12 col-lg-4">
                <div class="cart-summary">
                    <form action="/carrito/comprar" method="post">
                    <h5>Coste</h5>
                    <ul class="summary-table">
                        <li><span>Subtotal:</span> <span><?php echo $subTotal . ' €'; ?></span></li>
                        <li><span>Envio:</span> <span><?php echo $envio; ?></span></li>
                        <li><span>Total:</span> <span><?php echo $total . ' €'; ?></span></li>
                        <li style="margin-bottom: 0px"><label for="direccion"><span>Direccion: </span></label> </li>
                        <textarea style="resize: none; width: 100%; height: 100px"  type="text" id="direccion" name="direccion"> </textarea>
                    </ul>
                    <div class="cart-btn mt-50">
                        <button type="submit" value="Comprar" name="comprar" class="btn amado-btn w-100">Comprar</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

