<?php

declare(strict_types=1);

namespace Com\Daw2\Controllers;

class TiendaController extends \Com\Daw2\Core\BaseController {

    function index() {
        $data = array(
            'seccion' => '/',
            'titulo' => 'Home',
            'breadcrumb' => ['Home']
        );
        $model = new \Com\Daw2\Models\CategoriaModel();
        $categorias = $model->getAll();
        foreach ($categorias as $categoria) {
            $productoModel = new \Com\Daw2\Models\ProductoModel();
            $producto = $productoModel->getByCategoria($categoria['id_categoria']);
            if (isset($producto[0])) {
                $data['categorias'][$categoria['id_categoria']]['producto'] = $producto[0];
                $data['categorias'][$categoria['id_categoria']]['categoria'] = $categoria;
            }
        }
        $this->view->showViews(array('tienda/templates/header.view.php', 'tienda/index.view.php', 'tienda/templates/footer.view.php'), $data);
        //$this->view->show('tienda.view.php', $data);
    }

    function shop() {
        $data = array(
            'seccion' => '/tienda',
            'titulo' => 'Tienda',
            'breadcrumb' => ['Tienda'],
            'categoriaSeleccionada' => -1
        );
        $model = new \Com\Daw2\Models\ProductoModel();
        $data['productos'] = $model->getAll();

        $categoriaModel = new \Com\Daw2\Models\CategoriaModel();
        $data['categorias'] = $categoriaModel->getAll();

        $this->view->showViews(array('tienda/templates/header.view.php', 'tienda/shop.view.php', 'tienda/templates/footer.view.php'), $data);
        //$this->view->show('tienda.view.php', $data);
    }

    function details($id) {
        $model = new \Com\Daw2\Models\ProductoModel();
        $producto = $model->get($id);
        $data = array(
            'seccion' => '/tienda',
            'titulo' => $producto['nombre'],
            'breadcrumb' => [$producto['nombre']]
        );
        $data['producto'] = $producto;
        $this->view->showViews(array('tienda/templates/header.view.php', 'tienda/product.view.php', 'tienda/templates/footer.view.php'), $data);
        //$this->view->show('tienda.view.php', $data);
    }

    function categoria($id) {
        $data = array(
            'seccion' => '/tienda',
            'titulo' => 'Tienda',
            'breadcrumb' => ['Tienda'],
            'categoriaSeleccionada' => $id
        );
        $model = new \Com\Daw2\Models\ProductoModel();
        $data['productos'] = $model->getAllByCategoria($id);

        $categoriaModel = new \Com\Daw2\Models\CategoriaModel();
        $data['categorias'] = $categoriaModel->getAll();

        $this->view->showViews(array('tienda/templates/header.view.php', 'tienda/shop.view.php', 'tienda/templates/footer.view.php'), $data);
        //$this->view->show('tienda.view.php', $data);
    }

}
