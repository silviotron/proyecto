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
        $model = new \Com\Daw2\Models\CategoriaModel();
        $data['categorias'] = $model->getAll();
        unset($data['categorias'][0]);

        $this->view->showViews(array('templates/header.view.php', 'templates/left-menu.view.php', 'categorias.view.php', 'templates/footer.view.php'), $data);
    }

    function mostrarAdd() {
        $data = array(
            'seccion' => '/categorias',
            'titulo' => 'Categorias',
            'breadcrumb' => ['Categorias']
        );

        $this->view->showViews(array('templates/header.view.php', 'templates/left-menu.view.php', 'add.categoria.view.php', 'templates/footer.view.php'), $data);
    }

    function add() {
        $errores = $this->checkForm($_POST);
        if (count($errores) == 0) {
            $modelo = new \Com\Daw2\Models\CategoriaModel();
            $saneado = filter_var_array($_POST, FILTER_SANITIZE_SPECIAL_CHARS);
            $id = $modelo->insert($saneado['nombre']);
            if ($id != -1) {
                header('location: /categorias');
            } else {
                header('location: /categorias/add');
            }
        } else {
            $data = array(
                'seccion' => '/categorias',
                'titulo' => 'Categorias',
                'breadcrumb' => ['Add']
            );
            $data['input'] = filter_var_array($_POST, FILTER_SANITIZE_SPECIAL_CHARS);

            $data['errores'] = $errores;

            $this->view->showViews(array('templates/header.view.php', 'templates/left-menu.view.php', 'add.categoria.view.php', 'templates/footer.view.php'), $data);
        }
    }

    public function delete(string $id) {
        if ($id != 0) {
            $modelo = new \Com\Daw2\Models\CategoriaModel();
            if ($modelo->delete($id) == 1) {
                $_SESSION['mensaje_categorias'] = array(
                    'class' => 'success',
                    'texto' => "Producto $id eliminado con éxito");
            } else {
                $_SESSION['mensaje_categorias'] = array(
                    'class' => 'danger',
                    'texto' => 'No se ha logrado eliminar el producto ' . $codigo);
            }
            header('location: /categorias');
        } else {
            header('location: /categorias');
        }
    }

    function mostrarEdit(string $id) {
        if ($id != 0) {
            $data = array(
                'seccion' => '/categorias',
                'titulo' => 'Categorias',
                'breadcrumb' => ['Edit']
            );
            $modelo = new \Com\Daw2\Models\CategoriaModel();
            $input = $modelo->get($id);
            if (is_null($input)) {
                header('location: /categorias');
            } else {
                $data['tituloDiv'] = 'Editando categoria: ' . $input['nombre_categoria'];

                $data['input']['nombre'] = $input['nombre_categoria'];

                $this->view->showViews(array('templates/header.view.php', 'templates/left-menu.view.php', 'add.categoria.view.php', 'templates/footer.view.php'), $data);
            }
        } else {
            header('location: /categorias');
        }
    }

    function edit(string $id) {
        $_POST['id'] = $id;
        $errores = $this->checkForm($_POST);
        $saneado = filter_var_array($_POST, FILTER_SANITIZE_SPECIAL_CHARS);
        if (count($errores) == 0) {
            $modelo = new \Com\Daw2\Models\CategoriaModel();
            if ($modelo->edit($id, $saneado['nombre'])) {

                header('location: /categorias');
            } else {
                $data = array(
                    'seccion' => '/categorias',
                    'titulo' => 'Categorias',
                    'breadcrumb' => ['Edit']
                );
                $data['errores'] = ['codigo' => 'Error indeterminado al realizar el guardado'];

                $data['input'] = $saneado;
                $data['errores'] = $errores;

                $this->view->showViews(array('templates/header.view.php', 'templates/left-menu.view.php', 'add.categoria.view.php', 'templates/footer.view.php'), $data);
            }
        } else {
            $data = array(
                'seccion' => '/categorias',
                'titulo' => 'Categorias',
                'breadcrumb' => ['Edit']
            );
            $data['input'] = $saneado;
            $data['errores'] = $errores;

            $this->view->showViews(array('templates/header.view.php', 'templates/left-menu.view.php', 'add.categoria.view.php', 'templates/footer.view.php'), $data);
        }
    }

    private function checkForm(array $post) {
        $errores = [];
        $modelo = new \Com\Daw2\Models\CategoriaModel();
        if ($post['nombre'] == '') {
            $errores['nombre'] = 'Debe insertar un nombre a la categoria.';
        } else if (strlen($post['nombre']) > 100) {
            $errores['nombre'] = 'El nombre debe tener una longitud máxima de 100 caracteres.';
        } else if ((isset($post['id']) && $modelo->existsNombreEdit($post['id'], $post['nombre'])) || (!isset($post['id']) && $modelo->existsNombre($post['nombre']))) {
            $errores['nombre'] = 'La categoria ya Existe';
        }

        return $errores;
    }

}
