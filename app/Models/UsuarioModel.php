<?php

declare(strict_types=1);

namespace Com\Daw2\Models;

class UsuarioModel extends \Com\Daw2\Core\BaseModel {

    function login($email, $pass) {
        $stmt = $this->pdo->prepare("SELECT usuario.*, nombre_estado, nombre_rol FROM usuario LEFT JOIN aux_estado_usuario ON aux_estado_usuario.id_estado = usuario.id_estado LEFT JOIN aux_rol ON aux_rol.id_rol = usuario.id_rol WHERE usuario.email=?");
        $stmt->execute([$email]);
        if ($stmt->rowCount() > 0) {
            $userData = $stmt->fetchAll()[0];
            if (password_verify($pass, $userData['pass'])) {
                unset($userData['pass']);
                return $userData;
            }
        }
        return null;
    }

    function userDateUpdate($id) {
        $stmt = $this->pdo->prepare("UPDATE usuario SET ultima_sesion = CURRENT_TIMESTAMP WHERE id_usuario=?");
        $stmt->execute([$id]);
    }

    function getAll() {
        $stmt = $this->pdo->query("SELECT usuario.*, nombre_estado, nombre_rol FROM usuario LEFT JOIN aux_estado_usuario ON aux_estado_usuario.id_estado = usuario.id_estado LEFT JOIN aux_rol ON aux_rol.id_rol = usuario.id_rol");
        return $stmt->fetchAll();
    }    
    function checkEmail($email) :bool{
        $stmt = $this->pdo->prepare("SELECT * FROM usuario WHERE usuario.email=?");
        $stmt->execute([$email]);
        return $stmt->rowCount() == 0;        
    }
    
    //TODO: funcion add

}
