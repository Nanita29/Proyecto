function init(){
   
}

$(document).ready(function(){
    var id_usuario = $('#id_usuariox').val();
    
    $.post("../../controller/unidad_b.php?op=total_ub", {id_usuario:id_usuario}, function (data) {
        data = JSON.parse(data);
        $('#tot_ub').html(data.TOTAL);
    });

    $.post("../../controller/unidad_b.php?op=un_dep_b", {id_usuario:id_usuario},function (data) {
        data = JSON.parse(data);
        console.log(data);
        var nom = [];
        var total = [];

        for (var i in data) {
            nom.push(data[i].nom);
            total.push(data[i].total);
        }
        new Chart(document.getElementById("un_dep_b"), {
            type: 'bar',
            data: {
              labels: nom,
              datasets: [
                {
                  label: "Total",
                    backgroundColor: 'rgba(22, 160, 133 , 0.3)', // Color de fondo
                    borderColor: '#16A085', // Color del borde
                    borderWidth: 2,
                  data: total
                }
              ]
            },
            options: {
              legend: { display: false },
              title: {
                display: true,
                text: 'Total Unidades Educativas por Departamento'
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

    $.post("../../controller/unidad_b.php?op=av_un_dep_b", {id_usuario:id_usuario},function (data) {
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
        new Chart(document.getElementById("av_un_dep_b"), {
            type: 'bar',
            data: {
              labels: nom,
              datasets: [
                {
                  label: "Avance X (%)",
                  backgroundColor: 'rgba(22, 160, 133 , 0.3)', // Color de fondo
                    borderColor: '#16A085', // Color del borde
                    borderWidth: 2,
                  data: totalx
                },
                {
                    label: "Avance Y (%)",
                    backgroundColor: 'rgba(41, 128, 185 , 0.1)', // Color de fondo
                    borderColor: '#16A085', // Color del borde
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

    $.post("../../controller/unidad_b.php?op=un_fue_b", {id_usuario:id_usuario},function (data) {
      data = JSON.parse(data);
      console.log(data);
      var nom = [];
      var total = [];

      for (var i in data) {
          nom.push(data[i].nom);
          total.push(data[i].total);
      }
      new Chart(document.getElementById("un_fue_b"), {
          type: 'bar',
          data: {
            labels: nom,
            datasets: [
              {
                label: "Total",
                  backgroundColor: 'rgba(22, 160, 133 , 0.3)', // Color de fondo
                  borderColor: '#16A085', // Color del borde
                  borderWidth: 2,
                data: total
              }
            ]
          },
          options: {
            legend: { display: false },
            title: {
              display: true,
              text: 'Total Unidades Educativas por Fuente de Financiamiento'
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

    $.post("../../controller/unidad_b.php?op=un_mun_b", {id_usuario:id_usuario},function (data) {
      data = JSON.parse(data);
      console.log(data);
      var nom = [];
      var total = [];

      for (var i in data) {
          nom.push(data[i].nom);
          total.push(data[i].total);
      }
      new Chart(document.getElementById("un_mun_b"), {
          type: 'bar',
          data: {
            labels: nom,
            datasets: [
              {
                label: "Total",
                  backgroundColor: 'rgba(22, 160, 133 , 0.3)', // Color de fondo
                  borderColor: '#16A085', // Color del borde
                  borderWidth: 2,
                data: total
              }
            ]
          },
          options: {
            legend: { display: false },
            title: {
              display: true,
              text: 'Total Unidades Educativas por Municipio'
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

    $.post("../../controller/unidad_b.php?op=estado1", {id_usuario:id_usuario},function (data) {
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
                  backgroundColor: 'rgba(22, 160, 133 , 0.3)', // Color de fondo
                  borderColor: '#16A085', // Color del borde
                  borderWidth: 2,
                data: SI
              },
              {
                label: "NO",
                  backgroundColor: 'rgba(41, 128, 185 , 0.1)', // Color de fondo
                  borderColor: '#16A085', // Color del borde
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

    $.post("../../controller/unidad_b.php?op=estado2", {id_usuario:id_usuario},function (data) {
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
                  backgroundColor: 'rgba(22, 160, 133 , 0.3)', // Color de fondo
                  borderColor: '#16A085', // Color del borde
                  borderWidth: 2,
                data: total
              }
            ]
          },
          options: {
            legend: { display: false },
            title: {
              display: true,
              text: '2. Elaboración - aprobación del mecanismo de referencia y contra referencia de casos (DDE, IPELC, UE priorizadas y DNA)'
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

    $.post("../../controller/unidad_b.php?op=estado3", {id_usuario:id_usuario},function (data) {
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
                  backgroundColor: 'rgba(22, 160, 133 , 0.3)', // Color de fondo
                  borderColor: '#16A085', // Color del borde
                  borderWidth: 2,
                data: total
              }
            ]
          },
          options: {
            legend: { display: false },
            title: {
              display: true,
              text: '3. Gestión para recojo de información referida al reporte de casos y funcionamiento del mecanismo (directores UE, Comisiones de Convivencia en coordinación con DNA)'
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

    $.post("../../controller/unidad_b.php?op=estado4", {id_usuario:id_usuario},function (data) {
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
                  backgroundColor: 'rgba(22, 160, 133 , 0.3)', // Color de fondo
                  borderColor: '#16A085', // Color del borde
                  borderWidth: 2,
                data: total
              }
            ]
          },
          options: {
            legend: { display: false },
            title: {
              display: true,
              text: '4. Socialización de la experiencia'
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