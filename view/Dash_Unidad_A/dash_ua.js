function init(){
   
}

$(document).ready(function(){
    var id_usuario = $('#id_usuariox').val();
    
    $.post("../../controller/unidad_a.php?op=total_ua", {id_usuario:id_usuario}, function (data) {
        data = JSON.parse(data);
        $('#tot_ua').html(data.TOTAL);
    });

    $.post("../../controller/unidad_a.php?op=un_dep_a", {id_usuario:id_usuario},function (data) {
        data = JSON.parse(data);
        console.log(data);
        var nom = [];
        var total = [];

        for (var i in data) {
            nom.push(data[i].nom);
            total.push(data[i].total);
        }
        new Chart(document.getElementById("un_dep_a"), {
            type: 'bar',
            data: {
              labels: nom,
              datasets: [
                {
                  label: "Total",
                    backgroundColor: 'rgba(41, 128, 185 , 0.3)', // Color de fondo
                    borderColor: '#2980B9', // Color del borde
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

    $.post("../../controller/unidad_a.php?op=av_un_dep_a", {id_usuario:id_usuario},function (data) {
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
        new Chart(document.getElementById("av_un_dep_a"), {
            type: 'bar',
            data: {
              labels: nom,
              datasets: [
                {
                  label: "Avance X (%)",
                  backgroundColor: 'rgba(41, 128, 185 , 0.3)', // Color de fondo
                    borderColor: '#2980B9', // Color del borde
                    borderWidth: 2,
                  data: totalx
                },
                {
                    label: "Avance Y (%)",
                    backgroundColor: 'rgba(41, 128, 185 , 0.1)', // Color de fondo
                    borderColor: '#2980B9', // Color del borde
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

    $.post("../../controller/unidad_a.php?op=un_fue_a", {id_usuario:id_usuario},function (data) {
      data = JSON.parse(data);
      console.log(data);
      var nom = [];
      var total = [];

      for (var i in data) {
          nom.push(data[i].nom);
          total.push(data[i].total);
      }
      new Chart(document.getElementById("un_fue_a"), {
          type: 'bar',
          data: {
            labels: nom,
            datasets: [
              {
                label: "Total",
                  backgroundColor: 'rgba(41, 128, 185 , 0.3)', // Color de fondo
                  borderColor: '#2980B9', // Color del borde
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

    $.post("../../controller/unidad_a.php?op=un_mun_a", {id_usuario:id_usuario},function (data) {
      data = JSON.parse(data);
      console.log(data);
      var nom = [];
      var total = [];

      for (var i in data) {
          nom.push(data[i].nom);
          total.push(data[i].total);
      }
      new Chart(document.getElementById("un_mun_a"), {
          type: 'bar',
          data: {
            labels: nom,
            datasets: [
              {
                label: "Total",
                  backgroundColor: 'rgba(41, 128, 185 , 0.3)', // Color de fondo
                  borderColor: '#2980B9', // Color del borde
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

    $.post("../../controller/unidad_a.php?op=estado1", {id_usuario:id_usuario},function (data) {
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
                  backgroundColor: 'rgba(41, 128, 185 , 0.3)', // Color de fondo
                  borderColor: '#2980B9', // Color del borde
                  borderWidth: 2,
                data: total
              }
            ]
          },
          options: {
            legend: { display: false },
            title: {
              display: true,
              text: '1. Conocen la normativa RM 2021/04 Planes de Convivencia Pacífica y Armónica'
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

    $.post("../../controller/unidad_a.php?op=estado2", {id_usuario:id_usuario},function (data) {
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
                  backgroundColor: 'rgba(41, 128, 185 , 0.3)', // Color de fondo
                  borderColor: '#2980B9', // Color del borde
                  borderWidth: 2,
                data: total
              }
            ]
          },
          options: {
            legend: { display: false },
            title: {
              display: true,
              text: '2. Desarrollaron talleres para el diseño de PCPA, con representantes por unidad educativa'
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

    $.post("../../controller/unidad_a.php?op=estado3", {id_usuario:id_usuario},function (data) {
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
                  backgroundColor: 'rgba(41, 128, 185 , 0.3)', // Color de fondo
                  borderColor: '#2980B9', // Color del borde
                  borderWidth: 2,
                data: total
              }
            ]
          },
          options: {
            legend: { display: false },
            title: {
              display: true,
              text: '3. Firma y entrega de PCPA'
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

    $.post("../../controller/unidad_a.php?op=estado4", {id_usuario:id_usuario},function (data) {
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
                  backgroundColor: 'rgba(41, 128, 185 , 0.3)', // Color de fondo
                  borderColor: '#2980B9', // Color del borde
                  borderWidth: 2,
                data: total
              }
            ]
          },
          options: {
            legend: { display: false },
            title: {
              display: true,
              text: '4. Informe de implementacion por UE del PCPA'
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

    $.post("../../controller/unidad_a.php?op=estado1_2", {id_usuario:id_usuario},function (data) {
      data = JSON.parse(data);
      console.log(data);
      var nom = [];
      var total = [];

      for (var i in data) {
          nom.push(data[i].nom);
          total.push(data[i].total);
      }
      new Chart(document.getElementById("estado1_2"), {
          type: 'bar',
          data: {
            labels: nom,
            datasets: [
              {
                label: "Total",
                  backgroundColor: 'rgba(41, 128, 185 , 0.3)', // Color de fondo
                  borderColor: '#2980B9', // Color del borde
                  borderWidth: 2,
                data: total
              }
            ]
          },
          options: {
            legend: { display: false },
            title: {
              display: true,
              text: '1. Socialización del protocolo (UE priorizadas) y DNA'
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

    $.post("../../controller/unidad_a.php?op=estado2_2", {id_usuario:id_usuario},function (data) {
      data = JSON.parse(data);
      console.log(data);
      var nom = [];
      var total = [];

      for (var i in data) {
          nom.push(data[i].nom);
          total.push(data[i].total);
      }
      new Chart(document.getElementById("estado2_2"), {
          type: 'bar',
          data: {
            labels: nom,
            datasets: [
              {
                label: "Total",
                  backgroundColor: 'rgba(41, 128, 185 , 0.3)', // Color de fondo
                  borderColor: '#2980B9', // Color del borde
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

    $.post("../../controller/unidad_a.php?op=estado3_2", {id_usuario:id_usuario},function (data) {
      data = JSON.parse(data);
      console.log(data);
      var nom = [];
      var total = [];

      for (var i in data) {
          nom.push(data[i].nom);
          total.push(data[i].total);
      }
      new Chart(document.getElementById("estado3_2"), {
          type: 'bar',
          data: {
            labels: nom,
            datasets: [
              {
                label: "Total",
                  backgroundColor: 'rgba(41, 128, 185 , 0.3)', // Color de fondo
                  borderColor: '#2980B9', // Color del borde
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

    $.post("../../controller/unidad_a.php?op=estado4_2", {id_usuario:id_usuario},function (data) {
      data = JSON.parse(data);
      console.log(data);
      var nom = [];
      var total = [];

      for (var i in data) {
          nom.push(data[i].nom);
          total.push(data[i].total);
      }
      new Chart(document.getElementById("estado4_2"), {
          type: 'bar',
          data: {
            labels: nom,
            datasets: [
              {
                label: "Total",
                  backgroundColor: 'rgba(41, 128, 185 , 0.3)', // Color de fondo
                  borderColor: '#2980B9', // Color del borde
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