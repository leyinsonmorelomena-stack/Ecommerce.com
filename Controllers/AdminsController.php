<?php

class AdminsController{
    /*=================================
                 Login
    =================================*/
    public function login(){
        $mensaje = "";

        //validamos variables post
        if($_SERVER['REQUEST_METHOD']==='POST'){
            $email = filter_var(trim($_POST['emailAdmin'] ?? ''), FILTER_SANITIZE_EMAIL);
            $password = trim($_POST['passwordAdmin']);

            //validaciones básicas
            if(empty($email) || empty($password)){
                return 'Por favor, completa todos los campos';
            }

            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                return 'El formato del correo electrónico no es válido';
            }
        }

        return $mensaje; //vacio si no 
    }
}