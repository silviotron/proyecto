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
        $subTotal = 0;
        foreach ($_SESSION['carrito'] as $value) {
            $subTotal += $value['producto']['precio']*$value['cantidad'];
        }
        $data['subTotal'] = $subTotal;
        $data['total'] = $subTotal;
        $data['envio'] = 'Gratis';
        if ($subTotal < 50) {
            $data['total'] += 10;
            $data['envio'] = '10 €';

        }
        $this->view->showViews(array('tienda/templates/header.view.php', 'tienda/cart.view.php', 'tienda/templates/footer.view.php'), $data);
        //$this->view->show('tienda.view.php', $data);
    }

    function add($id) {
        $data = array(
            'seccion' => '/carrito',
            'titulo' => 'Carrito',
            'breadcrumb' => ['carrito']
        );
        if (!isset($_SESSION['carrito'][$id])) {
            $model = new \Com\Daw2\Models\ProductoModel();
            $producto = $model->get($id);
            $_SESSION['carrito'][$id]['producto'] = $producto;
            $_SESSION['carrito'][$id]['cantidad'] = 0;
        }
        var_dump($_POST['cantidad']);
        if (isset($_POST['cantidad'])) {
            $_SESSION['carrito'][$id]['cantidad'] += $_POST['cantidad'];
        } else {
            $_SESSION['carrito'][$id]['cantidad'] += 1;
        }
        header("location: \carrito");
        //$this->view->show('tienda.view.php', $data);
    }
    
    function comprar() {
        //TODO: realizar pedido con los datos de $_SESSION
    }

}
