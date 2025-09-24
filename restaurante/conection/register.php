<?php

    include "conection.php";
    $nombre = $_POST['userName'];
    $address = $_POST['address'];
    $number = $_POST['number'];
    $email = $_POST['email'];
    $passwrd = password_hash($_POST['passwrd'], PASSWORD_BCRYPT);

    try{
        $res = $con->prepare("SELECT * FROM usuario WHERE email = ?");
        $res->execute([$email]);

        if($res->fetchColumn()){
            echo json_encode(["error" => "El usuario con este email ya existe"]);

        }else{
            $res = $con->prepare("INSERT INTO usuario (nombre, email, contraseña, telefono, direccion) VALUES (?, ?, ?, ?, ?)");
            $res->execute([$nombre, $email, $passwrd, $number, $address]);
    
            echo json_encode(["exito" => "registro exitoso"]);

        }



    }catch (PDOException $e) {
        echo json_encode(["error" => "Error de base de datos", "mensaje" => $e->getMessage()]);
    }   

    

?>
