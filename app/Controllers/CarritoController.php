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
        if (isset($_SESSION['carrito']) && !empty($_SESSION['carrito'])) {
            foreach ($_SESSION['carrito'] as $value) {
                $subTotal += $value['producto']['precio'] * $value['cantidad'];
            }
            $data['subTotal'] = $subTotal;
            $data['total'] = $subTotal;
            $data['envio'] = 'Gratis';
            if ($subTotal < 50) {
                $data['total'] += 10;
                $data['envio'] = '10 €';
            }
        } else {
            $_SESSION['carrito'] = [];
            $data['subTotal'] = 0;
            $data['total'] = 0;
            $data['envio'] = 'Vacio';
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
            if (!empty($producto)) {
                $_SESSION['carrito'][$id]['producto'] = $producto;
                $_SESSION['carrito'][$id]['cantidad'] = 0;
            }
        }
        
        if (isset($_SESSION['carrito'][$id])) {
            if (isset($_POST['cantidad']) && is_numeric($_POST['cantidad'])) {
                $_SESSION['carrito'][$id]['cantidad'] += $_POST['cantidad'];
            } else {
                $_SESSION['carrito'][$id]['cantidad'] += 1;
            }
        }
        header("location: \carrito");
    }

    function remove($id) {
        $data = array(
            'seccion' => '/carrito',
            'titulo' => 'Carrito',
            'breadcrumb' => ['carrito']
        );
        unset($_SESSION['carrito'][$id]);
        header("location: \carrito");
    }

    function sumar($id) {
        $data = array(
            'seccion' => '/carrito',
            'titulo' => 'Carrito',
            'breadcrumb' => ['carrito']
        );
        if (isset($_SESSION['carrito'][$id])) {
            $_SESSION['carrito'][$id]['cantidad'] += 1;
        }
        header("location: \carrito");
    }

    function restar($id) {
        $data = array(
            'seccion' => '/carrito',
            'titulo' => 'Carrito',
            'breadcrumb' => ['carrito']
        );
        if (isset($_SESSION['carrito'][$id])) {
            $_SESSION['carrito'][$id]['cantidad'] -= 1;
        }
        if ($_SESSION['carrito'][$id]['cantidad'] <= 0) {
            unset($_SESSION['carrito'][$id]);
        }
        header("location: \carrito");
    }

    function comprar() {
        //TODO: realizar pedido con los datos de $_SESSION
    }

}
