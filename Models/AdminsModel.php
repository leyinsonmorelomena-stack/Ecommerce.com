<?php

require_once __DIR__. '/Conexion.php';

class AdminsModel{
    //Login
    public static function findByEmail(string $email){
        $consultaSql = "SELECT
                                id_administrador,
                                nombre_administrador,
                                email_administrador,
                                password_administrador
                        FROM administradores
                        WHERE email_administrador = :email_administrador
                        LIMIT 1";
        
        try{
            $stmt = Conexion::pdo()->prepare($consultaSql);

            $stmt->bindParam(":email_administrador", $email, PDO::PARAM_STR);

            $stmt->execute();
            $administrador = $stmt->fetch(PDO::FETCH_ASSOC);
            return $administrador ?: null;

        }catch(PDOException $e){
            error_log("Error en findByEmail: " .$e->getMessage());
            return null;
        }
    }


    //Crear administrador
    public static function create(array $data): ?int{
        try{
            $pdo = Conexion::pdo();

            //Normalizacion y defaults
            $nombre = trim((string)($data['nombre_administrador'] ?? ''));
            $email = trim(mb_strtolower((string)($data['email_administrador'] ?? '')));
            $password = trim((string)($data['password_administrador'] ?? ''));
            //$passwordConfirm = trim((string)($_POST['password_confirm_administrador'] ?? ''));
            $rol = trim((string)($data['rol_administrador'] ?? 'administrador'));
            $isActive = (int)($data['is_active'] ?? 1);


            if($nombre === '' || $email === '' || $password === ''){
                return null;
            }

            $sql = "INSERT INTO administradores
                    (
                        nombre_administrador,
                        email_administrador,
                        password_administrador,
                        rol_administrador,
                        is_active_administrador
                    ) VALUES
                    (
                        :nombre,
                        :email,
                        :password,
                        :rol,
                        :is_active
                    )";

                    $stmt = $pdo->prepare($sql);
                    $stmt->bindValue(':nombre',      $nombre, PDO::PARAM_STR);
                    $stmt->bindValue(':email',       $email, PDO::PARAM_STR);
                    $stmt->bindValue(':password',    $password, PDO::PARAM_STR);
                    $stmt->bindValue(':rol',         $rol, PDO::PARAM_STR);
                    $stmt->bindValue(':is_active',   $isActive, PDO::PARAM_INT);

                if(!$stmt->execute()){
                    return null;
                }

                $id = (int)$pdo->lastInsertId();
                return $id > 0 ? $id : null;

        }catch(PDOException $e){
            if((int)$e->getCode() === 23000){
                error_log("AdminsModel::create: - Email duplicado: {$email}");
            }else{
                error_log("Error en AdminModel::create: " . $e->getMessage());
            }

            return null;
        }
    }


    //datatable
    public static function getDataTable(array $params): array{
        $pdo = Conexion::pdo();

        $start = isset($params['start']) ? max(0,(int)$params['start']) : 0;
        $length = isset($params['length']) ? max(1,(int)$params['length']) : 0;
        $search = trim($params['search'] ?? '');
        $orderCol = $params['orderCol'] ?? 'id_administrador';
        $orderDir = strtoupper($params['orderDir'] ?? 'ASC') === 'DESC' ? 'DESC' : 'ASC';

        $allowed = [
            'id_administrador',
            'nombre_administrador',
            'email_administrador',
            'rol_administrador',
            'ultimo_login_administrador'
        ];

        if (!in_array($orderCol, $allowed, true)) $orderCol = 'id_administrador';

        //filtro
        $where = '';
        $bind = [];
        if ($search !== ''){
            $where = "WHERE nombre_administrador LIKE :s1 OR email_administrador LIKE :s2";
            $bind[':s1'] = "%{$search}%";
            $bind[':s2'] = "%{$search}%";
        }

        //totales
        $total = (int)$pdo->query("SELECT COUNT(*) FROM administradores")->fetchColumn();

        $stmtCount = $pdo->prepare("SELECT COUNT(*) FROM administradores $where");

        foreach ($bind as $k => $v) $stmtCount->bindValue($k, $v, PDO::PARAM_STR);
        $stmtCount->execute();
        $filtered = (int)$stmtCount->fetchColumn();

        // consulta
        $sql = "SELECT id_administrador, 
                       nombre_administrador, 
                       email_administrador, 
                       rol_administrador, 
                       ultimo_login_administrador 
        FROM administradores $where ORDER BY $orderCol $orderDir LIMIT $start, $length";

        $stmt = $pdo->prepare($sql);
        foreach ($bind as $k => $v) $stmt->bindValue($k, $v, PDO::PARAM_STR);
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return [
            'total' => $total,
            'filtered'  => $filtered,
            'rows' =>$rows
        ];

    }
}