<?php
$ip = "127.0.0.1";
$usuario = "root";
$pass = "root";
$bdd = "tea";

$con = new mysqli($ip, $usuario, $pass, $bdd);

if ($con->connect_error) {
    die("Falló la conexión: " . $con->connect_error);
}

$id = $_POST["id"];
$PuntosCorrectos = intval($_POST["puntosCorrectos"]);
$PreguntasTotales = intval($_POST["preguntasTotales"]);
$fecha = date('Y-m-d H:i:s');

session_start();
if (isset($_SESSION["numRegistro"])) {
    $numRegistro = $_SESSION["numRegistro"];

    $sql = "UPDATE estadisticas SET PuntosCorrectos = $PuntosCorrectos, PreguntasTotales = $PreguntasTotales, Fecha = '$fecha' WHERE ID = $id AND numRegistro = $numRegistro";

    if ($con->query($sql) === TRUE) {
        echo "Registro actualizado exitosamente";
    } else {
        echo "Error al actualizar el registro: " . $con->error;
    }
} else {
    echo "No se encontró un registro para la sesión actual";
}

$con->close();
?>
