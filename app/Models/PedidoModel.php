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
    function total() {
        $stmt = $this->pdo->query("SELECT SUM(precio*cantidad) as total FROM historial_ventas");
        return $stmt->fetchAll()[0]['total'];
    }
    function producto($id)  {
        $stmt = $this->pdo->prepare("SELECT COUNT(id_producto) as count FROM historial_ventas WHERE id_producto=?");
        $stmt->execute([$id]);
        return $stmt->fetchAll()[0]['count'];
    }
    function usuario($id)  {
        $stmt = $this->pdo->prepare("SELECT COUNT(id_usuario) as count FROM historial_pedido WHERE id_usuario=?");
        $stmt->execute([$id]);
        return $stmt->fetchAll()[0]['count'];
    }

    function comprar($carrito, $usuario, $direccion) {
        $stmt = $this->pdo->prepare("INSERT INTO `historial_pedido` (`id_pedido`, `id_usuario`, `id_estado`, `fecha`, `direccion`) VALUES (NULL, ?, '4', current_timestamp(), ?);");
        $stmt->execute([$usuario, $direccion]);
        $idPedido = $this->pdo->lastInsertId();
        foreach ($carrito as $item) {
            $model = new \Com\Daw2\Models\ProductoModel();
            if ($model->restarStock($item['producto']['id'], $item['cantidad'])) {
                $stmt = $this->pdo->prepare("INSERT INTO `historial_ventas` (`id`, `id_producto`, `precio`, `cantidad`, `id_pedido`) VALUES (NULL, ?, ?, ?, ?);");
                $stmt->execute([$item['producto']['id'], $item['producto']['precio'], $item['cantidad'], $idPedido]);
                return true;
            } else {
                return false;
            }
        }
    }

}
