<?php

declare(strict_types=1);

namespace Com\Daw2\Models;

class PedidoModel extends \Com\Daw2\Core\BaseModel {

    function count() {
        $stmt = $this->pdo->query("SELECT COUNT(id_pedido) as count FROM historial_pedido");
        return $stmt->fetchAll()[0]['count'];
    }
    
    function ventas() {
        $stmt = $this->pdo->query("SELECT COUNT(id_pedido) as count FROM historial_pedido");
        return $stmt->fetchAll()[0]['count'];
    }
    
    function comprar($carrito, $usuario, $direccion) {
        $stmt = $this->pdo->prepare("INSERT INTO `historial_pedido` (`id_pedido`, `id_usuario`, `id_estado`, `fecha`, `direccion`) VALUES (NULL, ?, '4', current_timestamp(), ?);");
        $stmt->execute([$usuario,$direccion]);
        $idPedido = $this->pdo->lastInsertId();
        foreach ($carrito as $item) {
            $stmt = $this->pdo->prepare("INSERT INTO `historial_ventas` (`id`, `id_producto`, `precio`, `cantidad`, `id_pedido`) VALUES (NULL, ?, ?, ?, ?);");
            $stmt->execute([$item['producto']['id'],$item['producto']['precio'],$item['cantidad'],$idPedido]);
        }        
    }

    
}
