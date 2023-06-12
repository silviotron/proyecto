<?php

declare(strict_types=1);

namespace Com\Daw2\Models;

class CategoriaModel extends \Com\Daw2\Core\BaseModel {

    function getAll(): array {
        $stmt = $this->pdo->query('SELECT * FROM aux_categoria');
        return $stmt->fetchAll();
    }

    function get(string $id): array {
        $stmt = $this->pdo->prepare('SELECT * FROM aux_categoria WHERE id_categoria=?');
        $stmt->execute([$id]);
        return $stmt->fetchAll()[0];
    }

    function exists(string $id): bool {
        $stmt = $this->pdo->prepare('SELECT id_categoria FROM aux_categoria WHERE id_categoria=?');
        $stmt->execute([$id]);
        return !empty($stmt->fetchAll());
    }

    function existsNombre(string $nombre): bool {
        $stmt = $this->pdo->prepare('SELECT id_categoria FROM aux_categoria WHERE nombre_categoria=?');
        $stmt->execute([$nombre]);
        return !empty($stmt->fetchAll());
    }

    function existsNombreEdit(string $id, string $nombre): bool {
        $stmt = $this->pdo->prepare('SELECT id_categoria FROM aux_categoria WHERE nombre_categoria=? AND id_categoria!=?');
        $stmt->execute([$nombre, $id]);
        return !empty($stmt->fetchAll());
    }

    function size(): int {
        $stmt = $this->pdo->query('SELECT * FROM aux_categoria');
        return count($stmt->fetchAll());
    }

    function getNombreCategoria(string $id): array {
        $stmt = $this->pdo->prepare('SELECT nombre_categoria FROM aux_categoria WHERE id_categoria=?');
        $stmt->execute([$id]);
        return $stmt->fetchAll();
    }

    function delete(string $id): int {
        try { #if there are products enroled to the provider returns 0
            $stmt = $this->pdo->prepare('UPDATE producto SET id_categoria=0 WHERE id_categoria=?');
            $stmt->execute([$id]);
            $stmt = $this->pdo->prepare('SELECT * FROM producto WHERE id_categoria=?');
            $stmt->execute([$id]);
            if ($stmt->rowCount() > 0) {
                return 0;
            } else { #if everything was ok return 1
                $stmt = $this->pdo->prepare('DELETE FROM aux_categoria WHERE id_categoria=?');
                $stmt->execute([$id]);
                if ($stmt->rowCount() == 1) {
                    return 1;
                }
            }
        } catch (PDOException $exception) { #if an exception happens return a -1
            return -1;
        }
    }

    function add(string $nombre): bool {
        try {
            $stmt = $this->pdo->prepare('INSERT INTO aux_categoria(nombre_categoria) values (?)');
            return $stmt->execute([$id]);
        } catch (\PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    function edit(string $id, string $nombre): bool {
        try {
            $stmt = $this->pdo->prepare('UPDATE aux_categoria SET nombre_categoria=? WHERE id_categoria=?');
            return $stmt->execute([$nombre, $id]);
        } catch (PDOException $ex) {
            echo "cant update for some reason: " . $ex->getMossage();
            return false;
        }
    }

    public function insert(string $nombre): int {
        $sql = 'INSERT INTO aux_categoria(nombre_categoria) values (?)';
        $stmt = $this->pdo->prepare($sql);
        if ($stmt->execute([$nombre])) {
            return (int) $this->pdo->lastInsertId();
        } else {
            return -1;
        }
    }

}
