<?php

declare(strict_types=1);

namespace Com\Daw2\Controllers;

class UsuarioController extends \Com\Daw2\Core\BaseController {

    const ADMINISTRADOR = 1;
    const REPONEDOR = 2;
    const AUDITOR = 3;
    const SOPORTE = 4;
    const USUARIO = 5;

    function login() {
        $this->view->show('login.view.php');
    }

    function loginProceso() {
        $model = new \Com\Daw2\Models\UsuarioModel();
        $userData = $model->login($_POST['email'], $_POST['pass']);
        if (!is_null($userData)) {
            $model->userDateUpdate($userData['id_usuario']);
            $_SESSION['usuario'] = $userData;
            $_SESSION['permisos'] = $this->getPermisos($userData['id_rol']);
            header('location: /');
        } else {
            $data['loginError'] = 'Datos incorrectos';
            $this->view->show('login.view.php', $data);
        }
    }

    function getPermisos($idRol) {
        $permisos = array(
            'usuarios' => '',
            'productos' => '',
            'categorias' => '',
            'marcas' => ''
        );
        if (self::ADMINISTRADOR == $idRol) {
            $permisos['usuarios'] = "rwd";
            $permisos['productos'] = "rwd";
            $permisos['categorias'] = "rwd";
            $permisos['marcas'] = "rwd";
        } elseif (self::AUDITOR == $idRol) {
            $permisos['usuarios'] = "r";
            $permisos['productos'] = "r";
            $permisos['categorias'] = "r";
            $permisos['marcas'] = "r";
        }
        return $permisos;
    }

    function delete(string $id) {
        if ($_SESSION['usuario']['id_usuario'] == $id) {
            $_SESSION['mensajeUsuarios'] = array(
                'class' => 'warning',
                'texto' => 'No está permitido eliminarse a uno mismo.'
            );
            header('Location: /usuarios');
        } else {
            $modelo = new \Com\Daw2\Models\UsuarioModel();
            $result = $modelo->delete($id);
            if ($result) {
                $target_dir = "assets/images/user/";
                $file = $target_dir . basename($id . '.jpg');
                if (file_exists($file)) {
                    unlink($file);
                }
                header('Location: /usuarios');
            } else {
                $_SESSION['mensajeUsuarios'] = array(
                    'class' => 'warning',
                    'texto' => 'Error indeterminado al guardar.'
                );
                header('Location: /usuarios');
            }
        }
    }

    function mostrarTodos() {
        $data = array(
            'seccion' => '/usuarios',
            'titulo' => 'Usuarios',
            'breadcrumb' => ['Usuarios']
        );
        $model = new \Com\Daw2\Models\UsuarioModel();
        $data['usuarios'] = $model->getAll();
        $this->view->showViews(array('templates/header.view.php', 'templates/left-menu.view.php', 'usuarios.view.php', 'templates/footer.view.php'), $data);
    }

    function mostrarPerfil() {
        $data = array(
            'seccion' => '/perfil',
            'titulo' => 'Perfil',
            'breadcrumb' => ['Perfil']
        );
        $this->view->showViews(array('templates/header.view.php', 'templates/left-menu.view.php', 'perfil.view.php', 'templates/footer.view.php'), $data);
    }

    function mostrarAdd() {
        $data = array(
            'seccion' => '/usuarios',
            'titulo' => 'Usuarios',
            'breadcrumb' => ['Add']
        );

        $rolModel = new \Com\Daw2\Models\RolModel();
        $data['roles'] = $rolModel->getAll();

        $estadoModel = new \Com\Daw2\Models\EstadoModel();
        $data['estados'] = $estadoModel->getAll();

        $this->view->showViews(array('templates/header.view.php', 'templates/left-menu.view.php', 'add.usuario.view.php', 'templates/footer.view.php'), $data);
    }

    function add() {
        $_POST['imagen'] = $_FILES['imagen'];
        $errores = $this->checkForm($_POST, true);
        if (count($errores) == 0) {
            $modelo = new \Com\Daw2\Models\UsuarioModel();
            $saneado = filter_var_array($_POST, FILTER_SANITIZE_SPECIAL_CHARS);
            $id = $modelo->insert($saneado);
            if ($id != -1) {
                $target_dir = "assets/images/user/";
                $target_file = $target_dir . basename($id . '.jpg');
                if ($_FILES['imagen']['error'] == 4) {
                    copy($target_dir . "default.jpg", $target_file);
                } else if ($_FILES['imagen']['error'] == 0) {
                    move_uploaded_file($_FILES["imagen"]["tmp_name"], $target_file);
                }
                header('location: /usuarios');
            }
        } else {
            $data = array(
                'seccion' => '/usuarios',
                'titulo' => 'Usuarios',
                'breadcrumb' => ['Add']
            );
            $data['input'] = filter_var_array($_POST, FILTER_SANITIZE_SPECIAL_CHARS);
            $data['errores'] = $errores;
            unset($data['input']['imagen']);

            $rolModel = new \Com\Daw2\Models\RolModel();
            $data['roles'] = $rolModel->getAll();

            $estadoModel = new \Com\Daw2\Models\EstadoModel();
            $data['estados'] = $estadoModel->getAll();

            $this->view->showViews(array('templates/header.view.php', 'templates/left-menu.view.php', 'add.usuario.view.php', 'templates/footer.view.php'), $data);
        }
    }

