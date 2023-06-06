<main id="main" class="main">

    <div class="pagetitle">
        <h1>Usuarios</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item "><a href="/usuarios">Usuarios</a></li>
                <li class="breadcrumb-item active"><?php echo isset($breadcrumb[0]) ? $breadcrumb[0] : ''; ?></li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Usuario <?php echo isset($input['id']) ? ' -  ' . $input['id'] : ''; ?></h5>

                        <form class="row g-3" method="post" enctype="multipart/form-data">
                            <div class="col-md-7">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo isset($input['email']) ? $input['email'] : ''; ?>">
                                    <label for="email">Email</label>
                                </div>
                                <p class="text-danger"><?php echo isset($errores['email']) ? $errores['email'] : ''; ?></p>
                            </div>
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <input type="password" class="form-control" id="pass" name="pass" placeholder="Contraseña" value="<?php echo isset($input['pass']) ? $input['pass'] : ''; ?>">
                                    <label for="pass">Contraseña</label>
                                    <i style="position: absolute; top: 50%; right: 10px; transform: translateY(-50%);" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="mostrar contraseña" id="toggleIcon" onclick="togglePassword()" class="bi bi-eye"></i> 
                                </div>
                                <p class="text-danger"><?php echo isset($errores['pass']) ? $errores['pass'] : ''; ?></p>
                            </div>

                            <div class="col-md-2">
                                <div class="form-floating mb-3">
                                    <select class="form-select" id="rol" name="rol" aria-label="Rol">
                                        <?php foreach ($roles as $e) { ?>
                                            <option value="<?php echo $e['id_rol']; ?>" <?php echo isset($input['rol']) && $input['rol'] == $e['id_rol'] ? 'selected' : ''; ?>><?php echo $e['nombre_rol']; ?></option>
                                        <?php } ?>
                                    </select>
                                    <label for="rol">Rol</label>
                                </div>
                                <p class="text-danger"><?php echo isset($errores['rol']) ? $errores['rol'] : ''; ?></p>
                            </div>    
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" value="<?php echo isset($input['nombre']) ? $input['nombre'] : ''; ?>">
                                    <label for="nombre">Nombre</label>
                                </div>
                                <p class="text-danger"><?php echo isset($errores['nombre']) ? $errores['nombre'] : ''; ?></p>
                            </div>
                            <div class="col-md-5">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Apellido" value="<?php echo isset($input['apellido']) ? $input['apellido'] : ''; ?>">
                                    <label for="apellido">Apellido</label>
                                </div>
                                <p class="text-danger"><?php echo isset($errores['apellido']) ? $errores['apellido'] : ''; ?></p>
                            </div>
                            <div class="col-md-2">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Telefono" value="<?php echo isset($input['telefono']) ? $input['telefono'] : ''; ?>">
                                    <label for="telefono">Telefono</label>
                                </div>
                                <p class="text-danger"><?php echo isset($errores['telefono']) ? $errores['telefono'] : ''; ?></p>
                            </div>
                            <div class="col-md-2">
                                <div class="form-floating mb-3">
                                    <select class="form-select" id="estado" name="estado" aria-label="Estado">
                                        <?php foreach ($estados as $e) { ?>
                                            <option value="<?php echo $e['id_estado']; ?>" <?php echo isset($input['estado']) && $input['estado'] == $e['id_estado'] ? 'selected' : ''; ?>><?php echo $e['nombre_estado']; ?></option>
                                        <?php } ?>
                                    </select>
                                    <label for="estado">Estado</label>
                                </div>
                                <p class="text-danger"><?php echo isset($errores['estado']) ? $errores['estado'] : ''; ?></p>
                            </div>    

                            <div class="col-md-3" style="overflow: hidden">
                                <input type="file" id="imagen" name="imagen" accept="image/*" hidden>
                                <label   for="imagen" class="btn btn-primary btn-sm"><i class="bi bi-upload"></i></label>
                                <i  id="remove-button" class="btn btn-danger btn-sm bi bi-trash"></i>
                                <label for="imagen"><img style="max-width: 320px;height: 150px;object-fit: cover; margin-left: 5px" id="preview-image" src="<?php echo isset($input['imagen'])?$input['imagen']:'assets/images/user/default.jpg'; ?>" alt="Default Image"></label>
                                <p class="text-danger"><?php echo isset($errores['imagen']) ? $errores['imagen'] : ''; ?></p>
                            </div>  

                            <div class="col-md-9">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Dirección" name="direccion" id="direccion" style="height: 150px;" ><?php echo isset($input['direccion']) ? $input['direccion'] : ''; ?></textarea>
                                    <label for="direccion">Dirección</label>
                                </div>
                                <p class="text-danger"><?php echo isset($errores['direccion']) ? $errores['direccion'] : ''; ?></p>
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
    function togglePassword() {
        var passwordField = document.getElementById("pass");
        var toggleIcon = document.getElementById("toggleIcon");

        if (passwordField.type === "password") {
            passwordField.type = "text";
            toggleIcon.classList.remove("bi-eye");
            toggleIcon.classList.add("bi-eye-slash");
            toggleIcon.setAttribute("data-bs-original-title", "esconder contraseña");
            var tooltipDivs = document.querySelectorAll('div.tooltip-inner');
            for (var i = 0; i < tooltipDivs.length; i++) {
                tooltipDivs[i].textContent = 'esconder contraseña';
            }
        } else {
            passwordField.type = "password";
            toggleIcon.classList.remove("bi-eye-slash");
            toggleIcon.classList.add("bi-eye");
            toggleIcon.setAttribute("data-bs-original-title", "mostrar contraseña");
            var tooltipDivs = document.querySelectorAll('div.tooltip-inner');
            for (var i = 0; i < tooltipDivs.length; i++) {
                tooltipDivs[i].textContent = 'mostrar contraseña';
            }
        }
    }
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
        imagePreview.setAttribute("src", '<?php echo isset($input['imagen'])?$input['imagen']:'assets/images/user/default.jpg'; ?>');
        document.getElementById('imagen').value = "";
    });
</script>