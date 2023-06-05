<?php

declare(strict_types=1);

namespace Com\Daw2\Models;

class ProductoModel extends \Com\Daw2\Core\BaseModel {

    function getAll() {
        $stmt = $this->pdo->query("SELECT producto.*, nombre_categoria, formato, nombre_marca FROM producto LEFT JOIN aux_categoria ON aux_categoria.id_categoria = producto.id_categoria LEFT JOIN aux_precio ON aux_precio.id = producto.id_tipo_precio  LEFT JOIN aux_marca ON aux_marca.id_marca = producto.id_marca");
        return $stmt->fetchAll();
    }    
    
    function get($id) {
        $stmt = $this->pdo->prepare("SELECT producto.*, nombre_categoria, formato, nombre_marca FROM producto LEFT JOIN aux_categoria ON aux_categoria.id_categoria = producto.id_categoria LEFT JOIN aux_precio ON aux_precio.id = producto.id_tipo_precio LEFT JOIN aux_marca ON aux_marca.id_marca = producto.id_marca WHERE producto.id=?");
        $stmt->execute([$id]);
        return $stmt->fetchAll()[0];
    }  
    
    public function insert(array $data) : int{
        $sql = "INSERT INTO producto (nombre, descripcion, precio, descuento, stock, id_marca , id_categoria, id_tipo_precio ) VALUES(:nombre, :descripcion, :precio, :descuento, :stock, :marca, :categoria, :tipo)";
        $stmt = $this->pdo->prepare($sql);
        unset($data['enviar']);
        unset($data['imagen']);
        unset($data['peso']);
        var_dump($data);
        if($stmt->execute($data)){
            return (int) $this->pdo->lastInsertId();
        }
        else{
            return -1;
        }

    }
    
    public function delete(string $id) : bool{
        $stmt = $this->pdo->prepare("DELETE FROM producto WHERE id = ?");       
        if($stmt->execute([$id]) && $stmt->rowCount() == 1){
           return true;
        } 
        else{
            return false;
        }
    }
    
    


}
