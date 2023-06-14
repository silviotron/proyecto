<main id="main" class="main">

    <div class="pagetitle">
        <h1>Perfil</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active">Perfil</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
        <div class="row">
            <div class="col-xl-4">

                <div class="card">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                        <img src="assets/images/user/<?php echo $_SESSION['usuario']['id_usuario'] ?>.jpg" alt="Profile" class="rounded-circle">
                        <h2><?php echo $_SESSION['usuario']['nombre'] ?></h2>
                        <h3><?php echo $_SESSION['usuario']['nombre_rol'] ?></h3>
                        <!-- <div class="social-links mt-2">
                           <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                           <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                           <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                           <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                         </div>
                        -->
                    </div>
                </div>

            </div>

            <div class="col-xl-8">

                <div class="card">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered">

                            <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                            </li>



                        </ul>
                        <div class="tab-content pt-2">

                            <div class="tab-pane fade show active profile-overview" id="profile-overview">

                                <h5 class="card-title">Detalles del Perfil</h5>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Nombre</div>
                                    <div class="col-lg-9 col-md-8"><?php echo $_SESSION['usuario']['nombre'] ?></div>
                                </div>
                                <?php if ($_SESSION['usuario']['apellido'] != null) { ?>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Apellido</div>
                                        <div class="col-lg-9 col-md-8"><?php echo $_SESSION['usuario']['apellido'] ?></div>
                                    </div>
                                <?php } ?>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label"> Email</div>
                                    <div class="col-lg-9 col-md-8"><?php echo $_SESSION['usuario']['email'] ?></div>
                                </div>                               

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label"> Creacion</div>
                                    <div class="col-lg-9 col-md-8"><?php echo substr($_SESSION['usuario']['creacion'], 0, 10) ?></div>
                                </div>  
                                <?php if ($_SESSION['usuario']['id_rol'] != null) { ?>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Rol</div>
                                        <div class="col-lg-9 col-md-8"><?php echo $_SESSION['usuario']['nombre_rol'] ?></div>
                                    </div>
                                <?php } ?>

                            </div>


                        </div><!-- End Bordered Tabs -->

                    </div>
                </div>

            </div>
        </div>
    </section>

</main><!-- End #main -->