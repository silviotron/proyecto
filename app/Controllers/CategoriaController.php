<?php

declare(strict_types=1);

namespace Com\Daw2\Controllers;

class CategoriaController extends \Com\Daw2\Core\BaseController {
    

    function mostrarTodos() {
        $data = array(
            'seccion' => '/categorias',
            'titulo' => 'Categorias',
            'breadcrumb' => ['Categorias']
        );
        $model = new \Com\Daw2\Models\ProductoModel();
        $data['productos'] = $model->getAll();      
        $this->view->showViews(array('templates/header.view.php','templates/left-menu.view.php', 'productos.view.php', 'templates/footer.view.php'), $data);
    }

        
}
