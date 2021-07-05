function init(){
    $("#unidad_form").on("submit",function(e){
        
        guardaryeditar(e);	
    });
    
}

$(document).ready(function() {
    

    $.post("../../controller/municipio.php?op=combo",function(data, status){
        $('#id_municipio').html(data);
    });

    $.post("../../controller/estado.php?op=combo",function(data, status){
        $('#id_estado').html(data);
    });

    /* $.post("../../controller/fuente.php?op=combo",function(data, status){
        $('#id_fuente').html(data);
    }); */

});

function guardaryeditar(e){
    e.preventDefault();
    var formData = new FormData($("#unidad_form")[0]);
    //if ($('#d_nombre').val()=='' || $('#d_director_nombre').val()==''|| $('#d_director_tel').val()==''){
    //    swal("Advertencia!", "Campos Vacios", "warning");

if(false){
    }else{
        $.ajax({
            url: "../../controller/dde.php?op=insert",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(datos){  
                console.log(datos);
                $('#id_municipio').val('');
                $('#id_estado').val('');
                $('#d_cod').val('');
                $('#d_nombre').val('');
                $('#id_estado').val('');
                $('#id_usuario').val('');
                $('#d_director_nombre').val('');
                $('#d_director_tel').val('');
                $('#d_datos').val('');
                $("#e1t").prop("checked", false);
                $("#e1f").prop("checked", false);
                $("#e2t").prop("checked", false);
                $("#e2f").prop("checked", false);
                $("#e3t").prop("checked", false);
                $("#e3f").prop("checked", false);
                $("#e4t").prop("checked", false);
                $("#e4f").prop("checked", false);
                swal("Correcto!", "Registrado Correctamente", "success");
            }  
        }); 
    }
}

init();