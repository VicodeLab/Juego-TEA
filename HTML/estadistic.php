<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Estadisticas de uso de la Aplicación" />
    <meta name="robots" content="index,follow" />
    <link rel="stylesheet" href="/CSS/estadistic.css">
    <title>Gráfica de Uso de la Aplicación</title>
</head>

<body>
    <header class="header_estadistic">
        <a class="btn_return" target="_self" href="/HTML/config.html" title="Regresar a la pantalla principal">
            <img class="img_return" src="/Multimedia/return.png">
        </a>
    </header>
    <main>
        <div class="container_estadistic">
            <div class="title">
                <h1>Estadísticas</h1>
            </div>
        </div>
        <div class="table-container">
            <table>
                <tr>
                    <th>Fecha de Registro</th>
                    <th>Preguntas resueltas</th>
                    <th>Aciertos</th>
                    <th>Categoría</th>
                </tr>
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

                $sql = "SELECT Fecha, PreguntasTotales, PuntosCorrectos, Categoria
                        FROM estadisticas
                        WHERE id = $id AND Fecha != '0000-00-00 00:00:00'
                        GROUP BY Fecha
                        HAVING MAX(numRegistro)
                        ORDER BY Fecha DESC";
                $result = $con->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $fecha = $row["Fecha"];
                        $preguntasTotales = $row["PreguntasTotales"];
                        $puntosCorrectos = $row["PuntosCorrectos"];
                        $categoria = $row["Categoria"];

                        echo "<tr>";
                        echo "<td>" . $fecha . "</td>";
                        echo "<td>" . $preguntasTotales . "</td>";
                        echo "<td>" . $puntosCorrectos . "</td>";
                        echo "<td>" . $categoria . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>No se encontraron resultados</td></tr>";
                }

                $con->close();
                ?>
            </table>
        </div>
    </main>
    <footer>
        <h1>ㅤㅤ</h1>
        <div class="container_estadistic">
            <h2>Tiempo de uso total de la aplicación:</h2>
            <h1> </h1>
            <?php
            $tiempoTotal = 100;

            $tiempoTotalMinutos = round($tiempoTotal / 60);
            echo "<p>$tiempoTotalMinutos minutos</p>";
            ?>
        </div>
    </footer>
</body>

</html>