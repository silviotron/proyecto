<main id="main" class="main">

    <div class="pagetitle">
        <h1>Categorias</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item "><a href="/categorias">Categorias</a></li>
                <li class="breadcrumb-item active"><?php echo isset($breadcrumb[0]) ? $breadcrumb[0] : ''; ?></li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Categoria <?php echo isset($input['id_categoria']) ? ' -  ' . $input['id_categoria'] : ''; ?></h5>

                        <form class="row g-3" method="post" enctype="multipart/form-data">

                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" value="<?php echo isset($input['nombre']) ? $input['nombre'] : ''; ?>">
                                    <label for="nombre">Nombre</label>
                                </div>
                                <p class="text-danger"><?php echo isset($errores['nombre']) ? $errores['nombre'] : ''; ?></p>
                            </div>
                           
                            <div class="text-center">
                                <button type="submit" value="Enviar" name="enviar" class="btn btn-primary">Enviar</button>
                                <button type="reset" class="btn btn-secondary">Reset</button>
                            </div>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </section>

</main>