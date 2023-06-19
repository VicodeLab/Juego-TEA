<?php
$ip = "127.0.0.1";
$usuario = "root";
$pass = "root";
$bdd = "tea";

$con = new mysqli($ip, $usuario, $pass, $bdd);

if ($con->connect_error) {
    die("Falló la conexión: " . $con->connect_error);
}

if (isset($_POST["id"]) && isset($_POST["tiempo"])) {
    $id = $_POST["id"];
    $tiempo = $_POST["tiempo"];

    $sql = "UPDATE niños SET Tiempo = '$tiempo' WHERE ID = '$id'";

    if ($con->query($sql) === TRUE) {
        echo "Registro actualizado exitosamente";
    } else {
        echo "Error al actualizar el registro: " . $con->error;
    }
} else {
    echo "Error: Los parámetros necesarios no fueron proporcionados.";
}

$con->close();
?>
