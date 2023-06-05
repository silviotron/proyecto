<?php

declare(strict_types=1);

namespace Com\Daw2\Models;

class EstadoModel extends \Com\Daw2\Core\BaseModel {

    function getAll(): array {
        $stmt = $this->pdo->query('SELECT * FROM aux_estado_usuario');
        return $stmt->fetchAll();
    }

    function exist($idRol): bool {
        $stmt = $this->pdo->prepare("SELECT * FROM aux_estado_usuario WHERE id_estado=?");
        $stmt->execute([$idRol]);
        return $stmt->rowCount() != 0;
    }

}
