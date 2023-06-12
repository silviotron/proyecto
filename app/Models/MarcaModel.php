<?php

declare(strict_types=1);

namespace Com\Daw2\Models;

class MarcaModel extends \Com\Daw2\Core\BaseModel {

    function getAll(): array {
        $stmt = $this->pdo->query('SELECT * FROM aux_marca');
        return $stmt->fetchAll();
    }

    function get(string $id): array {
        $stmt = $this->pdo->prepare('SELECT * FROM aux_marca WHERE id_marca=?');
        $stmt->execute([$id]);
        return $stmt->fetchAll()[0];
    }

    function exists(string $id): bool {
        $stmt = $this->pdo->prepare('SELECT id_marca FROM aux_marca WHERE id_marca=?');
        $stmt->execute([$id]);
        return !empty($stmt->fetchAll());
    }

    function existsNombre(string $nombre): bool {
        $stmt = $this->pdo->prepare('SELECT id_marca FROM aux_marca WHERE nombre_marca=?');
        $stmt->execute([$nombre]);
        return !empty($stmt->fetchAll());
    }

    function existsNombreEdit(string $id, string $nombre): bool {
        $stmt = $this->pdo->prepare('SELECT id_marca FROM aux_marca WHERE nombre_marca=? AND id_marca!=?');
        $stmt->execute([$nombre, $id]);
        return !empty($stmt->fetchAll());
    }

    function size(): int {
        $stmt = $this->pdo->query('SELECT * FROM aux_marca');
        return count($stmt->fetchAll());
    }

    function getNombreMarca(string $id): array {
        $stmt = $this->pdo->prepare('SELECT nombre_marca FROM aux_marca WHERE id_marca=?');
        $stmt->execute([$id]);
        return $stmt->fetchAll();
    }

    function delete(string $id): int {
        try { #if there are products enroled to the provider returns 0
            $stmt = $this->pdo->prepare('UPDATE producto SET id_marca=0 WHERE id_marca=?');
            $stmt->execute([$id]);
            $stmt = $this->pdo->prepare('SELECT * FROM producto WHERE id_marca=?');
            $stmt->execute([$id]);
            if ($stmt->rowCount() > 0) {
                return 0;
            } else { #if everything was ok return 1
                $stmt = $this->pdo->prepare('DELETE FROM aux_marca WHERE id_marca=?');
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
            $stmt = $this->pdo->prepare('INSERT INTO aux_marca(nombre_marca) values (?)');
            return $stmt->execute([$id]);
        } catch (\PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    function edit(string $id, string $nombre): bool {
        try {
            $stmt = $this->pdo->prepare('UPDATE aux_marca SET nombre_marca=? WHERE id_marca=?');
            return $stmt->execute([$nombre, $id]);
        } catch (PDOException $ex) {
            echo "cant update for some reason: " . $ex->getMossage();
            return false;
        }
    }

    public function insert(string $nombre): int {
        $sql = 'INSERT INTO aux_marca(nombre_marca) values (?)';
        $stmt = $this->pdo->prepare($sql);
        if ($stmt->execute([$nombre])) {
            return (int) $this->pdo->lastInsertId();
        } else {
            return -1;
        }
    }

}
