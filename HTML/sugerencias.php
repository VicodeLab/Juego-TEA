<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Página de Sugerencias">
    <meta name="robots" content="noindex, nofollow">
    <title>Sugerencias</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            background-color: #323c4c;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        h1 {
            color: aliceblue;
            width: 100%;
            font-size: 2rem;
        }

        .container {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f2f2f2;
            border-radius: 5px;
            margin-top: 50px;
        }

        .container h1 {
            color: aliceblue;
            text-align: center;
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            resize: vertical;
            background-color: #f9f9f9;
            color: #666;
        }

        textarea {
            height: 150px;
        }

        button {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        .success-msg {
            margin-top: 20px;
            background-color: #d4edda;
            color: #155724;
            padding: 10px;
            border-radius: 4px;
        }

        .error-msg {
            margin-top: 20px;
            background-color: #f8d7da;
            color: #721c24;
            padding: 10px;
            border-radius: 4px;
        }

        .header_perfil {
            display: flex;
            margin-top: 2.1rem;
            min-width: 35rem;
            text-align: center;
            width: 65%;
            padding: 10px;
            background-color: #f2f2f2;
        }

        .btn_return {
            width: 12%;
            min-width: 2rem;
            margin-left: 1.2rem;
        }

        .img_return {
            width: 100%;
            max-width: 20px;
            max-height: 20px;
        }

        /* Estilos para el texto "Enviar Sugerencia" */
        .container h1 {
            color: black;
        }
    </style>
</head>

<body>
    <header class="header_perfil">
        <a class="btn_return" target="_self" href="/HTML/config.html" title="Regresar a la pantalla principal">
            <img class="img_return" src="/Multimedia/return.png">
        </a>
    </header>

    <div class="container">
        <h1>Enviar Sugerencia</h1>

        <?php
        $to = 'dguardom1@unicartagena.edu.co';
        $subject = 'Sugerencia';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $message = $_POST['message'];

            $headers = 'From: ' . $email . "\r\n" .
                'Reply-To: ' . $email . "\r\n" .
                'X-Mailer: PHP/' . phpversion();

            if (mail($to, $subject, $message, $headers)) {
                echo '<div class="success-msg">¡Gracias por tu sugerencia! Hemos recibido tu mensaje.</div>';
            } else {
                echo '<div class="error-msg">Lo sentimos, ha ocurrido un error al enviar tu sugerencia. Por favor, inténtalo de nuevo más tarde.</div>';
            }
        }
        ?>

        <form action="" method="POST">
            <input type="text" name="name" placeholder="Nombre" required>
            <input type="email" name="email" placeholder="Correo electrónico" required>
            <textarea name="message" placeholder="Escribe aquí tu sugerencia" required></textarea>
            <button type="submit">Enviar</button>
        </form>
    </div>
</body>

</html>