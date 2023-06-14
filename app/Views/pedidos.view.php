<main id="main" class="main">

    <div class="pagetitle">
        <h1>Pedidos</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active">Pedidos</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Historial pedidos</h5>
                        <table id="tabladatos" class="table table-striped">                    
                            <thead>
                                <tr>   
                                    <th scope="col">#</th>
                                    <th scope="col">Usuario</th>
                                    <th scope="col">Id usuario</th>
                                    <th scope="col">Fecha</th>   
                                    <th scope="col">Direccion</th>
                                    <th scope="col">Estado</th>
                                    <th scope="col">Total</th>                            
                                    <th scope="col">Cantidad</th>
                                    <th scope="col">Articulos</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($pedidos as $pedido) { ?>                        
                                    <tr >
                                        <td><?php echo $pedido['id_pedido'] ?></td>
                                        <td><?php echo $pedido['email'] ?></td>
                                        <td><?php echo $pedido['id_usuario'] ?></td>
                                        <td><?php echo $pedido['fecha'] ?></td>
                                        <td><?php echo $pedido['direccion'] ?></td>
                                        <td><?php echo $pedido['nombre_estado'] ?></td>
                                        <td><?php echo $pedido['total'] ?></td>
                                        <td><?php echo $pedido['cantidad'] ?></td>
                                        <td><?php echo $pedido['articulos'] ?></td>
                                    </tr>
                                <?php } ?>

                            </tbody>  
                            <caption>
                                Total de registros: <?php echo count($pedidos); ?>
                            </caption>
                        </table>

                    </div>
                </div>

            </div>
        </div>
    </section>

</main>