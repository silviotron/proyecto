<main id="main" class="main">

    <div class="pagetitle">
        <h1>Data Tables</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active">Productos</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Productos</h5>
                        <table id="tabladatos" class="table table-striped">                    
                            <thead>
                                <tr>   
                                    <th scope="col">#</th>
                                    <th scope="col">Nombre</th>   
                                    <th scope="col"></th>
                                    <th scope="col">Precio</th>
                                    <th scope="col">Formato</th>
                                    <th scope="col">Stock</th>                            
                                    <th scope="col">Categoria</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($productos as $producto) { ?>                        
                                    <tr >
                                        <th scope="row"><?php echo $producto['id'] ?></th>
                                        <td><?php echo $producto['nombre'] ?></td>
                                        <td><img src="assets/images/product/<?php echo $producto['id'] ?>.jpg" alt="Picture" style="height: 40px"></td>
                                        <td><?php echo $producto['descuento']==null?$producto['precio']:$producto['precio']." -".$producto['descuento']."%" ?></td>
                                        <td><?php echo $producto['formato'] ?></td> 
                                        <td><?php echo $producto['stock'] ?></td>    
                                        <td><?php echo $producto['nombre_categoria'] ?></td>   
                                        <td>   
                                            <?php if (strpos($_SESSION['permisos']['productos'], 'w') !== false) { ?>                                     
                                                <a href="/productos/edit/<?php echo $producto['id'] ?>" class="btn btn-success"><i class="bi bi-pencil-square"></i></a>
                                            <?php } if (strpos($_SESSION['permisos']['productos'], 'd') !== false) { ?>
                                                <a href="/productos/delete/<?php echo $producto['id'] ?>" class="btn btn-danger"><i class="bi bi-trash3-fill"></i></a>
                                                <?php } ?>
                                        </td>

                                    </tr>
                                <?php } ?>

                            </tbody>  
                            <caption>
                                Total de registros: <?php echo count($productos); ?>
                            </caption>
                        </table>

                    </div>
                </div>

            </div>
        </div>
    </section>

</main>