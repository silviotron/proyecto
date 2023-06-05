<?php

declare(strict_types=1);

namespace Com\Daw2\Controllers;

class ProductoController extends \Com\Daw2\Core\BaseController {

    function mostrarTodos() {
        $data = array(
            'seccion' => '/productos',
            'titulo' => 'Productos',
            'breadcrumb' => ['Productos']
        );
        $model = new \Com\Daw2\Models\ProductoModel();
        $data['productos'] = $model->getAll();
        $this->view->showViews(array('templates/header.view.php', 'templates/left-menu.view.php', 'productos.view.php', 'templates/footer.view.php'), $data);
    }

    function mostrarAdd() {
        $data = array(
            'seccion' => '/productos',
            'titulo' => 'Productos',
            'breadcrumb' => ['Add']
        );

        $categoriaModel = new \Com\Daw2\Models\CategoriaModel();
        $data['categorias'] = $categoriaModel->getAll();

        $marcaModel = new \Com\Daw2\Models\MarcaModel();
        $data['marcas'] = $marcaModel->getAll();

        $precioModel = new \Com\Daw2\Models\PrecioModel();
        $data['precios'] = $precioModel->getAll();

        $this->view->showViews(array('templates/header.view.php', 'templates/left-menu.view.php', 'add.producto.view.php', 'templates/footer.view.php'), $data);
    }

    public function delete(string $id) {
        $modelo = new \Com\Daw2\Models\ProductoModel();
        if ($modelo->delete($id)) {
            $target_dir = "assets/images/product/";
            $file = $target_dir . basename($id . '.jpg');
            if (file_exists($file)) {
                unlink($file);
            }
            $_SESSION['mensaje_productos'] = array(
                'class' => 'success',
                'texto' => "Producto $id eliminado con éxito");
        } else {
            $_SESSION['mensaje_productos'] = array(
                'class' => 'danger',
                'texto' => 'No se ha logrado eliminar el producto ' . $codigo);
        }
        header('location: /productos');
    }

    function add() {
        if ($_POST['stock'] == '') {
            $_POST['stock'] = '0';
        }
        if ($_POST['descuento'] == '') {
            $_POST['descuento'] = '0';
        }
        $_POST['imagen'] = $_FILES['imagen'];
        $errores = $this->checkForm($_POST, true);
        if (count($errores) == 0) {
            $modelo = new \Com\Daw2\Models\ProductoModel();
            $saneado = filter_var_array($_POST, FILTER_SANITIZE_SPECIAL_CHARS);
            $id = $modelo->insert($saneado);
            if ($id != -1) {
                $target_dir = "assets/images/product/";
                $target_file = $target_dir . basename($id . '.jpg');
                move_uploaded_file($_FILES["imagen"]["tmp_name"], $target_file);
                header('location: /productos');
            }
        } else {
            $data = array(
                'seccion' => '/productos',
                'titulo' => 'Productos',
                'breadcrumb' => ['Add']
            );
            $data['input'] = filter_var_array($_POST, FILTER_SANITIZE_SPECIAL_CHARS);
            $data['input']['imagen'] = $_FILES['imagen'];
            $data['errores'] = $errores;
            $data['_FILES'] = $_FILES;

            $categoriaModel = new \Com\Daw2\Models\CategoriaModel();
            $data['categorias'] = $categoriaModel->getAll();

            $marcaModel = new \Com\Daw2\Models\MarcaModel();
            $data['marcas'] = $marcaModel->getAll();

            $precioModel = new \Com\Daw2\Models\PrecioModel();
            $data['precios'] = $precioModel->getAll();
            $this->view->showViews(array('templates/header.view.php', 'templates/left-menu.view.php', 'add.producto.view.php', 'templates/footer.view.php'), $data);
        }
    }

    function mostrarEdit(string $id) {
        $data = array(
            'seccion' => '/productos',
            'titulo' => 'Productos',
            'breadcrumb' => ['Edit']
        );
        $modelo = new \Com\Daw2\Models\ProductoModel();
        $input = $modelo->get($id);
        if (is_null($input)) {
            header('location: /productos');
        } else {
            $data['tituloDiv'] = 'Editando producto: ' . $input['nombre'];

            $data['input'] = $input;

            $categoriaModel = new \Com\Daw2\Models\CategoriaModel();
            $data['categorias'] = $categoriaModel->getAll();

            $marcaModel = new \Com\Daw2\Models\MarcaModel();
            $data['marcas'] = $marcaModel->getAll();

            $precioModel = new \Com\Daw2\Models\PrecioModel();
            $data['precios'] = $precioModel->getAll();

            $this->view->showViews(array('templates/header.view.php', 'templates/left-menu.view.php', 'add.producto.view.php', 'templates/footer.view.php'), $data);
        }
    }

