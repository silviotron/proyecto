<?php

namespace Com\Daw2\Core;

use Steampixel\Route;

class FrontController {

    static function main() {
        session_start();
        if (!isset($_SESSION['usuario']) || $_SESSION['usuario']['id_rol'] == 5) {
            if (!isset($_SESSION['usuario'])) {
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
            }
            Route::add('/',
                    function () {
                        $controlador = new \Com\Daw2\Controllers\TiendaController();
                        $controlador->index();
                    }
                    , 'get');

            Route::add('/tienda',
                    function () {
                        $controlador = new \Com\Daw2\Controllers\TiendaController();
                        $controlador->shop();
                    }
                    , 'get');
            Route::add('/tienda/([A-Za-z0-9]+)',
                    function ($categoria) {
                        $controlador = new \Com\Daw2\Controllers\TiendaController();
                        $controlador->shop($categoria);
                    }
                    , 'get');
            Route::add('/tienda/producto/([A-Za-z0-9]+)',
                    function ($id) {
                        $controlador = new \Com\Daw2\Controllers\TiendaController();
                        $controlador->details($id);
                    }
                    , 'get');
            Route::add('/tienda/categoria/([A-Za-z0-9]+)',
                    function ($id) {
                        $controlador = new \Com\Daw2\Controllers\TiendaController();
                        $controlador->categoria($id);
                    }
                    , 'get');
            Route::add('/carrito',
                    function () {
                        $controlador = new \Com\Daw2\Controllers\CarritoController();
                        $controlador->cart();
                    }
                    , 'get');

            Route::add('/carrito/add/([A-Za-z0-9]+)',
                    function ($id) {
                        $controlador = new \Com\Daw2\Controllers\CarritoController();
                        $controlador->add($id);
                    }
                    , 'post');
            Route::add('/carrito/add/([A-Za-z0-9]+)',
                    function ($id) {
                        $controlador = new \Com\Daw2\Controllers\CarritoController();
                        $controlador->add($id);
                    }
                    , 'get');
            Route::add('/carrito/remove/([A-Za-z0-9]+)',
                    function ($id) {
                        $controlador = new \Com\Daw2\Controllers\CarritoController();
                        $controlador->remove($id);
                    }
                    , 'get');
            Route::add('/carrito/sumar/([A-Za-z0-9]+)',
                    function ($id) {
                        $controlador = new \Com\Daw2\Controllers\CarritoController();
                        $controlador->sumar($id);
                    }
                    , 'get');
            Route::add('/carrito/restar/([A-Za-z0-9]+)',
                    function ($id) {
                        $controlador = new \Com\Daw2\Controllers\CarritoController();
                        $controlador->restar($id);
                    }
                    , 'get');
            Route::add('/carrito/comprar',
                    function () {
                        $controlador = new \Com\Daw2\Controllers\CarritoController();
                        $controlador->comprar();
                    }
                    , 'post');

            Route::pathNotFound(
                    function () {
                        header('location: /');
                    }
            );
            Route::add('/session/borrar',
                    function () {
                        $controlador = new \Com\Daw2\Controllers\SessionController();
                        $controlador->destroySession();
                    }
                    , 'get');
            #panel control    
        } else if ($_SESSION['usuario']['id_rol'] != 5) {
            //Rutas que están disponibles para todos
            Route::add('/',
                    function () {
                        $controlador = new \Com\Daw2\Controllers\InicioController();
                        $controlador->index();
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
                            $controlador = new \Com\Daw2\Controllers\ProductoController();
                            $controlador->view($id);
                        }
                        , 'get');
            }
            if (strpos($_SESSION['permisos']['productos'], 'd') !== false) {
                Route::add('/productos/delete/([A-Za-z0-9]+)',
                        function ($id) {
                            $controlador = new \Com\Daw2\Controllers\ProductoController();
                            $controlador->delete($id);
                        }
                        , 'get');
            }
            if (strpos($_SESSION['permisos']['productos'], 'w') !== false) {
                Route::add('/productos/edit/([A-Za-z0-9]+)',
                        function ($id) {
                            $controlador = new \Com\Daw2\Controllers\ProductoController();
                            $controlador->mostrarEdit($id);
                        }
                        , 'get');

                Route::add('/productos/edit/([A-Za-z0-9]+)',
                        function ($id) {
                            $controlador = new \Com\Daw2\Controllers\ProductoController();
                            $controlador->edit($id);
                        }
                        , 'post');

                Route::add('/productos/add',
                        function () {
                            $controlador = new \Com\Daw2\Controllers\ProductoController();
                            $controlador->mostrarAdd();
                        }
                        , 'get');

                Route::add('/productos/add',
                        function () {
                            $controlador = new \Com\Daw2\Controllers\ProductoController();
                            $controlador->add();
                        }
                        , 'post');

                Route::add('/productos/cant_add',
                        function () {
                            $controlador = new \Com\Daw2\Controllers\ProductoController();
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

                Route::add('/categorias/view/([A-Za-z0-9]+)',
                        function ($id) {
                            $controlador = new \Com\Daw2\Controllers\CategoriaController();
                            $controlador->view($id);
                        }
                        , 'get');
            }
            if (strpos($_SESSION['permisos']['categorias'], 'd') !== false) {
                Route::add('/categorias/delete/([A-Za-z0-9]+)',
                        function ($id) {
                            $controlador = new \Com\Daw2\Controllers\CategoriaController();
                            $controlador->delete($id);
                        }
                        , 'get');
            }
            if (strpos($_SESSION['permisos']['categorias'], 'w') !== false) {
                Route::add('/categorias/edit/([A-Za-z0-9]+)',
                        function ($id) {
                            $controlador = new \Com\Daw2\Controllers\CategoriaController();
                            $controlador->mostrarEdit($id);
                        }
                        , 'get');

                Route::add('/categorias/edit/([A-Za-z0-9]+)',
                        function ($id) {
                            $controlador = new \Com\Daw2\Controllers\CategoriaController();
                            $controlador->edit($id);
                        }
                        , 'post');

                Route::add('/categorias/add',
                        function () {
                            $controlador = new \Com\Daw2\Controllers\CategoriaController();
                            $controlador->mostrarAdd();
                        }
                        , 'get');

                Route::add('/categorias/add',
                        function () {
                            $controlador = new \Com\Daw2\Controllers\CategoriaController();
                            $controlador->add();
                        }
                        , 'post');

                Route::add('/categorias/cant_add',
                        function () {
                            $controlador = new \Com\Daw2\Controllers\CategoriaController();
                            $controlador->cant_add();
                        }
                        , 'get');
            }

            # Gestion de marcas
            if (strpos($_SESSION['permisos']['marcas'], 'r') !== false) {
                Route::add('/marcas',
                        function () {
                            $controlador = new \Com\Daw2\Controllers\MarcaController();
                            $controlador->mostrarTodos();
                        }
                        , 'get');

                Route::add('/marcas/view/([A-Za-z0-9]+)',
                        function ($id) {
                            $controlador = new \Com\Daw2\Controllers\MarcaController();
                            $controlador->view($id);
                        }
                        , 'get');
            }
            if (strpos($_SESSION['permisos']['marcas'], 'd') !== false) {
                Route::add('/marcas/delete/([A-Za-z0-9]+)',
                        function ($id) {
                            $controlador = new \Com\Daw2\Controllers\MarcaController();
                            $controlador->delete($id);
                        }
                        , 'get');
            }
            if (strpos($_SESSION['permisos']['marcas'], 'w') !== false) {
                Route::add('/marcas/edit/([A-Za-z0-9]+)',
                        function ($id) {
                            $controlador = new \Com\Daw2\Controllers\MarcaController();
                            $controlador->mostrarEdit($id);
                        }
                        , 'get');

                Route::add('/marcas/edit/([A-Za-z0-9]+)',
                        function ($id) {
                            $controlador = new \Com\Daw2\Controllers\MarcaController();
                            $controlador->edit($id);
                        }
                        , 'post');

                Route::add('/marcas/add',
                        function () {
                            $controlador = new \Com\Daw2\Controllers\MarcaController();
                            $controlador->mostrarAdd();
                        }
                        , 'get');

                Route::add('/marcas/add',
                        function () {
                            $controlador = new \Com\Daw2\Controllers\MarcaController();
                            $controlador->add();
                        }
                        , 'post');

                Route::add('/marcas/cant_add',
                        function () {
                            $controlador = new \Com\Daw2\Controllers\MarcaController();
                            $controlador->cant_add();
                        }
                        , 'get');
            }

            Route::add('/session/borrar',
                    function () {
                        $controlador = new \Com\Daw2\Controllers\SessionController();
                        $controlador->destroySession();
                    }
                    , 'get');

            Route::pathNotFound(
                    function () {
                        header('location: /');
                    }
            );
        }
        Route::run();
    }

}
