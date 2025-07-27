<?php

    include "conection.php";

    $email = $_POST["email"];
    $pass = $_POST["passwrd"];

    $sql = "SELECT contraseña from usuario WHERE email=?";
    $sent = $con->prepare($sql);

    $sent->execute([$email]);

    $res = $sent->fetchColumn();
    
    if($res && password_verify($pass, $res)){
        session_start();
        $_SESSION["user"] = $email;
        
        echo json_encode(["exito" => "login exitoso"]);
    }else{
        echo json_encode(["error" => "Usuario o contraseña incorrectos"]);
         
    }

?>