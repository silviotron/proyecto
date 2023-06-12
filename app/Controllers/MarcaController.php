<?php

declare(strict_types=1);

namespace Com\Daw2\Controllers;

class MarcaController extends \Com\Daw2\Core\BaseController {

    function mostrarTodos() {
        $data = array(
            'seccion' => '/marcas',
            'titulo' => 'Marcas',
            'breadcrumb' => ['Marcas']
        );
        $model = new \Com\Daw2\Models\MarcaModel();
        $data['marcas'] = $model->getAll();
        unset($data['marcas'][0]);
        $this->view->showViews(array('templates/header.view.php', 'templates/left-menu.view.php', 'marcas.view.php', 'templates/footer.view.php'), $data);
    }

    function mostrarAdd() {
        $data = array(
            'seccion' => '/marcas',
            'titulo' => 'Marcas',
            'breadcrumb' => ['Marcas']
        );

        $this->view->showViews(array('templates/header.view.php', 'templates/left-menu.view.php', 'add.marca.view.php', 'templates/footer.view.php'), $data);
    }

    function add() {
        $errores = $this->checkForm($_POST);
        if (count($errores) == 0) {
            $modelo = new \Com\Daw2\Models\MarcaModel();
            $saneado = filter_var_array($_POST, FILTER_SANITIZE_SPECIAL_CHARS);
            $id = $modelo->insert($saneado['nombre']);
            if ($id != -1) {
                header('location: /marcas');
            } else {
                header('location: /marcas/add');
            }
        } else {
            $data = array(
                'seccion' => '/marcas',
                'titulo' => 'Marcas',
                'breadcrumb' => ['Add']
            );
            $data['input'] = filter_var_array($_POST, FILTER_SANITIZE_SPECIAL_CHARS);

            $data['errores'] = $errores;

            $this->view->showViews(array('templates/header.view.php', 'templates/left-menu.view.php', 'add.marca.view.php', 'templates/footer.view.php'), $data);
        }
    }

    public function delete(string $id) {
        if ($id != 0) {
            $modelo = new \Com\Daw2\Models\MarcaModel();
            if ($modelo->delete($id) == 1) {
                $_SESSION['mensaje_marcas'] = array(
                    'class' => 'success',
                    'texto' => "Producto $id eliminado con éxito");
            } else {
                $_SESSION['mensaje_marcas'] = array(
                    'class' => 'danger',
                    'texto' => 'No se ha logrado eliminar el producto ' . $codigo);
            }
            header('location: /marcas');
        } else {
            header('location: /marcas');
        }
    }

    function mostrarEdit(string $id) {
        if ($id != 0) {
            $data = array(
                'seccion' => '/marcas',
                'titulo' => 'Marcas',
                'breadcrumb' => ['Edit']
            );
            $modelo = new \Com\Daw2\Models\MarcaModel();
            $input = $modelo->get($id);
            if (is_null($input)) {
                header('location: /marcas');
            } else {
                $data['tituloDiv'] = 'Editando marca: ' . $input['nombre_marca'];

                $data['input']['nombre'] = $input['nombre_marca'];
                $data['input']['id'] = $input['id_marca'];

                $this->view->showViews(array('templates/header.view.php', 'templates/left-menu.view.php', 'add.marca.view.php', 'templates/footer.view.php'), $data);
            }
        } else {
            header('location: /marcas');
        }
    }

    function edit(string $id) {
        $_POST['id'] = $id;
        $errores = $this->checkForm($_POST);
        $saneado = filter_var_array($_POST, FILTER_SANITIZE_SPECIAL_CHARS);
        if (count($errores) == 0) {
            $modelo = new \Com\Daw2\Models\MarcaModel();
            if ($modelo->edit($id,$saneado['nombre'])) {

                header('location: /marcas');
            } else {
                $data = array(
                    'seccion' => '/marcas',
                    'titulo' => 'Marcas',
                    'breadcrumb' => ['Edit']
                );
                $data['errores'] = ['codigo' => 'Error indeterminado al realizar el guardado'];

                $data['input'] = $saneado;
                $data['errores'] = $errores;

                $this->view->showViews(array('templates/header.view.php', 'templates/left-menu.view.php', 'add.marca.view.php', 'templates/footer.view.php'), $data);
            }
        } else {
            $data = array(
                'seccion' => '/marcas',
                'titulo' => 'Marcas',
                'breadcrumb' => ['Edit']
            );
            $data['input'] = $saneado;
            $data['errores'] = $errores;

            $this->view->showViews(array('templates/header.view.php', 'templates/left-menu.view.php', 'add.marca.view.php', 'templates/footer.view.php'), $data);
        }
    }

    private function checkForm(array $post) {
        $errores = [];
        $modelo = new \Com\Daw2\Models\MarcaModel();
        if ($post['nombre'] == '') {
            $errores['nombre'] = 'Debe insertar un nombre a la marca.';
        } else if (strlen($post['nombre']) > 100) {
            $errores['nombre'] = 'El nombre debe tener una longitud máxima de 100 caracteres.';
        } else if ((isset($post['id']) && $modelo->existsNombreEdit($post['id'], $post['nombre']))||(!isset($post['id']) && $modelo->existsNombre($post['nombre']))) {
            $errores['nombre'] = 'La marca ya Existe';
        }

        return $errores;
    }

}
