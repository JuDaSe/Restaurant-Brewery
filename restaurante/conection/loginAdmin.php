<?php

    include "conection.php";
    session_start();

    $email = $_POST["email"];
    $pass = $_POST["passwrd"];

    //Preparar login para cuando la bd este con uruario normal y trabajador

    $sql = "SELECT email, nombre, contraseña FROM usuario WHERE email = ?";
    $sent = $con->prepare($sql);
    $sent->execute([$email]);
    $user = $sent->fetch(PDO::FETCH_ASSOC);
    
    if($user && password_verify($pass, $user["contraseña"])){
       $_SESSION["user"] = ["email" => $user["email"],"nombre" => $user["nombre"]];

        echo json_encode(["exito" => "login exitoso"]);
    }else{
        echo json_encode(["error" => "Usuario o contraseña incorrectos"]);
         
    }

?>