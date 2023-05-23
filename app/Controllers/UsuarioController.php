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
        );
        if (self::ADMINISTRADOR == $idRol) {
            $permisos['usuarios'] = "rwd";
            $permisos['productos'] = "rwd";
        } elseif (self::AUDITOR == $idRol) {
            $permisos['usuarios'] = "r";
            $permisos['productos'] = "r";
        }
        return $permisos;
    }

    function mostrarTodos() {
        $data = array(
            'seccion' => '/usuarios',
            'titulo' => 'Usuarios',
            'breadcrumb' => ['Usuarios']
        );
        $model = new \Com\Daw2\Models\UsuarioModel();
        $data['usuarios'] = $model->getAll();      
        $this->view->showViews(array('templates/header.view.php','templates/left-menu.view.php', 'usuarios.view.php', 'templates/footer.view.php'), $data);
    }
    
    function mostrarPerfil() {
        $data = array(
            'seccion' => '/perfil',
            'titulo' => 'Perfil',
            'breadcrumb' => ['Perfil']
        );       
        $this->view->showViews(array('templates/header.view.php','templates/left-menu.view.php', 'perfil.view.php', 'templates/footer.view.php'), $data);
    }
    

    

}
