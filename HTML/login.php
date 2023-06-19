<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Pantalla de bienvenida" />
    <meta name="robots" content="index,follow" />
    <link rel="stylesheet" href="/CSS/Style.css">
    <title>Login</title>
</head>
<body>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="/JS/ScriptTiempo.js"></script>

    <header class="header">
        <a class="btn_return" target="_self" href="/HTML/index.html" title="regresar a la pantalla principal">
            <img class="img_return" src="/Multimedia/return.png">
        </a>
        <h2>Te damos la bienvenida!</h2>
    </header>

    <main class="container">
        <div class="div_logo">
            <img class="img_logo" src="/Multimedia/Logo_kids.png" alt="Logo kids principal ">
        </div>
        
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
            $id = $_POST['id'];

            $sql = "SELECT * FROM niños WHERE nombre = '$nombre' AND id = '$id'";
            $result = $con->query($sql);

            if ($result->num_rows === 0) {
                echo "<script>alert('Usuario no registrado. Por favor, regístrate primero.');</script>";
            } else {
                if (isset($_POST['submit_entrenar'])) {
                    header("Location: /Jugar_entrenar/entrenar.php?nombre=" . urlencode($nombre) . "&id=" . urlencode($id));
                } elseif (isset($_POST['submit_jugar'])) {
                    header("Location: /Juego/jugar.php?nombre=" . urlencode($nombre) . "&id=" . urlencode($id));
                }
                exit();
            }

            $con->close();
        }
        ?>

        <form method="post" class="div_label">
            <label class="label_name" for="nombre">
                <span>Nombre:</span>
                <input type="text" class="input-name" name="nombre" placeholder="Nombre de usuario..." autocomplete="name" required>         
            </label>
            <label class="label_id" for="ID">
                <span>Id:</span>
                <input type="text" class="input-id" name="id" placeholder="identificación..." autocomplete="id" required>
            </label>
            <div class="container_btn">
                <input type="submit" value="Entrenar" class="btn btn-pause" name="submit_entrenar">
                <input type="submit" value="Jugar" class="btn btn-play" name="submit_jugar">
            </div>
        </form>

        <a class="btn_confi" target="_self" href="/HTML/config.html" title="Ir a Configuraciones">
            <img class="img_confi" src="/Multimedia/configuration-symbol.png">
        </a>
        <a class="btn_sound" target="_self" href="/HTML/sound.html" title="Ir a config volumen">
            <img class="img_sound" src="/Multimedia/volume-level.png">
        </a>
        <a class="btn_exit" target="_self" href="#" title="salir de la aplicacion">
            <img class="img_exit" src="/Multimedia/Exit.png">
        </a>
    </main>

    <script src="/JS/Config_estadistic.js"></script>
</body>
</html>