
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