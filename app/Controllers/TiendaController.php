<?php

declare(strict_types=1);

namespace Com\Daw2\Controllers;

class tiendaController extends \Com\Daw2\Core\BaseController {

    function index() {
        $data = array(
            'seccion' => '/usuarios',
            'titulo' => 'Usuarios',
            'breadcrumb' => ['Usuarios']
        );
        $model = new \Com\Daw2\Models\ProductoModel();
        $data['productos'] = $model->getAll();
        $this->view->showViews(array('tienda/templates/header.view.php', 'tienda/index.view.php', 'tienda/templates/footer.view.php'), $data);
        //$this->view->show('tienda.view.php', $data);
    }

    function mostrarTodos() {
        $data = array(
            'seccion' => '/usuarios',
            'titulo' => 'Usuarios',
            'breadcrumb' => ['Usuarios']
        );
        $model = new \Com\Daw2\Models\UsuarioModel();
        $data['usuarios'] = $model->getAll();
        $this->view->showViews(array('templates/header.view.php', 'templates/left-menu.view.php', 'usuarios.view.php', 'templates/footer.view.php'), $data);
    }

    function mostrarPerfil() {
        $data = array(
            'seccion' => '/perfil',
            'titulo' => 'Perfil',
            'breadcrumb' => ['Perfil']
        );
        $this->view->showViews(array('templates/header.view.php', 'templates/left-menu.view.php', 'perfil.view.php', 'templates/footer.view.php'), $data);
    }

}
