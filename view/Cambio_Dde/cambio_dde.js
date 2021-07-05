function init(){
   
    $("#unidad_a_detalle").on("submit",function(e){
        guardaryeditar(e);	
    });
     
}

$(document).ready(function() {
    
    
    var data = getUrlParameter('DATA');
    
    dataSep=data.split(',')

    var id_dde =dataSep[0];
    var id_municipio = dataSep[1];
console.log(dataSep);


   
    $.post("../../controller/dde.php?op=listardetalle",{ id_dde : id_dde },function(data){
        $('#unidad_a_detalle').html(data);
        console.log(id_dde);
    });


    $.post("../../controller/municipio.php?op=combo&id_sel="+id_municipio,function(data, status){
        $('#id_municipio').html(data);
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
            url: "../../controller/dde.php?op=update",
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

function listar_dde_id(id_dde){
    $.post("../../controller/dde.php?op=listar_dde_id", { id_dde : id_dde }, function (data) {
        $('#id_dde').html(data);
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