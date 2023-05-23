<?php

namespace Com\Daw2\Core;

use Steampixel\Route;

class FrontController {

    static function main() {
        session_start();
        if (!isset($_SESSION['usuario'])) {
            Route::add('/',
                    function () {
                        $controlador = new \Com\Daw2\Controllers\TiendaController();
                        $controlador->index();
                    }
                    , 'get');

            Route::add('/login',
                    function () {
                        $controlador = new \Com\Daw2\Controllers\UsuarioController();
                        $controlador->login();
                    }
                    , 'get');
            Route::add('/login',
                    function () {
                        $controlador = new \Com\Daw2\Controllers\UsuarioController();
                        $controlador->loginProceso();
                    }
                    , 'post');
            Route::pathNotFound(
                    function () {
                        header('location: /login');
                    }
            );
            #panel control    
        } else if ($_SESSION['usuario']['id_rol'] != 5) {
            //Rutas que están disponibles para todos
            Route::add('/',
                    function () {
                        $controlador = new \Com\Daw2\Controllers\InicioController();
                        $controlador->index();
                    }
                    , 'get');
            Route::add('/session/borrar',
                    function () {
                        $controlador = new \Com\Daw2\Controllers\SessionController();
                        $controlador->destroySession();
                    }
                    , 'get');

            Route::add('/perfil',
                    function () {
                        $controlador = new \Com\Daw2\Controllers\UsuarioController();
                        $controlador->mostrarPerfil();
                    }
                    , 'get');

            # Gestion de usuarios
            if (strpos($_SESSION['permisos']['usuarios'], 'r') !== false) {
                Route::add('/usuarios',
                        function () {
                            $controlador = new \Com\Daw2\Controllers\UsuarioController();
                            $controlador->mostrarTodos();
                        }
                        , 'get');

                Route::add('/usuarios/view/([A-Za-z0-9]+)',
                        function ($id) {
                            $controlador = new \Com\Daw2\Controllers\UsuarioController();
                            $controlador->view($id);
                        }
                        , 'get');
            }
            if (strpos($_SESSION['permisos']['usuarios'], 'd') !== false) {
                Route::add('/usuarios/delete/([A-Za-z0-9]+)',
                        function ($id) {
                            $controlador = new \Com\Daw2\Controllers\UsuarioController();
                            $controlador->delete($id);
                        }
                        , 'get');
            }
            if (strpos($_SESSION['permisos']['usuarios'], 'w') !== false) {
                Route::add('/usuarios/edit/([A-Za-z0-9]+)',
                        function ($id) {
                            $controlador = new \Com\Daw2\Controllers\UsuarioController();
                            $controlador->mostrarEdit($id);
                        }
                        , 'get');

                Route::add('/usuarios/edit/([A-Za-z0-9]+)',
                        function ($id) {
                            $controlador = new \Com\Daw2\Controllers\UsuarioController();
                            $controlador->edit($id);
                        }
                        , 'post');

                Route::add('/usuarios/add',
                        function () {
                            $controlador = new \Com\Daw2\Controllers\UsuarioController();
                            $controlador->mostrarAdd();
                        }
                        , 'get');

                Route::add('/usuarios/add',
                        function () {
                            $controlador = new \Com\Daw2\Controllers\UsuarioController();
                            $controlador->add();
                        }
                        , 'post');

                Route::add('/usuarios/cant_add',
                        function () {
                            $controlador = new \Com\Daw2\Controllers\UsuarioController();
                            $controlador->cant_add();
                        }
                        , 'get');
            }

            # Gestion de productos
            if (strpos($_SESSION['permisos']['productos'], 'r') !== false) {
                Route::add('/productos',
                        function () {
                            $controlador = new \Com\Daw2\Controllers\ProductoController();
                            $controlador->mostrarTodos();
                        }
                        , 'get');

                Route::add('/productos/view/([A-Za-z0-9]+)',
                        function ($id) {
                            $controlador = new \Com\Daw2\Controllers\UsuarioController();
                            $controlador->view($id);
                        }
                        , 'get');
            }
            if (strpos($_SESSION['permisos']['productos'], 'd') !== false) {
                Route::add('/productos/delete/([A-Za-z0-9]+)',
                        function ($id) {
                            $controlador = new \Com\Daw2\Controllers\UsuarioController();
                            $controlador->delete($id);
                        }
                        , 'get');
            }
            if (strpos($_SESSION['permisos']['productos'], 'w') !== false) {
                Route::add('/productos/edit/([A-Za-z0-9]+)',
                        function ($id) {
                            $controlador = new \Com\Daw2\Controllers\UsuarioController();
                            $controlador->mostrarEdit($id);
                        }
                        , 'get');

                Route::add('/productos/edit/([A-Za-z0-9]+)',
                        function ($id) {
                            $controlador = new \Com\Daw2\Controllers\UsuarioController();
                            $controlador->edit($id);
                        }
                        , 'post');

                Route::add('/productos/add',
                        function () {
                            $controlador = new \Com\Daw2\Controllers\UsuarioController();
                            $controlador->mostrarAdd();
                        }
                        , 'get');

                Route::add('/productos/add',
                        function () {
                            $controlador = new \Com\Daw2\Controllers\UsuarioController();
                            $controlador->add();
                        }
                        , 'post');

                Route::add('/productos/cant_add',
                        function () {
                            $controlador = new \Com\Daw2\Controllers\UsuarioController();
                            $controlador->cant_add();
                        }
                        , 'get');
            }

            # Gestion de categorias
            if (strpos($_SESSION['permisos']['categorias'], 'r') !== false) {
                Route::add('/categorias',
                        function () {
                            $controlador = new \Com\Daw2\Controllers\CategoriaController();
                            $controlador->mostrarTodos();
                        }
                        , 'get');

                Route::add('/productos/view/([A-Za-z0-9]+)',
                        function ($id) {
                            $controlador = new \Com\Daw2\Controllers\UsuarioController();
                            $controlador->view($id);
                        }
                        , 'get');
            }
            if (strpos($_SESSION['permisos']['categorias'], 'd') !== false) {
                Route::add('/productos/delete/([A-Za-z0-9]+)',
                        function ($id) {
                            $controlador = new \Com\Daw2\Controllers\UsuarioController();
                            $controlador->delete($id);
                        }
                        , 'get');
            }
            if (strpos($_SESSION['permisos']['categorias'], 'w') !== false) {
                Route::add('/productos/edit/([A-Za-z0-9]+)',
                        function ($id) {
                            $controlador = new \Com\Daw2\Controllers\UsuarioController();
                            $controlador->mostrarEdit($id);
                        }
                        , 'get');

                Route::add('/productos/edit/([A-Za-z0-9]+)',
                        function ($id) {
                            $controlador = new \Com\Daw2\Controllers\UsuarioController();
                            $controlador->edit($id);
                        }
                        , 'post');

                Route::add('/productos/add',
                        function () {
                            $controlador = new \Com\Daw2\Controllers\UsuarioController();
                            $controlador->mostrarAdd();
                        }
                        , 'get');

                Route::add('/productos/add',
                        function () {
                            $controlador = new \Com\Daw2\Controllers\UsuarioController();
                            $controlador->add();
                        }
                        , 'post');

                Route::add('/productos/cant_add',
                        function () {
                            $controlador = new \Com\Daw2\Controllers\UsuarioController();
                            $controlador->cant_add();
                        }
                        , 'get');
            }


            Route::pathNotFound(
                    function () {
                        $controller = new \Com\Daw2\Controllers\ErroresController();
                        $controller->error404();
                    }
            );

            Route::methodNotAllowed(
                    function () {
                        $controller = new \Com\Daw2\Controllers\ErroresController();
                        $controller->error405();
                    }
            );
        } 
        else if ($_SESSION['usuario']['id_rol'] == 5) {
          Route::add('/',
                    function () {
                        $controlador = new \Com\Daw2\Controllers\TiendaController();
                        $controlador->index();
                    }
                    , 'get');  
        }
        Route::run();
    }

}