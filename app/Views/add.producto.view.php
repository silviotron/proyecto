<main id="main" class="main">

    <div class="pagetitle">
        <h1>Productos</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item "><a href="/productos">Productos</a></li>
                <li class="breadcrumb-item active"><?php echo isset($breadcrumb[0]) ? $breadcrumb[0] : ''; ?></li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Producto <?php echo isset($input['id']) ? ' -  ' . $input['id'] : ''; ?></h5>

                        <form class="row g-3" method="post" enctype="multipart/form-data">

                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" value="<?php echo isset($input['nombre']) ? $input['nombre'] : ''; ?>">
                                    <label for="nombre">Nombre</label>
                                </div>
                                <p class="text-danger"><?php echo isset($errores['nombre']) ? $errores['nombre'] : ''; ?></p>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <select class="form-select" id="marca" name="marca" aria-label="Marca">
                                        <?php foreach ($marcas as $e) { ?>
                                            <option value="<?php echo $e['id_marca']; ?>" <?php echo isset($input['id_marca']) && $input['id_marca'] == $e['id_marca'] ? 'selected' : ''; ?>><?php echo $e['nombre_marca']; ?></option>
                                        <?php } ?>
                                    </select>
                                    <label for="marca">Marca</label>
                                </div>
                                <p class="text-danger"><?php echo isset($errores['marca']) ? $errores['marca'] : ''; ?></p>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <select class="form-select" id="categoria" name="categoria" aria-label="Categoria">
                                        <?php foreach ($categorias as $e) { ?>
                                            <option value="<?php echo $e['id_categoria']; ?>" <?php echo isset($input['id_categoria']) && $input['id_categoria'] == $e['id_categoria'] ? 'selected' : ''; ?>><?php echo $e['nombre_categoria']; ?></option>
                                        <?php } ?>
                                    </select>
                                    <label for="categoria">Categoria</label>
                                </div>
                                <p class="text-danger"><?php echo isset($errores['categoria']) ? $errores['categoria'] : ''; ?></p>
                            </div>

                            <div class="col-md-2">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="peso" name="peso" placeholder="Peso" value="<?php echo isset($input['peso']) ? $input['peso'] : ''; ?>">
                                    <label for="peso">Peso</label>
                                </div>
                                <p class="text-danger"><?php echo isset($errores['peso']) ? $errores['peso'] : ''; ?></p>
                            </div>

                            <div class="col-md-2">
                                <div class="form-floating mb-3">
                                    <select class="form-select" id="tipo" name="tipo" aria-label="Tipo">
                                        <?php foreach ($precios as $e) { ?>
                                            <option value="<?php echo $e['id']; ?>" <?php echo isset($input['id_tipo_precio']) && $input['id_tipo_precio'] == $e['id'] ? 'selected' : ''; ?>><?php echo $e['formato']; ?></option>
                                        <?php } ?>
                                    </select>
                                    <label for="tipo">Tipo</label>
                                </div>
                                <p class="text-danger"><?php echo isset($errores['tipo']) ? $errores['tipo'] : ''; ?></p>
                            </div>

                            <div class="col-md-2">
                                <div class="form-floating">
                                    <input type="number" class="form-control" id="stock" name="stock" placeholder="Stock" value="<?php echo isset($input['stock']) ? $input['stock'] : ''; ?>">
                                    <label for="stock">Stock</label>
                                </div>
                                <p class="text-danger"><?php echo isset($errores['stock']) ? $errores['stock'] : ''; ?></p>
                            </div>                                                 

                            <div class="col-md-4" style="overflow: hidden">
                                <input type="file" id="imagen" name="imagen" accept="image/*" hidden>
                                <label   for="imagen" class="btn btn-primary btn-sm"><i class="bi bi-upload"></i></label>
                                <i  id="remove-button" class="btn btn-danger btn-sm bi bi-trash"></i>
                                <label for="imagen"><img style="max-width: 450px;height: 300px;object-fit: cover; margin-left: 5px" id="preview-image" src="<?php echo isset($input['imagen'])?$input['imagen']:'assets/images/product/default.jpg'; ?>" alt="Default Image"></label>
                                <p class="text-danger"><?php echo isset($errores['imagen']) ? $errores['imagen'] : ''; ?></p>
                            </div>  

                            <div class="col-md-6">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Descripcion" name="descripcion" id="descripcion" style="height: 300px;" ><?php echo isset($input['descripcion']) ? $input['descripcion'] : ''; ?></textarea>
                                    <label for="descripcion">Descripción</label>
                                </div>
                                <p class="text-danger"><?php echo isset($errores['descripcion']) ? $errores['descripcion'] : ''; ?></p>
                            </div>
                            
                            <div class="col-md-2">
                                <div class="row">
                                    <label for="descuento">Descuento</label>
                                    <div class="input-group col-md-2 mb-3">
                                        <input style="text-align: right" type="text" class="form-control" id="descuento" name="descuento" aria-label="descuento" value="<?php echo isset($input['descuento']) ? $input['descuento'] : ''; ?>">
                                        <span class="input-group-text">%</span>
                                    </div>
                                    <p class="text-danger"><?php echo isset($errores['descuento']) ? $errores['descuento'] : ''; ?></p>
                                </div>
                                <label for="precio">Precio</label>
                                <div class="input-group col-md-2 mb-3">
                                    <input style="text-align: right" type="text" class="form-control" id="precio" name="precio" aria-label="precio" value="<?php echo isset($input['precio']) ? $input['precio'] : ''; ?>">
                                    <span class="input-group-text">€</span>
                                </div>
                                <p class="text-danger"><?php echo isset($errores['precio']) ? $errores['precio'] : ''; ?></p>
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
<script>
    document.getElementById('imagen').addEventListener('change', function () {
        var file = this.files[0];
        var reader = new FileReader();

        reader.onload = function (e) {
            var imagePreview = document.getElementById('preview-image');
            imagePreview.src = e.target.result;
        };

        reader.readAsDataURL(file);
    });

    document.getElementById('remove-button').addEventListener('click', function () {
        var imagePreview = document.getElementById('preview-image');
        imagePreview.setAttribute("src", "<?php echo isset($input['imagen'])?$input['imagen']:'assets/images/product/default.jpg'; ?>");
        document.getElementById('imagen').value = "";
    });
</script>