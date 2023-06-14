<!DOCTYPE html>
<html lang="en">

    <head>
        <base href="/">
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">

        <title>Calceta - Login</title>
        <meta content="" name="description">
        <meta content="" name="keywords">

        <!-- Favicons -->
        <link href="assets/img/favicon.png" rel="icon">
        <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

        <!-- Google Fonts -->
        <link href="https://fonts.gstatic.com" rel="preconnect">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

        <!-- Vendor CSS Files -->
        <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
        <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
        <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
        <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
        <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
        <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

        <!-- Template Main CSS File -->
        <link href="assets/css/style.css" rel="stylesheet">

        <!-- =======================================================
        * Template Name: NiceAdmin
        * Updated: Mar 09 2023 with Bootstrap v5.2.3
        * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
        * Author: BootstrapMade.com
        * License: https://bootstrapmade.com/license/
        ======================================================== -->
    </head>

    <body>

        <main>
            <div class="container">

                <section class="section">
                    <div class="row">
                        <div class="d-flex justify-content-center py-4" >
                            <a href="/" class="logo d-flex align-items-center w-auto">
                                <img  src="assets/img/logo.png" alt="Calceta">
                            </a>
                        </div>
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="pt-4 pb-2">
                                        <h5 class="card-title text-center pb-0 fs-4">Registrate</h5>
                                        <p class="text-center small">Introduce email y contraseña para Registrarte</p>
                                    </div>
                                    <form class="row g-3" method="post" enctype="multipart/form-data">
                                        <div class="col-md-6">
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
                                            </div>
                                            <p class="text-danger"><?php echo isset($errores['pass']) ? $errores['pass'] : ''; ?></p>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-floating">
                                                <input type="password" class="form-control" id="pass2" name="pass2" placeholder="Repite la contraseña" value="<?php echo isset($input['pass2']) ? $input['pass2'] : ''; ?>">
                                                <label for="pass2">Repite la contraseña</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" value="<?php echo isset($input['nombre']) ? $input['nombre'] : ''; ?>">
                                                <label for="nombre">Nombre</label>
                                            </div>
                                            <p class="text-danger"><?php echo isset($errores['nombre']) ? $errores['nombre'] : ''; ?></p>
                                        </div>
                                        <div class="col-md-6">
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


                                        <div class="col-md-3" style="overflow: hidden">
                                            <input type="file" id="imagen" name="imagen" accept="image/*" hidden>
                                            <label   for="imagen" class="btn btn-primary btn-sm"><i class="bi bi-upload"></i></label>
                                            <i  id="remove-button" class="btn btn-danger btn-sm bi bi-trash"></i>
                                            <label for="imagen"><img style="max-width: 320px;height: 150px;object-fit: cover; margin-left: 5px" id="preview-image" src="<?php echo isset($input['imagen']) ? $input['imagen'] : 'assets/images/user/default.jpg'; ?>" alt="Default Image"></label>
                                            <p class="text-danger"><?php echo isset($errores['imagen']) ? $errores['imagen'] : ''; ?></p>
                                        </div>  

                                        <div class="col-md-9">
                                            <div class="form-floating">
                                                <textarea class="form-control" placeholder="Dirección" name="direccion" id="direccion" style="height: 150px;resize: none;" ><?php echo isset($input['direccion']) ? $input['direccion'] : ''; ?></textarea>
                                                <label for="direccion">Dirección</label>
                                            </div>
                                            <p class="text-danger"><?php echo isset($errores['direccion']) ? $errores['direccion'] : ''; ?></p>
                                        </div>

                                        <div class="text-center">
                                            <div style="float: left; position: absolute">
                                                <p class="small mb-0">¿Ya tienes Cuenta? <a href="/login">Inicia sesión</a></p>
                                            </div>
                                            <button type="submit" value="Enviar" name="enviar" class="btn btn-primary">Registrarse</button>
                                            <button type="reset" class="btn btn-secondary">Reset</button>
                                        </div>

                                    </form>

                                </div>
                            </div>

                        </div>
                    </div>
                </section>

            </div>
        </main><!-- End #main -->
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
                imagePreview.setAttribute("src", '<?php echo isset($input['imagen']) ? $input['imagen'] : 'assets/images/user/default.jpg'; ?>');
                document.getElementById('imagen').value = "";
            });
        </script>

        <!-- Vendor JS Files -->
        <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
        <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/vendor/chart.js/chart.umd.js"></script>
        <script src="assets/vendor/echarts/echarts.min.js"></script>
        <script src="assets/vendor/quill/quill.min.js"></script>
        <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
        <script src="assets/vendor/tinymce/tinymce.min.js"></script>
        <script src="assets/vendor/php-email-form/validate.js"></script>

        <!-- Template Main JS File -->
        <script src="assets/js/main.js"></script>

    </body>

</html>
