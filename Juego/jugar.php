<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Juego de preguntas</title>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.3.0/dist/sweetalert2.all.min.js"></script>
  <link rel="stylesheet" href="/CSS/jugar.css">
</head>

<body>

  <header class="header_jugar">
    <a class="btn_return" target="_self" href="/HTML/login.php" title="regresar a la pantalla principal">
      <img class="img_return" src="/Multimedia/return.png">
    </a>
  </header>

  <main>
    <div class="contenedor">
      <div class="puntaje" id="puntaje"></div>
      <div class="encabezado">
        <div class="categoria" id="categoria"></div>
        <div class="numero" id="numero"></div>
        <div class="pregunta" id="pregunta"></div>
        <img src="#" class="imagen" id="imagen">
      </div>
      <div class="btn" id="btn1" onclick="oprimir_btn(0)"></div>
      <div class="btn" id="btn2" onclick="oprimir_btn(1)"></div>
      <div class="btn" id="btn3" onclick="oprimir_btn(2)"></div>
      <div class="btn" id="btn4" onclick="oprimir_btn(3)"></div>

      <script src="/Juego/jugar.js"></script>
    </div>
  </main>

</body>

</html>