<?php

declare(strict_types=1);

namespace Com\Daw2\Models;

class UsuarioModel extends \Com\Daw2\Core\BaseModel {
    
    private const SELECT_SIMPLE = 'SELECT * FROM usuario';
    private const FROM = 'FROM usuario LEFT JOIN aux_estado_usuario ON aux_estado_usuario.id_estado = usuario.id_estado LEFT JOIN aux_rol ON aux_rol.id_rol = usuario.id_rol';
    private const SELECT_FROM = 'SELECT usuario.*, nombre_estado, aux_rol.nombre_rol ' . self::FROM;
    private const COUNT_FROM = 'SELECT COUNT(*) as total ' . self::FROM;
    private const FIELDS_ORDER = ['id', 'nombre', 'email', 'apellido', 'ultima_sesion'];
    private const ORDER_DEFECTO = 0;

    function login($email, $pass) {
        $stmt = $this->pdo->prepare(self::SELECT_FROM." WHERE usuario.email=?");
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

    function existsEmail($email): bool {
        $stmt = $this->pdo->prepare(self::SELECT_SIMPLE." WHERE usuario.email=?");
        $stmt->execute([$email]);
        return $stmt->rowCount() > 0;
    }

    function getAll(): array {
        $stmt = $this->pdo->query(self::SELECT_FROM);
        return $stmt->fetchAll();
    }

    function get(string $id) {
        $stmt = $this->pdo->prepare(self::SELECT_FROM . " WHERE usuario.id_usuario=?");
        $stmt->execute([$id]);
        return $stmt->fetchAll()[0];
    }
    


    public function insert(array $data): int {
        $sql = "INSERT INTO usuario (email, pass, id_rol, nombre, apellido, telefono , id_estado, direccion ) VALUES(:email, :pass, :rol, :nombre, :apellido, :telefono, :estado, :direccion)";
        $stmt = $this->pdo->prepare($sql);
        unset($data['enviar']);
        unset($data['imagen']);
        $data['pass'] = password_hash($data['pass'], PASSWORD_DEFAULT);
        var_dump($data);
        if ($stmt->execute($data)) {
            return (int) $this->pdo->lastInsertId();
        } else {
            return -1;
        }
    }

  
    public function delete(string $id): bool {
        $stmt = $this->pdo->prepare("DELETE FROM usuario WHERE id_usuario = ?");
        if ($stmt->execute([$id]) && $stmt->rowCount() == 1) {
            return true;
        } else {
            return false;
        }
    }

    function filterByString(string $stringValue, string $column): array {
        $stmt = $this->pdo->prepare(self::SELECT_FROM . " WHERE usuario.$column LIKE ?");
        $likeString = "%$string%";
        $stmt->execute([$likeString]);
        return $stmt->fetchAll();
    }

    function filterByNombre(string $string): array {
        return filterByString($string, "nombre");
    }

    function filterByApellido(string $string): array {
        return filterByString($string, "apellido");
    }

    function filterByEmail(string $string): array {
        return filterByString($string, "email");
    }

    function filterByEstado(int $estado): array {
        $stmt = $this->pdo->prepare(self::SELECT_FROM . ' WHERE usuario.id_estado = ?');
        $stmt->execute([$estado]);
        return $stmt->fetchAll();
    }

    function filterByRoles(array $roles): array {
        $rolesInt = [];
        foreach ($roles as $rol) {
            if (filter_var($rol, FILTER_VALIDATE_INT)) {
                $rolesInt[] = (int) $rol;
            }
        }
        if (count($rolesInt) > 0) {
            $queryRoles = implode(",", $rolesInt);
            $sql = self::SELECT_FROM . " WHERE usuario.id_rol IN ($queryRoles)";
            $stmt = $this->pdo->query($sql);
            return $stmt->fetchAll();
        } else {
            return $this->getAll();
        }
    }

    function getAllOrdenados(string $columna, bool $asc): array {
        $stmt = $this->pdo->query(self::SELECT_FROM . " ORDER BY $columna " . $asc ? "ASC" : "DESC");
        return $stmt->fetchAll();
    }

    function filter(array $filtros): array {
        $condiciones = [];
        $parametros = [];

        if (isset($filtros['rol']) && is_array($filtros['rol'])) {
            $contador = 1;
            $condicionesRol = [];
            foreach ($filtros['rol'] as $rol) {
                if (filter_var($rol, FILTER_VALIDATE_INT)) {
                    $condicionesRol[] = ':rol' . $contador;
                    $parametros['rol' . $contador] = $rol;
                    $contador++;
                }
            }
            if (count($parametros) > 0) {
                $condiciones[] = 'usuario.id_rol IN (' . implode(',', $condicionesRol) . ')';
            }
        }
        if (isset($filtros['username']) && !empty($filtros['username'])) {
            $condiciones[] = 'usuario.username LIKE :username';
            $parametros['username'] = '%' . $filtros['username'] . '%';
        }
        if (isset($filtros['min_salar']) && is_numeric($filtros['min_salar'])) {
            $condiciones[] = 'salarioBruto >= :min_salar';
            $parametros['min_salar'] = $filtros['min_salar'];
        }
        if (isset($filtros['max_salar']) && is_numeric($filtros['max_salar'])) {
            $condiciones[] = 'salarioBruto <= :max_salar';
            $parametros['max_salar'] = $filtros['max_salar'];
        }
        if (isset($filtros['min_retencion']) && is_numeric($filtros['min_retencion'])) {
            $condiciones[] = 'retencionIRPF >= :min_retencion';
            $parametros['min_retencion'] = $filtros['min_retencion'];
        }
        if (isset($filtros['max_retencion']) && is_numeric($filtros['max_retencion'])) {
            $condiciones[] = 'retencionIRPF <= :max_retencion';
            $parametros['max_retencion'] = $filtros['max_retencion'];
        }
        return array(
            'condiciones' => $condiciones,
            'parametros' => $parametros
        );
    }

    function get3(array $filtros, int $tamPag): array {

        $procesado = $this->filter($filtros);

        $condiciones = $procesado['condiciones'];
        $parametros = $procesado['parametros'];
        /*
         * Ordenamos 
         */
        if (isset($filtros['order']) && filter_var($filtros['order'], FILTER_VALIDATE_INT)) {
            if ($filtros['order'] <= count(self::FIELDS_ORDER) && $filtros['order'] >= 1) {
                $fieldOrder = self::FIELDS_ORDER[$filtros['order'] - 1];
            } else {
                $_GET['order'] = self::ORDER_DEFECTO;
                $fieldOrder = self::FIELDS_ORDER[self::ORDER_DEFECTO];
            }
        } else {
            $_GET['order'] = self::ORDER_DEFECTO;
            $fieldOrder = self::FIELDS_ORDER[self::ORDER_DEFECTO];
        }

        $pagina = (isset($filtros['page']) && filter_var($filtros['page'], FILTER_VALIDATE_INT) && $filtros['page'] > 0) ? (int) $filtros['page'] : 1;
        $registroInicial = ($pagina - 1) * $tamPag;
        $limit = "LIMIT $registroInicial, $tamPag";

        if (count($parametros) > 0) {
            $sql = self::SELECT_FROM . ' WHERE ' . implode(" AND ", $condiciones) . " ORDER BY $fieldOrder $limit";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($parametros);
            return $stmt->fetchAll();
        } else {
            $stmt = $this->pdo->query(self::SELECT_FROM . " ORDER BY $fieldOrder $limit");
            return $stmt->fetchAll();
        }
    }

    function count(array $filtros): int {
        $procesado = $this->filter($filtros);

        $condiciones = $procesado['condiciones'];
        $parametros = $procesado['parametros'];

        if (count($parametros) > 0) {
            $sql = self::COUNT_FROM . ' WHERE ' . implode(" AND ", $condiciones);
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($parametros);
            $res = $stmt->fetchAll();
            return $res[0]['total'];
        } else {
            $stmt = $this->pdo->query(self::COUNT_FROM);
            $res = $stmt->fetchAll();
            return $res[0]['total'];
        }
    }

    /*
     * Mejor otra opción
     */

    function get2(array $filtros, bool $contar = false): array {
        $condiciones = [];
        $parametros = [];
        if (isset($filtros['rol']) && is_array($filtros['rol'])) {
            $contador = 1;
            $condicionesRol = [];
            foreach ($filtros['rol'] as $rol) {
                if (filter_var($rol, FILTER_VALIDATE_INT)) {
                    $condicionesRol[] = ':rol' . $contador;
                    $parametros['rol' . $contador] = $rol;
                    $contador++;
                }
            }
            if (count($parametros) > 0) {
                $condiciones[] = 'usuario.id_rol IN (' . implode(',', $condicionesRol) . ')';
            }
        }
        if (isset($filtros['username']) && !empty($filtros['username'])) {
            $condiciones[] = 'usuario.username LIKE :username';
            $parametros['username'] = '%' . $filtros['username'] . '%';
        }
        if (isset($filtros['min_salar']) && is_numeric($filtros['min_salar'])) {
            $condiciones[] = 'salarioBruto >= :min_salar';
            $parametros['min_salar'] = $filtros['min_salar'];
        }
        if (isset($filtros['max_salar']) && is_numeric($filtros['max_salar'])) {
            $condiciones[] = 'salarioBruto <= :max_salar';
            $parametros['max_salar'] = $filtros['max_salar'];
        }
        if (isset($filtros['min_retencion']) && is_numeric($filtros['min_retencion'])) {
            $condiciones[] = 'retencionIRPF >= :min_retencion';
            $parametros['min_retencion'] = $filtros['min_retencion'];
        }
        if (isset($filtros['max_retencion']) && is_numeric($filtros['max_retencion'])) {
            $condiciones[] = 'retencionIRPF <= :max_retencion';
            $parametros['max_retencion'] = $filtros['max_retencion'];
        }
        /*
         * Ordenamos 
         */
        if (isset($filtros['order']) && filter_var($filtros['order'], FILTER_VALIDATE_INT)) {
            if ($filtros['order'] <= count(self::FIELDS_ORDER) && $filtros['order'] >= 1) {
                $fieldOrder = self::FIELDS_ORDER[$filtros['order'] - 1];
            } else {
                $_GET['order'] = self::ORDER_DEFECTO;
                $fieldOrder = self::FIELDS_ORDER[self::ORDER_DEFECTO];
            }
        } else {
            $_GET['order'] = self::ORDER_DEFECTO;
            $fieldOrder = self::FIELDS_ORDER[self::ORDER_DEFECTO];
        }

        if (!$contar) {
            if (count($parametros) > 0) {
                $sql = self::SELECT_FROM . ' WHERE ' . implode(" AND ", $condiciones) . " ORDER BY $fieldOrder";
                $stmt = $this->pdo->prepare($sql);
                $stmt->execute($parametros);
                return $stmt->fetchAll();
            } else {
                $stmt = $this->pdo->query(self::SELECT_FROM . " ORDER BY $fieldOrder");
                return $stmt->fetchAll();
            }
        } else {
            if (count($parametros) > 0) {
                $sql = self::COUNT_FROM . ' WHERE ' . implode(" AND ", $condiciones);
                $stmt = $this->pdo->prepare($sql);
                $stmt->execute($parametros);
                return $stmt->fetchAll();
            } else {
                $stmt = $this->pdo->query(self::COUNT_FROM);
                return $stmt->fetchAll();
            }
        }
    }

}
