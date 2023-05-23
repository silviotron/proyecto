<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
            <a class="nav-link <?php echo isset($seccion) && $seccion === '/' ? '' : 'collapsed'; ?>" href="/">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->
        <?php if (strpos($_SESSION['permisos']['usuarios'], 'r') !== false) { ?>
        <li class="nav-item">
            <a class="nav-link <?php echo isset($seccion) && $seccion === '/usuarios' ? '' : 'collapsed'; ?>" href="/usuarios">
                <i class="bi bi-people"></i>
                <span>Usuarios</span>
            </a>
        </li><!-- End Usuarios Page Nav -->
        <?php } if (strpos($_SESSION['permisos']['productos'], 'r') !== false) { ?>
        <li class="nav-item">
            <a class="nav-link <?php echo isset($seccion) && $seccion === '/productos' ? '' : 'collapsed'; ?>" href="/productos">
                <i class="bi bi-box-seam"></i>
                <span>Productos</span>
            </a>
        </li><!-- End Productos Page Nav -->
        <?php } if (strpos($_SESSION['permisos']['categorias'], 'r') !== false) { ?>
        <li class="nav-item">
            <a class="nav-link <?php echo isset($seccion) && $seccion === '/categorias' ? '' : 'collapsed'; ?>" href="/categorias">
                <i class="bi bi-box-seam"></i>
                <span>Categorias</span>
            </a>
        </li><!-- End Categorias Page Nav -->
        <?php } ?>
        <li class="nav-item">
            <a class="nav-link <?php echo isset($seccion) && $seccion === '/perfil' ? '' : 'collapsed'; ?>" href="/perfil">
                <i class="bi bi-person"></i>
                <span>Perfil</span>
            </a>
        </li><!-- End Perfil Page Nav -->

        <li class="nav-item">
            <a class="nav-link <?php echo isset($seccion) && $seccion === '/blank' ? '' : 'collapsed'; ?>" href="/blank">
                <i class="bi bi-file-earmark"></i>
                <span>Blank</span>
            </a>
        </li><!-- End Blank Page Nav -->

    </ul>

</aside><!-- End Sidebar-->