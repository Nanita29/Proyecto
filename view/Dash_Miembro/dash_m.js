function init(){
   
}

$(document).ready(function(){
    var id_usuario = $('#id_usuariox').val();
    
    $.post("../../controller/miembro.php?op=total_m", {id_usuario:id_usuario}, function (data) {
        data = JSON.parse(data);
        $('#tot_m').html(data.TOTAL);
    });

    $.post("../../controller/miembro.php?op=m_dep", {id_usuario:id_usuario},function (data) {
        data = JSON.parse(data);
        console.log(data);
        var nom = [];
        var total = [];

        for (var i in data) {
            nom.push(data[i].nom);
            total.push(data[i].total);
        }
        new Chart(document.getElementById("m_dep"), {
            type: 'bar',
            data: {
              labels: nom,
              datasets: [
                {
                  label: "Total",
                    backgroundColor: 'rgba(127, 61, 155 , 0.3)', // Color de fondo
                    borderColor: '#7F3D9B', // Color del borde
                    borderWidth: 2,
                  data: total
                }
              ]
            },
            options: {
              legend: { display: false },
              title: {
                display: true,
                text: 'Total Direcciones Distritales por Departamento'
              },
              responsive: true,
              scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }]
            }
            }
            
            
        });
    }); 

    $.post("../../controller/miembro.php?op=av_m_dep", {id_usuario:id_usuario},function (data) {
        data = JSON.parse(data);
        console.log(data);
        var nom = [];
        var totalx = [];
        var totaly = [];

        for (var i in data) {
            nom.push(data[i].nom);
            totalx.push(data[i].totalx);
            totaly.push(data[i].totaly);
        }
        new Chart(document.getElementById("av_m_dep"), {
            type: 'bar',
            data: {
              labels: nom,
              datasets: [
                {
                  label: "Avance X (%)",
                  backgroundColor: 'rgba(127, 61, 155 , 0.3)', // Color de fondo
                    borderColor: '#7F3D9B', // Color del borde
                    borderWidth: 2,
                  data: totalx
                },
                {
                    label: "Avance Y (%)",
                    backgroundColor: 'rgba(41, 128, 185 , 0.1)', // Color de fondo
                    borderColor: '#7F3D9B', // Color del borde
                    borderWidth: 2,
                    data: totaly
                  }
              ]
            },
            options: {
                legend: {
                    display: true,
                },
              title: {
                display: true,
                text: 'Avance (Estados de Monitoreo) por Departamento'
              },
              responsive: true,
              scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }]
            }
            }
            
            
        });
    }); 

    $.post("../../controller/miembro.php?op=estado1", {id_usuario:id_usuario},function (data) {
      data = JSON.parse(data);
      console.log(data);
      var nom = [];
      var SI = [];
      var NO = [];

      for (var i in data) {
          nom.push(data[i].nom);
          SI.push(data[i].SI);
          NO.push(data[i].NO);
      }
      new Chart(document.getElementById("estado1"), {
          type: 'bar',
          data: {
            labels: nom,
            datasets: [
              {
                label: "SI",
                  backgroundColor: 'rgba(127, 61, 155 , 0.3)', // Color de fondo
                  borderColor: '#7F3D9B', // Color del borde
                  borderWidth: 2,
                data: SI
              },
              {
                label: "NO",
                  backgroundColor: 'rgba(41, 128, 185 , 0.1)', // Color de fondo
                  borderColor: '#7F3D9B', // Color del borde
                  borderWidth: 2,
                data: NO
              }
            ]
          },
          options: {
            legend: {
              position: 'top',
            },
            title: {
              display: true,
              text: 'Avance de los Estados de Monitoreo'
            },
            responsive: true,
            scales: {
              yAxes: [{
                  ticks: {
                      beginAtZero:true
                  }
              }]
          }
          }
          
          
      });
    }); 

    $.post("../../controller/miembro.php?op=estado2", {id_usuario:id_usuario},function (data) {
      data = JSON.parse(data);
      console.log(data);
      var nom = [];
      var total = [];

      for (var i in data) {
          nom.push(data[i].nom);
          total.push(data[i].total);
      }
      new Chart(document.getElementById("estado2"), {
          type: 'bar',
          data: {
            labels: nom,
            datasets: [
              {
                label: "Total",
                  backgroundColor: 'rgba(127, 61, 155 , 0.3)', // Color de fondo
                  borderColor: '#7F3D9B', // Color del borde
                  borderWidth: 2,
                data: total
              }
            ]
          },
          options: {
            legend: { display: false },
            title: {
              display: true,
              text: '2. Conocen datos estado de situación línea de base'
            },
            responsive: true,
            scales: {
              yAxes: [{
                  ticks: {
                      beginAtZero:true
                  }
              }]
          }
          }
          
          
      });
    }); 

    $.post("../../controller/miembro.php?op=estado3", {id_usuario:id_usuario},function (data) {
      data = JSON.parse(data);
      console.log(data);
      var nom = [];
      var total = [];

      for (var i in data) {
          nom.push(data[i].nom);
          total.push(data[i].total);
      }
      new Chart(document.getElementById("estado3"), {
          type: 'bar',
          data: {
            labels: nom,
            datasets: [
              {
                label: "Total",
                  backgroundColor: 'rgba(127, 61, 155 , 0.3)', // Color de fondo
                  borderColor: '#7F3D9B', // Color del borde
                  borderWidth: 2,
                data: total
              }
            ]
          },
          options: {
            legend: { display: false },
            title: {
              display: true,
              text: '3. Conocen la estratagia de prevención de la violencia en contextos educativos'
            },
            responsive: true,
            scales: {
              yAxes: [{
                  ticks: {
                      beginAtZero:true
                  }
              }]
          }
          }
          
          
      });
    }); 

    $.post("../../controller/miembro.php?op=estado4", {id_usuario:id_usuario},function (data) {
      data = JSON.parse(data);
      console.log(data);
      var nom = [];
      var total = [];

      for (var i in data) {
          nom.push(data[i].nom);
          total.push(data[i].total);
      }
      new Chart(document.getElementById("estado4"), {
          type: 'bar',
          data: {
            labels: nom,
            datasets: [
              {
                label: "Total",
                  backgroundColor: 'rgba(127, 61, 155 , 0.3)', // Color de fondo
                  borderColor: '#7F3D9B', // Color del borde
                  borderWidth: 2,
                data: total
              }
            ]
          },
          options: {
            legend: { display: false },
            title: {
              display: true,
              text: '4. Conocen la propuesta de de armonización de la prevención de la violencia en la currícula educativa (inicial, primaria y secundaria)'
            },
            responsive: true,
            scales: {
              yAxes: [{
                  ticks: {
                      beginAtZero:true
                  }
              }]
          }
          }
          
          
      });
    }); 

    $.post("../../controller/miembro.php?op=estado5", {id_usuario:id_usuario},function (data) {
      data = JSON.parse(data);
      console.log(data);
      var nom = [];
      var total = [];

      for (var i in data) {
          nom.push(data[i].nom);
          total.push(data[i].total);
      }
      new Chart(document.getElementById("estado5"), {
          type: 'bar',
          data: {
            labels: nom,
            datasets: [
              {
                label: "Total",
                  backgroundColor: 'rgba(127, 61, 155 , 0.3)', // Color de fondo
                  borderColor: '#7F3D9B', // Color del borde
                  borderWidth: 2,
                data: total
              }
            ]
          },
          options: {
            legend: { display: false },
            title: {
              display: true,
              text: '5. Cuentan con habilidades para capacitar a maestros y maestras, otros actores y hacer seguimiento en las escuelas'
            },
            responsive: true,
            scales: {
              yAxes: [{
                  ticks: {
                      beginAtZero:true
                  }
              }]
          }
          }
          
          
      });
    }); 

    $.post("../../controller/miembro.php?op=estado6", {id_usuario:id_usuario},function (data) {
      data = JSON.parse(data);
      console.log(data);
      var nom = [];
      var total = [];

      for (var i in data) {
          nom.push(data[i].nom);
          total.push(data[i].total);
      }
      new Chart(document.getElementById("estado6"), {
          type: 'bar',
          data: {
            labels: nom,
            datasets: [
              {
                label: "Total",
                  backgroundColor: 'rgba(127, 61, 155 , 0.3)', // Color de fondo
                  borderColor: '#7F3D9B', // Color del borde
                  borderWidth: 2,
                data: total
              }
            ]
          },
          options: {
            legend: { display: false },
            title: {
              display: true,
              text: '6. Aplican conocimientos para la gestión externa e interna de la estrategia en el programa y/o servicio'
            },
            responsive: true,
            scales: {
              yAxes: [{
                  ticks: {
                      beginAtZero:true
                  }
              }]
          }
          }
          
          
      });
    }); 

    

 
});

init();