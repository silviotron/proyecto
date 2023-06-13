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
        
        $pedidoModel = new \Com\Daw2\Models\PedidoModel();
        $data['pedidos'] = $pedidoModel->count();
        $usuarioModel = new \Com\Daw2\Models\UsuarioModel();
        $data['usuarios'] = $usuarioModel->count();
        
        $this->view->showViews(array('templates/header.view.php', 'templates/left-menu.view.php', 'inicio.view.php', 'templates/footer.view.php'), $data);
    }

}
