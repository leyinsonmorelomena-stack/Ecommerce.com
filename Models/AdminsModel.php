<?php

require_once "Models/Conexion.php";

class AdminsModel
{
    public static function findByEmail(string $email)
    {
        $consultaSql = "SELECT
                            id_administrador,
                            nombre_administrador,
                            email_administrador,
                            password_administrador
                        FROM administradores
                        WHERE email_administrador = :email_administrador
                        LIMIT 1";

        try {
            $stmt = Conexion::pdo()->prepare($consultaSql);
            $stmt->bindParam(":email_administrador", $email, PDO::PARAM_STR);
            $stmt->execute();

            $administrador = $stmt->fetch(PDO::FETCH_ASSOC);
            return $administrador ?: null;
        } catch (PDOException $e) {
            error_log("Error en findByEmail: " . $e->getMessage());
            return null;
        }
    }
}
