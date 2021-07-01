/* 

$(document).ready(function() {
    $('#descripcionF').summernote({
        height: 150,
        lang: "es-ES",
        callbacks: {
            onImageUpload: function(image) {
                console.log("Image detect...");
                myimagetreat(image[0]);
            },
            onPaste: function (e) {
                console.log("Text detect...");
            }
        }
    });

    $.post("../../controller/comunidad.php?op=combo",function(data, status){
        $('#id_comunidad').html(data);
    });

});
 */

function init(){
   
    $("#fuente_form").on("submit",function(e){
        guardaryeditar(e);	
    });
    
}

$(document).ready(function() {
    

    $.post("../../controller/comunidad.php?op=combo",function(data, status){
        $('#id_comunidad').html(data);
    });

});

function guardaryeditar(e){
    e.preventDefault();
    var formData = new FormData($("#fuente_form")[0]);
    if ($('#nombre_fue').val()=='' || $('#descripcion_fue').val()==''){
        swal("Advertencia!", "Campos Vacios", "warning");
    }else{
        $.ajax({
            url: "../../controller/fuente.php?op=insert",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(datos){  
                console.log(datos);
                $('#descripcion_fue').val('');
                $('#nombre_fue').val('');
                swal("Correcto!", "Registrado Correctamente", "success");
            }  
        }); 
    }
}

init();
