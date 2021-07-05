function init(){
    $("#unidad_form").on("submit",function(e){
        
        guardaryeditar(e);	
    });
    
}

$(document).ready(function() {
    

    $.post("../../controller/departamento.php?op=combo",function(data, status){
        $('#id_departamento').html(data);
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
            url: "../../controller/miembro.php?op=insert",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(datos){  
                console.log(datos);
                $('#id_departamento').val('');
                $('#id_estado').val('');
                $('#m_cod').val('');
                $('#m_nombre').val('');
                $('#id_estado').val('');
                $('#m_contactos').val('');
                $('#m_observacion').val('');
                $("#e1t").prop("checked", false);
                $("#e1f").prop("checked", false);
                $("#e2t").prop("checked", false);
                $("#e2f").prop("checked", false);
                $("#e3t").prop("checked", false);
                $("#e3f").prop("checked", false);
                $("#e4t").prop("checked", false);
                $("#e4f").prop("checked", false);
                $("#e5t").prop("checked", false);
                $("#e5f").prop("checked", false);
                $("#e6t").prop("checked", false);
                $("#e6f").prop("checked", false);
                swal("Correcto!", "Registrado Correctamente", "success");
            }  
        }); 
    }
}

init();