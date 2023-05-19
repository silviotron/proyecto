<?php

declare(strict_types=1);

namespace Com\Daw2\Models;

class RolModel extends \Com\Daw2\Core\BaseModel {

    function getAll(): array {
        $stmt = $this->pdo->query('SELECT * FROM aux_rol');
        return $stmt->fetchAll();
    }

    function get($idRol): bool {
        $stmt = $this->pdo->prepare("SELECT * FROM aux_rol WHERE id_rol=?");
        $stmt->execute([$idRol]);
        return $stmt->rowCount() == 0;
    }

}
