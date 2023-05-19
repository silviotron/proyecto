<?php

namespace Com\Daw2\Controllers;

class InicioController extends \Com\Daw2\Core\BaseController
{

    public function index()
    {
        $data = array(
            'seccion' => '/',
            'titulo' => 'Página de inicio',
            'breadcrumb' => ['Inicio']
        );
        $this->view->showViews(array('templates/header.view.php', 'templates/left-menu.view.php', 'inicio.view.php', 'templates/footer.view.php'), $data);
    }

}
