<?php

declare(strict_types=1);

namespace Com\Daw2\Models;

class PedidoModel extends \Com\Daw2\Core\BaseModel {

    function count() {
        $stmt = $this->pdo->query("SELECT COUNT(id_pedido) as count FROM historial_pedido");
        return $stmt->fetchAll()[0]['count'];
    }
    //TODO
    function ventas() {
        $stmt = $this->pdo->query("SELECT COUNT(id_pedido) as count FROM historial_pedido");
        return $stmt->fetchAll()[0]['count'];
    }

    
}
