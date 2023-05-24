<?php

declare(strict_types=1);

namespace Com\Daw2\Controllers;

class CarritoController extends \Com\Daw2\Core\BaseController {

    function cart() {
        $data = array(
            'seccion' => '/usuarios',
            'titulo' => 'Usuarios',
            'breadcrumb' => ['Usuarios']
        );
        //TODO: guardar en data los productos del carrito guardado en session
        $model = new \Com\Daw2\Models\ProductoModel();
        $data['productos'] = $model->getAll();
        $this->view->showViews(array('tienda/templates/header.view.php', 'tienda/cart.view.php', 'tienda/templates/footer.view.php'), $data);
        //$this->view->show('tienda.view.php', $data);
    }

    function add($id) {
        $data = array(
            'seccion' => '/usuarios',
            'titulo' => 'Usuarios',
            'breadcrumb' => ['Usuarios']
        );
        //TODO: guardar producto en la session o sumar uno
        $model = new \Com\Daw2\Models\ProductoModel();
        $data['productos'] = $model->getAll();
        header("location: \carrito");
        //$this->view->show('tienda.view.php', $data);
    }


}
