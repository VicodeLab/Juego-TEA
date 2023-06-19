<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Perfil" />
    <meta name="robots" content="index,follow" />
    <link rel="stylesheet" href="/CSS/perfil.css">
    <title>Perfil del Niño</title>
</head>

<body>
    <header class="header_perfil">
        <a class="btn_return" target="_self" href="/HTML/config.html" title="Regresar a la pantalla principal">
            <img class="img_return" src="/Multimedia/return.png">
        </a>
    </header>

    <main>
        <div class="container_perfil">
            <div class="title">
                <h1>Perfil del Niño</h1>
            </div>

            <div>
                <?php
                $ip = "127.0.0.1";
                $usuario = "root";
                $pass = "root";
                $db = "tea";
                $con = new mysqli($ip, $usuario, $pass, $db);
                if ($con->connect_error) {
                    die("Falló la conexión: " . $con->connect_error);
                }

                $id = $_GET['id'];

                $sql = "SELECT * FROM niños WHERE ID = $id";
                $result = $con->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $nombre = $row["nombre"];
                        $id = $row["ID"];
                        $edad = $row["edad"];
                        $sexo = $row["genero"];

                        echo "<div class='perfil_item'>";
                        echo "<h2>Nombre del Niño:</h2>";
                        echo "<p>$nombre</p>";
                        echo "<h2>ID del Niño:</h2>";
                        echo "<p>$id</p>";
                        echo "<h2>Edad del Niño:</h2>";
                        echo "<p>$edad</p>";
                        echo "<h2>Sexo del Niño:</h2>";
                        echo "<p>$sexo</p>";
                        echo "</div>";
                    }
                } else {
                    echo "<p>No se encontraron datos del niño</p>";
                }

                $con->close();
                ?>
            </div>
        </div>
    </main>
</body>

</html>