    function edit(string $id) {
        $_POST['imagen'] = $_FILES['imagen'];
        $errores = $this->checkForm($_POST, false);
        if (count($errores) == 0) {
            $modelo = new \Com\Daw2\Models\ProductoModel();
            $_POST['id'] = $id;
            $saneado = filter_var_array($_POST, FILTER_SANITIZE_SPECIAL_CHARS);
            if ($modelo->update($saneado)) {
                if ($_FILES['imagen']["error"] == 0) {
                    $target_dir = "assets/images/product/";
                    $target_file = $target_dir . basename($id . '.jpg');
                    move_uploaded_file($_FILES["imagen"]["tmp_name"], $target_file);
                }
                header('location: /productos');
            } else {
                $data = array(
                    'seccion' => '/productos',
                    'titulo' => 'Productos',
                    'breadcrumb' => ['Edit']
                );
                $data['errores'] = ['codigo' => 'Error indeterminado al realizar el guardado'];

                $data['input'] = filter_var_array($_POST, FILTER_SANITIZE_SPECIAL_CHARS);
                $data['errores'] = $errores;

                $categoriaModel = new \Com\Daw2\Models\CategoriaModel();
                $data['categorias'] = $categoriaModel->getAll();

                $marcaModel = new \Com\Daw2\Models\MarcaModel();
                $data['marcas'] = $marcaModel->getAll();

                $precioModel = new \Com\Daw2\Models\PrecioModel();
                $data['precios'] = $precioModel->getAll();
                $this->view->showViews(array('templates/header.view.php', 'templates/left-menu.view.php', 'add.producto.view.php', 'templates/footer.view.php'), $data);
            }
        } else {
            $data = array(
                'seccion' => '/productos',
                'titulo' => 'Productos',
                'breadcrumb' => ['Edit']
            );
            $data['input'] = filter_var_array($_POST, FILTER_SANITIZE_SPECIAL_CHARS);
            $data['errores'] = $errores;

            $categoriaModel = new \Com\Daw2\Models\CategoriaModel();
            $data['categorias'] = $categoriaModel->getAll();

            $marcaModel = new \Com\Daw2\Models\MarcaModel();
            $data['marcas'] = $marcaModel->getAll();

            $precioModel = new \Com\Daw2\Models\PrecioModel();
            $data['precios'] = $precioModel->getAll();
            $this->view->showViews(array('templates/header.view.php', 'templates/left-menu.view.php', 'add.producto.view.php', 'templates/footer.view.php'), $data);
        }
    }

    private function checkForm(array $post, bool $alta) {
        $errores = [];
        if ($post['nombre'] == '') {
            $errores['nombre'] = 'Debe insertar un nombre al producto.';
        } else if (strlen($post['nombre']) > 100) {
            $errores['nombre'] = 'El nombre debe tener una longitud máxima de 100 caracteres.';
        }

        if (!is_numeric($post['precio'])) {
            $errores['precio'] = "Por favor inserte un número.";
        } else if ($post['precio'] < 0) {
            $errores['precio'] = "El precio debe tener un valor mayor que cero.";
        } else if ($post['precio'] >= 99999999) {
            $errores['precio'] = "El precio debe tener un valor menor que 99 999 999.";
        }

        if (!is_numeric($post['descuento'])) {
            $errores['descuento'] = "Por favor inserte un número.";
        } else if ($post['descuento'] < 0) {
            $errores['descuento'] = "El descuento debe tener un valor mayor o igual que cero.";
        } else if ($post['descuento'] > 100) {
            $errores['descuento'] = "El precio debe tener un valor menor o igual que cien.";
        }

        $marcaModel = new \Com\Daw2\Models\MarcaModel();
        if (!$marcaModel->exists($post['marca'])) {
            $errores['marca'] = 'La marca seleccionada no existe.';
        }

        $categoriaModel = new \Com\Daw2\Models\CategoriaModel();
        if (!$categoriaModel->exists($post['categoria'])) {
            $errores['categoria'] = 'La categoría seleccionada no existe.';
        }

        $precioModel = new \Com\Daw2\Models\PrecioModel();
        if (!$precioModel->exists($post['tipo'])) {
            $errores['tipo'] = 'el tipo de precio seleccionada no existe.';
        }
        if ($alta || $post["imagen"]["error"] == 0) {
            if ($post["imagen"]["error"] == 0) {
                $allowedExtensions = ['jpg', 'jpeg', 'png'];
                $extension = strtolower(pathinfo($post["imagen"]["name"], PATHINFO_EXTENSION));
                if (getimagesize($post["imagen"]["tmp_name"]) == false) {
                    $errores['imagen'] = "El archivo no es una imagen.";
                } else if ($post["imagen"]["size"] > 5000000) {
                    $errores['imagen'] = "No se permiten imagenes de mas de 5 MB.";
                } else if (!in_array($extension, $allowedExtensions)) {
                    $errores['imagen'] = "La extension $extension no esta permitida.";
                }
            } else if ($post["imagen"]["error"] == 4) {
                $errores['imagen'] = "selecciona una imagen.";
            }
        }

        return $errores;
    }

}
