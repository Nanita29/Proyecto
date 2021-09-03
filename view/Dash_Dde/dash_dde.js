function init(){
   
}

$(document).ready(function(){
    var id_usuario = $('#id_usuariox').val();
    
    $.post("../../controller/dde.php?op=total_dde", {id_usuario:id_usuario}, function (data) {
        data = JSON.parse(data);
        $('#tot_dde').html(data.TOTAL);
    });

    $.post("../../controller/dde.php?op=dde_dep", {id_usuario:id_usuario},function (data) {
        data = JSON.parse(data);
        console.log(data);
        var nom = [];
        var total = [];

        for (var i in data) {
            nom.push(data[i].nom);
            total.push(data[i].total);
        }
        new Chart(document.getElementById("dde_dep"), {
            type: 'bar',
            data: {
              labels: nom,
              datasets: [
                {
                  label: "Total",
                    backgroundColor: 'rgba(218, 140, 16, 0.3)', // Color de fondo
                    borderColor: '#DA8C10', // Color del borde
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

    $.post("../../controller/dde.php?op=av_dde_dep", {id_usuario:id_usuario},function (data) {
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
        new Chart(document.getElementById("av_dde_dep"), {
            type: 'bar',
            data: {
              labels: nom,
              datasets: [
                {
                  label: "Avance X (%)",
                  backgroundColor: 'rgba(218, 140, 16, 0.3)', // Color de fondo
                    borderColor: '#DA8C10', // Color del borde
                    borderWidth: 2,
                  data: totalx
                },
                {
                    label: "Avance Y (%)",
                    backgroundColor: 'rgba(41, 128, 185 , 0.1)', // Color de fondo
                    borderColor: '#DA8C10', // Color del borde
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

    $.post("../../controller/dde.php?op=dde_mun", {id_usuario:id_usuario},function (data) {
      data = JSON.parse(data);
      console.log(data);
      var nom = [];
      var total = [];

      for (var i in data) {
          nom.push(data[i].nom);
          total.push(data[i].total);
      }
      new Chart(document.getElementById("dde_mun"), {
          type: 'bar',
          data: {
            labels: nom,
            datasets: [
              {
                label: "Total",
                  backgroundColor: 'rgba(218, 140, 16, 0.3)', // Color de fondo
                  borderColor: '#DA8C10', // Color del borde
                  borderWidth: 2,
                data: total
              }
            ]
          },
          options: {
            legend: { display: false },
            title: {
              display: true,
              text: 'Total Direcciones Distritales por Municipio'
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

    $.post("../../controller/dde.php?op=estado1", {id_usuario:id_usuario},function (data) {
      data = JSON.parse(data);
      console.log(data);
      var nom = [];
      var total = [];

      for (var i in data) {
          nom.push(data[i].nom);
          total.push(data[i].total);
      }
      new Chart(document.getElementById("estado1"), {
          type: 'bar',
          data: {
            labels: nom,
            datasets: [
              {
                label: "Total",
                  backgroundColor: 'rgba(218, 140, 16, 0.3)', // Color de fondo
                  borderColor: '#DA8C10', // Color del borde
                  borderWidth: 2,
                data: total
              }
            ]
          },
          options: {
            legend: { display: false },
            title: {
              display: true,
              text: '1. Conocen normativa y políticas educativas vigentes en torno a PCPA, protocolos'
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

    $.post("../../controller/dde.php?op=estado2", {id_usuario:id_usuario},function (data) {
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
                  backgroundColor: 'rgba(218, 140, 16, 0.3)', // Color de fondo
                  borderColor: '#DA8C10', // Color del borde
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

    $.post("../../controller/dde.php?op=estado3", {id_usuario:id_usuario},function (data) {
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
                  backgroundColor: 'rgba(218, 140, 16, 0.3)', // Color de fondo
                  borderColor: '#DA8C10', // Color del borde
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

    $.post("../../controller/dde.php?op=estado4", {id_usuario:id_usuario},function (data) {
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
                  backgroundColor: 'rgba(218, 140, 16, 0.3)', // Color de fondo
                  borderColor: '#DA8C10', // Color del borde
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

    

 
});

init();