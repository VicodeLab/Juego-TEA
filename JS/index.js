
// FUNCION PARA SLIDER DE VOLUMEN

var $slider = $("#slider");
var $fill = $(".bar .fill");

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







