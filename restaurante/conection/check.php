<?php
session_start();

if (isset($_SESSION["user"]) && is_array($_SESSION["user"])) {
    echo json_encode([
        "email" => $_SESSION["user"]["email"],
        "nombre" => $_SESSION["user"]["nombre"]
    ]);
} else {
    echo json_encode(["error" => "No hay usuario logueado"]);
}
?>