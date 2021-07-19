function init(){
   
}

$(document).ready(function(){
    var id_usuario = $('#id_usuariox').val();
    
    $.post("../../controller/usuario.php?op=total_ua", {id_usuario:id_usuario}, function (data) {
        data = JSON.parse(data);
        $('#tot_ua').html(data.TOTAL);
    });

    $.post("../../controller/usuario.php?op=total_ub", {id_usuario:id_usuario}, function (data) {
        data = JSON.parse(data);
        $('#tot_ub').html(data.TOTAL);
    });

    $.post("../../controller/usuario.php?op=total_dde", {id_usuario:id_usuario}, function (data) {
        data = JSON.parse(data);
        $('#tot_dde').html(data.TOTAL);
    });

    $.post("../../controller/usuario.php?op=total_m", {id_usuario:id_usuario}, function (data) {
        data = JSON.parse(data);
        $('#tot_m').html(data.TOTAL);
    });

    $.post("../../controller/usuario.php?op=unidades_ab", {id_usuario:id_usuario},function (data) {
        data = JSON.parse(data);
        console.log(data);
        /* new Morris.Bar({
            element: 'unidades_ab',
            data: data,
            xkey: 'nom',
            ykeys: ['total'],
            labels: ['Total'],

        }); */

        Morris.Donut({
            element: 'unidades_ab',
            data: [
                {label: data[0][0], value: data[0][1]},
                 {label: data[1][0], value: data[1][1]}
              ]
          });
    }); 

    $.post("../../controller/usuario.php?op=total_archivo", {id_usuario:id_usuario},function (data) {
        data = JSON.parse(data);
        console.log(data);
         new Morris.Bar({
            element: 'total_archivo',
            data: data,
            xkey: 'nom',
            ykeys: ['total','total'],
            labels: ['Total'],
            barOpacity: 0.5,
            gridTextColor: '#666'

        }); 

        /* Morris.Donut({
            element: 'total_archivo',
            data: [
                {label: data[0][0], value: data[0][1]},
                {label: data[1][0], value: data[1][1]},
                {label: data[2][0], value: data[2][1]},
                {label: data[3][0], value: data[3][1]},
                 {label: data[4][0], value: data[4][1]}
              ]
          }); */
    }); 
    

 
});

init();