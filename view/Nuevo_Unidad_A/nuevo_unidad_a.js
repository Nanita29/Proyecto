function init(){
    $("#unidad_form").on("submit",function(e){
        
        guardaryeditar(e);	
    });
    
}

$(document).ready(function() {
    

    $.post("../../controller/comunidad.php?op=combo",function(data, status){
        $('#id_comunidad').html(data);
    });

    $.post("../../controller/estado.php?op=combo",function(data, status){
        $('#id_estado').html(data);
    });

    $.post("../../controller/fuente.php?op=combo",function(data, status){
        $('#id_fuente').html(data);
    });

});

function fileUno(){
     const reader = new FileReader();
    reader.readAsDataURL(document.querySelector('#e1').files[0]);
    
    reader.onload = function () {                
        document.querySelector("#file1").value =reader.result;

    }; 

}

function fileDos(){
     const reader = new FileReader();
    reader.readAsDataURL(document.querySelector('#e2').files[0]);
    
    reader.onload = function () {                
        document.querySelector("#file2").value =reader.result;

    }; 

}

function fileTres(){
     const reader = new FileReader();
    reader.readAsDataURL(document.querySelector('#e3').files[0]);
    
    reader.onload = function () {                
        document.querySelector("#file3").value =reader.result;

    }; 

}

function fileCuatro(){
     const reader = new FileReader();
    reader.readAsDataURL(document.querySelector('#e4').files[0]);
    
    reader.onload = function () {                
        document.querySelector("#file4").value =reader.result;

    }; 

}
function guardaryeditar(e){
    e.preventDefault();
    var formData = new FormData($("#unidad_form")[0]);
    //if ($('#a_nombre').val()=='' || $('#a_director_nombre').val()==''|| $('#a_director_tel').val()==''){
    //    swal("Advertencia!", "Campos Vacios", "warning");

if(false){
    }else{
        $.ajax({
            
            url: "../../controller/unidad_a.php?op=insert",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(datos){  
                $('#id_comunidad').val('');
                $('#id_estado').val('');
                $('#id_fuente').val('');
                $('#a_cod').val('');
                $('#a_nombre').val('');
                $('#id_comunidad').val('');
                $('#id_estado').val('');
                $('#id_fuente').val('');
                $('#id_usuario').val('');
                $('#a_director_nombre').val('');
                $('#a_director_tel').val('');
                $('#a_pcpa').val('');
                $('#a_tecnico').val('');
                $('#a_docen_ini_v').val('');
                $('#a_docen_ini_m').val('');
                $('#a_docen_pri_v').val('');
                $('#a_docen_pri_m').val('');
                $('#a_docen_sec_v').val('');
                $('#a_docen_sec_m').val('');
                $('#a_est_ini_v').val('');
                $('#a_est_ini_m').val('');
                $('#a_est_pri_v').val('');
                $('#a_est_pri_m').val('');
                $('#a_est_sec_v').val('');
                $('#a_est_sec_m').val('');
                $('#a_per_med_v').val('');
                $('#a_per_med_m').val('');
                $('#a_per_enf_v').val('');
                $('#a_per_enf_m').val('');
                $('#file2').val('');
                $('#file1').val('');
                $('#a_avance').val('');
                swal("Correcto!", "Registrado Correctamente", "success");
            }  
        }); 
    }
}

init();