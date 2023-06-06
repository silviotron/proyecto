<main id="main" class="main">

    <div class="pagetitle">
        <h1>Data Tables</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active">Usuarios</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <?php if (strpos($_SESSION['permisos']['usuarios'], 'w') !== false) { ?> 
                        <div class="m-0 font-weight-bold justify-content-end">
                            <a href="/usuarios/add/" class="btn btn-primary ml-1 float-right" style="margin: 10px"> Nuevo usuario <i class="bi bi-plus"></i></a>
                        </div>
                    <?php } ?>
                    <div class="card-body">
                        <h5 class="card-title">Usuarios</h5>
                        <table id="tabladatos" class="table table-striped">                    
                            <thead>
                                <tr>   
                                    <th scope="col">#</th>
                                    <th scope="col"></th>
                                    <th scope="col">Nombre</th>    
                                    <th scope="col">Apellido</th>
                                    <th scope="col">Email</th>                            
                                    <th scope="col">nombre_rol</th>
                                    <th scope="col">estado</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($usuarios as $usuario) { ?>                        
                                    <tr class="<?php echo $usuario['id_estado'] == 2 ? "table-danger" : "" ?>">
                                        <th scope="row"><?php echo $usuario['id_usuario'] ?></th>
                                        <td><img src="assets/images/user/<?php echo $usuario['id_usuario'] ?>.jpg" alt="sin imagen" style="height: 40px"></td>
                                        <td><?php echo $usuario['nombre'] ?></td>
                                        <td><?php echo $usuario['apellido'] ?></td>
                                        <td><?php echo $usuario['email'] ?></td>    
                                        <td><?php echo $usuario['nombre_rol'] ?></td>   
                                        <td><?php echo $usuario['nombre_estado'] ?></td>   
                                        <td>   
                                            <?php if (strpos($_SESSION['permisos']['usuarios'], 'w') !== false) { ?>                                     
                                                <a href="/usuarios/edit/<?php echo $usuario['id_usuario'] ?>" class="btn btn-success"><i class="bi bi-pencil-square"></i></a>
                                            <?php } if (strpos($_SESSION['permisos']['usuarios'], 'd') !== false) { ?>
                                                <a href="/usuarios/delete/<?php echo $usuario['id_usuario'] ?>" class="btn btn-danger"><i class="bi bi-trash3-fill"></i></a>
                                                <?php } ?>
                                        </td>

                                    </tr>
                                <?php } ?>

                            </tbody>  
                            <caption>
                                Total de registros: <?php echo count($usuarios); ?>
                            </caption>
                        </table>

                    </div>
                </div>

            </div>
        </div>
    </section>

</main>