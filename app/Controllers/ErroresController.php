<?php
declare(strict_types = 1);
namespace Com\Daw2\Controllers;

class ErroresController extends \Com\Daw2\Core\BaseController {
    
    function error404() : void{
       http_response_code(404);
       $data = ['titulo' => '404'];
       $data['texto'] = "La página no existe.";
       $this->view->show('error.php' , $data);
       //$this->view->showViews(array('templates/header.view.php','templates/left-menu.view.php', 'error.view.php', 'templates/footer.view.php') , $data);
    }
    
    function error405() : void{
       http_response_code(405);
       $data = ['titulo' => '405'];
       $data['texto'] = 'Metodo no permitido.';       
        $this->view->show('error.php' , $data);
       //$this->view->showViews(array('templates/header.view.php','templates/left-menu.view.php', 'error.view.php', 'templates/footer.view.php') , $data);

    }
}