
// Obtener el elemento del contador
var counterElement = document.getElementById('counter');
var counterElement2 = document.getElementById('counter2') || null;
// Obtener el valor del contador almacenado en localStorage (si existe)
var initialTime = localStorage.getItem('counterValue');

// Función para actualizar el contador cada minuto
function updateCounter() {
    initialTime++;
    // Guardar el nuevo valor del contador en localStorage
    localStorage.setItem('counterValue', initialTime);
    if (counterElement2 != null)
    {
        var minutosUso = convertSecondsToMinutes(initialTime)
        counterElement2.textContent = minutosUso;
    }
}

// Ejecutar la función de actualización cada minuto (60000 milisegundos)
setInterval(updateCounter, 600);


//conversion
function convertSecondsToMinutes(seconds) {
    var minutes = Math.floor(seconds / 60); // Obtener los minutos
    var remainingSeconds = seconds % 60; // Obtener los segundos restantes
  
    // Devolver el resultado en formato "minutos:segundos"
    return minutes + ":" + remainingSeconds.toString().padStart(2, '0');
  }






// // Datos de ejemplo para la gráfica
// var data = {
//     labels: ['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo'],
//     datasets: [{
//       label: 'Uso de la Aplicación',
//       data: [50, 75, 30, 90, 60, 45, 80],
//       backgroundColor: 'rgba(54, 162, 235, 0.5)',
//       borderColor: 'rgba(54, 162, 235, 1)',
//       borderWidth: 1
//     }]
//   };
  
//   // Configuración de la gráfica
//   var options = {
//     responsive: true,
//     maintainAspectRatio: false,
//     scales: {
//       y: {
//         beginAtZero: true
//       }
//     }
//   };
  
//   // Crear la gráfica
//   var ctx = document.getElementById('myChart').getContext('2d');
//   var myChart = new Chart(ctx, {
//     type: 'bar',
//     data: data,
//     options: options
//   });