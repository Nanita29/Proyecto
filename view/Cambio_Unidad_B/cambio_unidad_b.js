function init(){
   
    $("#unidad_a_detalle").on("submit",function(e){
        guardaryeditar(e);	
    });
     
}

$(document).ready(function() {
    
    
    var data = getUrlParameter('DATA');
    
    dataSep=data.split(',')

    var id_unidad_a =dataSep[0];
    var id_comunidad = dataSep[1];
    var id_fuente =dataSep[2];
console.log(dataSep);


   
    $.post("../../controller/unidad_b.php?op=listardetalle",{ id_unidad_a : id_unidad_a },function(data){
        $('#unidad_a_detalle').html(data);
    });

    $.post("../../controller/comunidad.php?op=combo&id_sel="+id_comunidad,function(data, status){
        $('#id_comunidad').html(data);
    });

    $.post("../../controller/fuente.php?op=combo&id_sel="+id_fuente,function(data, status){
        $('#id_fuente').html(data);
    });

    $.post("../../controller/estado.php?op=combo",function(data, status){
        $('#id_estado').html(data);
    }); 

    


   

});

var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = decodeURIComponent(window.location.search.substring(1)),
        sURLVariables = sPageURL.split('?'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : sParameterName[1];
        }
    }
};

function guardaryeditar(e){
    e.preventDefault();
    var formData = new FormData($("#unidad_form")[0]);

    //if ($('#a_nombre').val()=='' || $('#a_director_nombre').val()==''|| $('#a_director_tel').val()==''){
    //    swal("Advertencia!", "Campos Vacios", "warning");
    if(false){
    }else{
        $.ajax({
            url: "../../controller/unidad_b.php?op=update",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            
            success: function(datos){  
                console.log(datos);
                swal("Correcto!", "Actualizado Correctamente", "success");
            } , 
            error: function(e) { 
                console.log("Status: " + e); 
            }    
        }); 
    }
}

function listar_unidad_a_id(id_unidad_a){
    $.post("../../controller/unidad_b.php?op=listar_unidad_a_id", { id_unidad_a : id_unidad_a }, function (data) {
        $('#id_unidad_a').html(data);
        $('#a_cod').val(data.a_cod);
                $('#a_nombre').val(data.a_nombre);
    }); 

    /* $.post("../../controller/ticket.php?op=mostrar", { id_unidad_a : id_unidad_a }, function (data) {
        data = JSON.parse(data);
        
        $('#a_nombre').val(data.a_nombre);

        console.log( data.a_nombre);
    }); */ 
}

init();