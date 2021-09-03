function init(){
   
}

$(document).ready(function(){
    var id_usuario = $('#id_usuariox').val();
    
    $.post("../../controller/unidad_a.php?op=total_ua", {id_usuario:id_usuario}, function (data) {
        data = JSON.parse(data);
        $('#tot_ua').html(data.TOTAL);
    });

    $.post("../../controller/unidad_b.php?op=total_ub", {id_usuario:id_usuario}, function (data) {
        data = JSON.parse(data);
        $('#tot_ub').html(data.TOTAL);
    });

    $.post("../../controller/dde.php?op=total_dde", {id_usuario:id_usuario}, function (data) {
        data = JSON.parse(data);
        $('#tot_dde').html(data.TOTAL);
    });

    $.post("../../controller/miembro.php?op=total_m", {id_usuario:id_usuario}, function (data) {
        data = JSON.parse(data);
        $('#tot_m').html(data.TOTAL);
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
              ticks: {
                beginAtZero: true
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
        var total = [];

        for (var i in data) {
            nom.push(data[i].nom);
            total.push(data[i].total);
        }
        new Chart(document.getElementById("av_un_dep_b"), {
            type: 'bar',
            data: {
              labels: nom,
              datasets: [
                {
                  label: "Avance (%)",
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
                text: 'Avance (Estados de Monitoreo) por Departamento'
              },
              ticks: {
                beginAtZero: true
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
        var total = [];

        for (var i in data) {
            nom.push(data[i].nom);
            total.push(data[i].total);
        }
        new Chart(document.getElementById("av_dde_dep"), {
            type: 'bar',
            data: {
              labels: nom,
              datasets: [
                {
                  label: "Avance (%)",
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
                text: 'Total Miembros de Personal Técnico por Departamento'
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
        var total = [];

        for (var i in data) {
            nom.push(data[i].nom);
            total.push(data[i].total);
        }
        new Chart(document.getElementById("av_m_dep"), {
            type: 'bar',
            data: {
              labels: nom,
              datasets: [
                {
                    label: "Avance (%)",
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

    

    

 
});

init();