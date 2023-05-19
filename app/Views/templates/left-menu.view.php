<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link <?php echo isset($seccion) && $seccion === '/' ? '' : 'collapsed'; ?>" href="/">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link <?php echo isset($seccion) && $seccion === '/usuarios' ? '' : 'collapsed'; ?>" href="/usuarios">
                <i class="bi bi-people"></i>
                <span>Usuarios</span>
            </a>
        </li><!-- End Usuarios Page Nav -->
        
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