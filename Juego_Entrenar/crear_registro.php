<?php
$ip = "127.0.0.1";
$usuario = "root";
$pass = "root";
$bdd = "tea";

$con = new mysqli($ip, $usuario, $pass, $bdd);

if ($con->connect_error) {
    die("Falló la conexión: " . $con->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();
    $id = $_POST['id'];
    $categoria = "Entrenar";
    $puntosCorrectos = 0;
    $preguntasTotales = 0;
    $fecha = date('Y-m-d H:i:s');

    $sql = "INSERT INTO estadisticas (ID, categoria, PuntosCorrectos, PreguntasTotales, Fecha) VALUES (?, ?, ?, ?, ?)";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("ssiii", $id, $categoria, $puntosCorrectos, $preguntasTotales, $fecha);

    if ($stmt->execute()) {
        $numRegistro = $stmt->insert_id;
        echo "Registro creado exitosamente. NumRegistro: " . $numRegistro;

        $_SESSION["numRegistro"] = $numRegistro;
    } else {
        echo "Error al crear el registro: " . $stmt->error;
    }

    $stmt->close();
}

$con->close();
?>
