let preguntas_aleatorias = true;
let mostrar_pantalla_juego_terminado = true;
let reiniciar_puntos_al_reiniciar_el_juego = false;

window.onload = function () {
  base_preguntas = readText("base-preguntas-juego.json");
  interprete_bp = JSON.parse(base_preguntas);
  escogerPreguntaAleatoria();

  let id = new URLSearchParams(window.location.search).get("id");
  crearRegistro(id);

  let tiempoInicial = Date.now();

  setInterval(() => {
    let tiempoActual = Date.now();
    let tiempoTranscurrido = Math.floor((tiempoActual - tiempoInicial) / 1000); // Convertir a segundos
    guardarTiempo(id, tiempoTranscurrido);
  }, 1000);
};

let pregunta;
let posibles_respuestas;
let btn_correspondiente = [
  select_id("btn1"),
  select_id("btn2"),
  select_id("btn3"),
  select_id("btn4")
];
let npreguntas = [];

let preguntas_hechas = 0;
let preguntas_correctas = 0;

let PuntosFin = 0;
let PreguntasContestadas = 0;

function escogerPreguntaAleatoria() {
  let n;
  if (preguntas_aleatorias) {
    n = Math.floor(Math.random() * interprete_bp.length);
  } else {
    n = 0;
  }

  while (npreguntas.includes(n)) {
    n++;
    if (n >= interprete_bp.length) {
      n = 0;
    }
    if (npreguntas.length == interprete_bp.length) {
      if (mostrar_pantalla_juego_terminado) {
        swal.fire({
          title: "Juego finalizado",
          text: "Puntuación: " + preguntas_correctas + "/" + preguntas_hechas,
          icon: "success"
        });
      }
      reiniciarJuego();
      return;
    }
  }
  npreguntas.push(n);
  preguntas_hechas++;

  escogerPregunta(n);
}

function escogerPregunta(n) {
  pregunta = interprete_bp[n];
  select_id("categoria").innerHTML = pregunta.categoria;
  select_id("pregunta").innerHTML = pregunta.pregunta;
  select_id("numero").innerHTML = n;
  let pc = preguntas_correctas;
  if (preguntas_hechas > 1) {
    select_id("puntaje").innerHTML = pc + "/" + (preguntas_hechas - 1);
  } else {
    select_id("puntaje").innerHTML = "";
  }

  style("imagen").objectFit = pregunta.objectFit;
  desordenarRespuestas(pregunta);
  if (pregunta.imagen) {
    select_id("imagen").setAttribute("src", pregunta.imagen);
    style("imagen").height = "70%";
    style("imagen").width = "90%";
  } else {
    style("imagen").height = "0px";
    style("imagen").width = "0px";
    setTimeout(() => {
      select_id("imagen").setAttribute("src", "");
    }, 500);
  }
}

function desordenarRespuestas(pregunta) {
  posibles_respuestas = [
    pregunta.respuesta,
    pregunta.incorrecta1,
    pregunta.incorrecta2,
    pregunta.incorrecta3,
  ];
  posibles_respuestas.sort(() => Math.random() - 0.5);

  select_id("btn1").innerHTML = posibles_respuestas[0];
  select_id("btn2").innerHTML = posibles_respuestas[1];
  select_id("btn3").innerHTML = posibles_respuestas[2];
  select_id("btn4").innerHTML = posibles_respuestas[3];
}

let suspender_botones = false;

function oprimir_btn(i) {
  if (suspender_botones) {
    return;
  }
  suspender_botones = true;
  if (posibles_respuestas[i] == pregunta.respuesta) {
    preguntas_correctas++;
    btn_correspondiente[i].style.background = "lightgreen";
  } else {
    btn_correspondiente[i].style.background = "pink";
  }
  for (let j = 0; j < 4; j++) {
    if (posibles_respuestas[j] == pregunta.respuesta) {
      btn_correspondiente[j].style.background = "lightgreen";
      break;
    }
  }
  setTimeout(() => {
    suspender_botones = false;
    if (preguntas_hechas === 5) {
      // Envío del puntaje final a la base de datos
      let id = new URLSearchParams(window.location.search).get("id");
      let puntosCorrectos = preguntas_correctas;
      let preguntasTotales = preguntas_hechas;

      PuntosFin = puntosCorrectos;
      PreguntasContestadas = preguntasTotales;

      let formData = new FormData();
      formData.append("id", id);
      formData.append("puntosCorrectos", puntosCorrectos);
      formData.append("preguntasTotales", preguntasTotales);

      fetch("guardar_registros.php", {
        method: "POST",
        body: formData
      })
        .then(response => response.text())
        .then(data => console.log(data))
        .catch(error => console.log(error));

      // Reiniciar el juego
      if (mostrar_pantalla_juego_terminado) {
        swal.fire({
          title: "Juego finalizado",
          text: "Puntuación: " + preguntas_correctas + "/" + preguntas_hechas,
          icon: "success"
        }).then(() => {
          window.location.reload();
        });
      } else {
        window.location.reload();
      }
    } else {
      reiniciar();
    }
  }, 2500);
}

function reiniciar() {
  for (const btn of btn_correspondiente) {
    btn.style.background = "white";
  }
  escogerPreguntaAleatoria();
}

function select_id(id) {
  return document.getElementById(id);
}

function style(id) {
  return select_id(id).style;
}

function readText(ruta_local) {
  var texto = null;
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.open("GET", ruta_local, false);
  xmlhttp.send();
  if (xmlhttp.status == 200) {
    texto = xmlhttp.responseText;
  }
  return texto;
}

function crearRegistro(id) {
  let formData = new FormData();
  formData.append("id", id);

  fetch("crear_registro.php", {
    method: "POST",
    body: formData
  })
    .then(response => response.text())
    .then(data => console.log(data))
    .catch(error => console.log(error));
}

function guardarTiempo(id, tiempo) {
  let formData = new FormData();
  formData.append("id", id);
  formData.append("tiempo", tiempo);

  fetch("guardar_tiempo.php", {
    method: "POST",
    body: formData
  })
    .then(response => response.text())
    .then(data => console.log(data))
    .catch(error => console.log(error));
}