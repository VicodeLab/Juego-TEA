<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Configuariones" />
    <meta name="robots" content="index,follow"/>
    <link rel="stylesheet" href="/CSS/register.css">
    <title>Registro</title>
</head>
<body>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="/JS/ScriptTiempo.js"></script>

    <header class="header_config">
        <a class="btn_return" target="_self" href="/HTML/index.html" title="regresar a la pantalla principal"> <img
                class="img_return" src="/Multimedia/return.png"></a>
    </header>
    <main>
        <div class="container_register">
                <div class="title">
                    <h1>Registro</h1>
                </div>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="form">
                  <label class="label_name" for="nombre">
                    <span>Nombre:</span>
                    <input type="text" class="input input-name" name="nombre" placeholder="Nombre..." autocomplete="name" required>         
                </label>
                <label class="label_edad" for="edad">
                  <span>Edad:</span>
                  <input type="number" class="input input-edad" name="edad" required>         
                </label>
                <label class="label_genero" for="genero">
                  <span class="span-gener">Genero:</span>
                  <span class="span-genero">Masculino</span>
                  <input type="radio" class="input-check_male" name="genero" value="M" required> 
                  <span class="span-genero fem">Femenino</span>
                  <input type="radio" class="input-check_fem" name="genero" value="F" required>        
                </label>
                <label class="label_id" for="ID">
                    <span>Id:</span>
                    <input type="text" class="input input-id" name="id" placeholder="Identificación..." autocomplete="id" required>
                    
                </label>
                <div class="div_final">
                    <input type="submit" value="Registrarse" class="btn_register">
                </div>
                </form>
        </div>

    </main>
    <script src="/JS/Config_estadistic.js"></script>
</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ip = "127.0.0.1";
    $usuario = "root";
    $pass = "root";
    $bdd = "tea";

    $con = new mysqli($ip, $usuario, $pass, $bdd);

    if ($con->connect_error) {
        die("Falló la conexión: " . $con->connect_error);
    }

    $nombre = $_POST['nombre'];
    $edad = $_POST['edad'];
    $genero = $_POST['genero'];
    $id = $_POST['id'];

    if (empty($nombre) || empty($edad) || empty($genero) || empty($id)) {
        echo '<script>alert("Por favor, completa todos los campos.");</script>';
    } else {
        $checkQuery = "SELECT * FROM niños WHERE ID = '$id'";
        $checkResult = $con->query($checkQuery);
        if ($checkResult->num_rows > 0) {
            echo '<script>alert("El ID ingresado ya está registrado. Por favor, elige otro ID.");</script>';
        } else {
            $query = "INSERT INTO niños (nombre, edad, genero, ID) VALUES ('$nombre', '$edad', '$genero', '$id')";

            if ($con->query($query) === TRUE) {
                echo '<script>alert("Registro exitoso.");</script>';
                echo '<script>window.location.href = "/HTML/index.html";</script>';
                exit();
            } else {
                echo "Error: " . $query . "<br>" . $con->error;
            }
        }
    }

    $con->close();
}
?>