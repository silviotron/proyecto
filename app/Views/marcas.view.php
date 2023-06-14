<main id="main" class="main">

    <div class="pagetitle">
        <h1>Marcas</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active">Marcas</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <?php if (strpos($_SESSION['permisos']['marcas'], 'w') !== false) { ?>  
                        <div class="m-0 font-weight-bold justify-content-end">
                            <a href="/marcas/add/" class="btn btn-primary ml-1 float-right" style="margin: 10px"> Nueva marca <i class="bi bi-plus"></i></a>
                        </div>
                    <?php } ?>
                    <div class="card-body">
                        <table id="tabladatos" class="table table-striped">                    
                            <thead>
                                <tr>   
                                    <th scope="col">#</th>
                                    <th scope="col">Nombre</th>  
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($marcas as $marca) { ?>                        
                                    <tr >
                                        <th scope="row"><?php echo $marca['id_marca'] ?></th>
                                        <td><?php echo $marca['nombre_marca'] ?></td>
                                        <td>   
                                            <?php if (strpos($_SESSION['permisos']['marcas'], 'w') !== false) { ?>                                     
                                                <a href="/marcas/edit/<?php echo $marca['id_marca'] ?>" class="btn btn-success"><i class="bi bi-pencil-square"></i></a>
                                            <?php } if (strpos($_SESSION['permisos']['marcas'], 'd') !== false) { ?>
                                                <a href="/marcas/delete/<?php echo $marca['id_marca'] ?>" class="btn btn-danger"><i class="bi bi-trash3-fill"></i></a>
                                                <?php } ?>
                                        </td>
                                    </tr>
                                <?php } ?>

                            </tbody>  
                            <caption>
                                Total de registros: <?php echo count($marcas); ?>
                            </caption>
                        </table>

                    </div>
                </div>

            </div>
        </div>
    </section>

</main>