    function mostrarEdit(string $id) {
        $data = array(
            'seccion' => '/usuarios',
            'titulo' => 'Usuarios',
            'breadcrumb' => ['Edit']
        );
        $modelo = new \Com\Daw2\Models\UsuarioModel();
        $input = $modelo->get($id);
        if (is_null($input)) {
            header('location: /usuarios');
        } else {
            $data['tituloDiv'] = 'Editando usuario: ' . $input['nombre'];
            $data['input'] = $input;
            $data['input']['imagen'] = "assets/images/user/$id.jpg";

            $rolModel = new \Com\Daw2\Models\RolModel();
            $data['roles'] = $rolModel->getAll();

            $estadoModel = new \Com\Daw2\Models\EstadoModel();
            $data['estados'] = $estadoModel->getAll();

            $this->view->showViews(array('templates/header.view.php', 'templates/left-menu.view.php', 'add.usuario.view.php', 'templates/footer.view.php'), $data);
        }
    }

    function edit(string $id) {
        $_POST['imagen'] = $_FILES['imagen'];
        $errores = $this->checkForm($_POST, false);
        if (count($errores) == 0) {
            $modelo = new \Com\Daw2\Models\UsuarioModel();
            $_POST['id'] = $id;
            $saneado = filter_var_array($_POST, FILTER_SANITIZE_SPECIAL_CHARS);
            if ($modelo->update($saneado)) {
                if ($_FILES['imagen']["error"] == 0) {
                    $target_dir = "assets/images/user/";
                    $target_file = $target_dir . basename($id . '.jpg');
                    move_uploaded_file($_FILES["imagen"]["tmp_name"], $target_file);
                }
                header('location: /usuarios');
            } else {
                $data = array(
                    'seccion' => '/usuarios',
                    'titulo' => 'Usuarios',
                    'breadcrumb' => ['Edit']
                );
                $data['errores'] = ['codigo' => 'Error indeterminado al realizar el guardado'];

                $data['input'] = filter_var_array($_POST, FILTER_SANITIZE_SPECIAL_CHARS);
                $data['errores'] = $errores;
                $data['input']['imagen'] = "assets/images/user/$id.jpg";

                $rolModel = new \Com\Daw2\Models\RolModel();
                $data['roles'] = $rolModel->getAll();

                $estadoModel = new \Com\Daw2\Models\EstadoModel();
                $data['estados'] = $estadoModel->getAll();
                $this->view->showViews(array('templates/header.view.php', 'templates/left-menu.view.php', 'add.usuario.view.php', 'templates/footer.view.php'), $data);
            }
        } else {
            $data = array(
                'seccion' => '/usuarios',
                'titulo' => 'Usuarios',
                'breadcrumb' => ['Edit']
            );
            $data['input'] = filter_var_array($_POST, FILTER_SANITIZE_SPECIAL_CHARS);
            $data['errores'] = $errores;
            $data['input']['imagen'] = "assets/images/user/$id.jpg";

            $rolModel = new \Com\Daw2\Models\RolModel();
            $data['roles'] = $rolModel->getAll();

            $estadoModel = new \Com\Daw2\Models\EstadoModel();
            $data['estados'] = $estadoModel->getAll();
            $this->view->showViews(array('templates/header.view.php', 'templates/left-menu.view.php', 'add.usuario.view.php', 'templates/footer.view.php'), $data);
        }
    }

    private function checkForm(array $post, bool $alta) {
        $errores = [];
        if (empty($post['email'])) {
            $errores['email'] = "Campo obligatorio.";
        } else if (!filter_var($post['email'], FILTER_VALIDATE_EMAIL)) {
            $errores['email'] = 'Inserte un email válido.';
        } else if ($alta) {
            $userModel = new \Com\Daw2\Models\UsuarioModel();
            if ($userModel->existsEmail($post['email'])) {
                $errores['email'] = 'El email seleccionado ya está en uso.';
            }
        }
        if ($alta || $post['pass'] != ''){
            if ($post['pass'] == '') {
                $errores['pass'] = 'Introduce una contraseña.';
            } else if (preg_match('/\s+/', $post['pass'])) {
                $errores['pass'] = 'La contraseña no puede contener espacios.';
            }else if (strlen($post['pass']) < 5) {
                $errores['pass'] = "La contraseña debe contener al menos 5 caracteres.";
            }else if(strlen($post['pass']) > 100){
                $errores['pass'] = 'La contraseña no puede tener mas de 100 caracteres.';
            }
            
        }
        if ($post['nombre'] == '') {
            $errores['nombre'] = 'El nombre es obligatorio.';
        } else if (strlen($post['nombre']) > 100) {
            $errores['nombre'] = 'El nombre debe tener una longitud máxima de 100 caracteres.';
        }
        if (strlen($post['apellido']) > 100) {
            $errores['apellido'] = 'El apellido debe tener una longitud máxima de 100 caracteres.';
        }

        if ($post['telefono'] != '' && preg_match('/^[0-9]{9}$/', str_replace(' ', '', $post['telefono']))) {
            $errores['telefono'] = 'Introduce un telefono de 9 digitos.';
        }

        if (strlen($post['direccion']) > 500) {
            $errores['direccion'] = 'La direccion no puede superar los 500 caracteres.';
        }

        $rolModel = new \Com\Daw2\Models\RolModel();
        if (!$rolModel->exists($post['rol'])) {
            $errores['rol'] = 'El rol seleccionado no existe.';
        }
        $estadoModel = new \Com\Daw2\Models\EstadoModel();
        if (!$estadoModel->exists($post['estado'])) {
            $errores['estado'] = 'El estado seleccionado no existe.';
        }

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
        }

        return $errores;
    }

}
