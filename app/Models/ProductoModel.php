<?php

declare(strict_types=1);

namespace Com\Daw2\Models;

class ProductoModel extends \Com\Daw2\Core\BaseModel {

    function getAll() {
        $stmt = $this->pdo->query("SELECT producto.*, nombre_categoria, nombre_familia, formato FROM producto LEFT JOIN aux_categoria ON aux_categoria.id_categoria = producto.id_categoria LEFT JOIN aux_familia ON aux_familia.id_familia = aux_categoria.id_familia LEFT JOIN aux_precio ON aux_precio.id = producto.id_tipo_precio");
        return $stmt->fetchAll();
    }    


}
