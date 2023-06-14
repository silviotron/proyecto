<?php

declare(strict_types=1);

namespace Com\Daw2\Controllers;

class CarritoController extends \Com\Daw2\Core\BaseController {

    function cart($err = [] ) {
        $data = array(
            'seccion' => '/usuarios',
            'titulo' => 'Usuarios',
            'breadcrumb' => ['Usuarios']
        );
        $data['errores'] = $err;
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
            $data['envio'] = 'Vacío';
        }

        $this->view->showViews(array('tienda/templates/header.view.php', 'tienda/cart.view.php', 'tienda/templates/footer.view.php'), $data);
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
        $error = [];
        if (count($_SESSION['carrito']) > 0) {
            foreach ($_SESSION['carrito'] as $item) {
                $productoModel = new \Com\Daw2\Models\ProductoModel();
                $stock = $productoModel->stock($item['producto']['id']);
                if ($stock - $item['cantidad'] < 0) {
                    $error[$item['producto']['id']] = "Stock insuficiente.";
                }
            }
            if (count($error) <= 0) {
                if (isset($_SESSION['usuario'])) {
                    $_POST = filter_var_array($_POST, FILTER_SANITIZE_SPECIAL_CHARS);
                    $model = new \Com\Daw2\Models\PedidoModel();
                    $model->comprar($_SESSION['carrito'], $_SESSION['usuario']['id_usuario'], $_POST['direccion']);
                    $_SESSION['carrito'] = [];
                    header("location: \ ");
                } else {
                    header("location: \login ");
                }
            } else {
                $this->cart($error);
            }
        } else {
            $error['carrito'] = 'Carrito vacio.';
            $this->cart($error);
        }
    }

}
