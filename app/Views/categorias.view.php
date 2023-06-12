<main id="main" class="main">

    <div class="pagetitle">
        <h1>Data Tables</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active">Categorias</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <?php if (strpos($_SESSION['permisos']['categorias'], 'w') !== false) { ?>  
                        <div class="m-0 font-weight-bold justify-content-end">
                            <a href="/categorias/add/" class="btn btn-primary ml-1 float-right" style="margin: 10px"> Nueva categoria <i class="bi bi-plus"></i></a>
                        </div>
                    <?php } ?>
                    <div class="card-body">
                        <h5 class="card-title">Categorias</h5>
                        <table id="tabladatos" class="table table-striped">                    
                            <thead>
                                <tr>   
                                    <th scope="col">#</th>
                                    <th scope="col">Nombre</th>  
                                    <th scope="col"></th>


                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($categorias as $categoria) { ?>                        
                                    <tr >
                                        <th scope="row"><?php echo $categoria['id_categoria'] ?></th>
                                        <td><?php echo $categoria['nombre_categoria'] ?></td>
                                        <td>   
                                            <?php if (strpos($_SESSION['permisos']['categorias'], 'w') !== false) { ?>                                     
                                                <a href="/categorias/edit/<?php echo $categoria['id_categoria'] ?>" class="btn btn-success"><i class="bi bi-pencil-square"></i></a>
                                            <?php } if (strpos($_SESSION['permisos']['categorias'], 'd') !== false) { ?>
                                                <a href="/categorias/delete/<?php echo $categoria['id_categoria'] ?>" class="btn btn-danger"><i class="bi bi-trash3-fill"></i></a>
                                                <?php } ?>
                                        </td>
                                    </tr>
                                <?php } ?>

                            </tbody>  
                            <caption>
                                Total de registros: <?php echo count($categorias); ?>
                            </caption>
                        </table>

                    </div>
                </div>

            </div>
        </div>
    </section>

</main>