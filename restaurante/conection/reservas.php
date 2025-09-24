<?php

    include "conection.php";

    $email = $_POST['userEmail'];
    $mesa = $_POST['tableNumber'];
    $numeroPersonas = $_POST['groupNumber'];
    $hora = $_POST['hour'];
    $fecha = date("Y-m-d");

    try{

        $res = $con->prepare("SELECT * FROM usuario WHERE email = ?");
        $res->execute([$email]);

        $usuario = $res->fetch(PDO::FETCH_ASSOC);
        
        if($usuario){


            $res2 = $con->prepare("SELECT * FROM mesa WHERE numero = ?");
            $res2->execute([$mesa]);

            $mesaDb = $res2->fetch(PDO::FETCH_ASSOC);

            if($mesaDb){


                if($mesaDb["capacidad"] >= $numeroPersonas){

                    if($mesaDb["estadoMesa"] != "reservada" ){
                        
                        $sql = $con->prepare("INSERT INTO reserva (id_mesa, id_cliente, fecha, hora) VALUES (?, ?, ?, ?)");
                        $sql->execute([$mesaDb["id_mesa"], $usuario["id_cliente"], $fecha, $hora]);

                        $sql2 = $con->prepare("UPDATE mesa SET estadoMesa = 'reservada' WHERE id_mesa = ?");
                        $sql2->execute([$mesaDb["id_mesa"]]);
            
                        echo json_encode(["exito" => "Reserva", "mensaje" => "Reserva efectuada con exito"]);

                    }else{

                        echo json_encode(["error" => "Mesa", "mensaje" => "Esta mesa esta reservada"]);
                    
                    }
                    

                }else{
                    
                    echo json_encode(["error" => "Mesa", "mensaje" => "La mesa no tiene la capacidad necesaria"]);
                    
                }


            }else{

                echo json_encode(["error" => "Mesa", "mensaje" => "Esta mesa no existe"]);
            
            }

        }else{

            echo json_encode(["error" => "Usuario", "mensaje" => "Este usuario no existe"]);

        }



    }catch (PDOException $e) {

        echo json_encode(["error" => "Error de base de datos", "mensaje" => $e->getMessage()]);
    
    } 
    

?>