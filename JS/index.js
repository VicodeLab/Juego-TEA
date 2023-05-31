
// FUNCIONES PARA SLIDERS DE VOLUMEN
var $fill = $(".bar .fill");
var $fill_voice = $(".bar_voice .fill_voice");
var $fill_music = $(".bar_music .fill_music");
var $slider = $("#slider");
var $slider_voice = $("#slider_voice");
var $slider_music = $("#slider_music");

function setBar_voice(){
  $fill_voice.css("width", $slider_voice.val() + "%");
}

$slider_voice.on("input", setBar_voice);

setBar_voice();

function setBar_music(){
  $fill_music.css("width", $slider_music.val() + "%");
}

$slider_music.on("input", setBar_music);

setBar_music();

function setBar() {
	$fill.css("width", $slider.val() + "%");
}

$slider.on("input", setBar);

setBar();

// Obtener referencia al botón
var btnSalir = document.querySelector(".btn_exit");

// Agregar el evento click al botón
btnSalir.addEventListener("click", salir);

// Función para salir de la aplicación
function salir() {
  if (window.close) {
    window.close();
  } else if (window.top.close) {
    window.top.close();
  }
}

// ----OTRAS VERSIONES----

// slider.addEventListener("input", setBar);

// const slider = document.querySelectorAll("#slider");
// const fill = document.querySelectorAll(".bar .fill");

// function setBar(){
//     fill.css("width", slider.val() + "%");
// }


//----------------------

// let slider = document.querySelector("input");

// slider.oninput = function(){
//     let fill = document.querySelector("span");
//     fill.value = slider.value;
// }







