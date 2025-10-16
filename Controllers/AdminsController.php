<?php

require_once "Models/AdminsModel.php";

class AdminsController
{
    /*=================================
                Login
    =================================*/
    public function login()
    {
        $mensaje = "";

        // Validamos variables POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $email = filter_var(trim($_POST['emailAdmin'] ?? ''), FILTER_SANITIZE_EMAIL);
            $password = trim($_POST['passwordAdmin'] ?? '');

            // Validaciones básicas
            if (empty($email) || empty($password)) {
                return 'Por favor, completa todos los campos';
            }

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                return 'El formato del correo electrónico no es válido';
            }

            // Validación de longitud mínima
            if (strlen($password) < 8) {
                return 'La contraseña debe incluir al menos 8 caracteres';
            }

            // Validación de complejidad
            $patron = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/';

            if (!preg_match($patron, $password)) {
                return 'La contraseña debe incluir mayúsculas, minúsculas, números y caracteres especiales';
            }

            //Buscar administrador en la base de datos si pasa todas las validaciones

            $adminModel = new AdminsModel();
            $admin = $adminModel->findByEmail($email);

            // var_dump($admin);
            // echo '<pre>';print_r($admin);echo '</pre>';
            // return;

             if(!$admin){
                return 'Administrador no encontrado';
             }

            // Para cuando este la contraseña encriptada
            //  if(!password_verify($password, $admin['password_administrador'])){
            //     return 'Contraseña incorrecta'
            //  }

            if($password !== $admin['password_administrador']){
                return 'Contraseña incorrecta';
            }

            $_SESSION['admin']= "ok";

            $_SESSION['admin_id'] = $admin['id_administrador'];
            $_SESSION['admin_email'] = $admin['email_administrador'];
            $_SESSION['admin_nombre'] = $admin['nombre_administrador'];

            echo '<script>location.reload();</script>';
        }

        return $mensaje; // Vacío si no se ha enviado o no hubo errores
    }
}
