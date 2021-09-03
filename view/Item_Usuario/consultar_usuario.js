var tabla;
var tabla2;

function init(){
    $("#usuario_form").on("submit",function(e){
        guardaryeditar(e);	
    });

    $("#departamento_form").on("submit",function(e){
        agregar_dpto(e);	
    });
}

function guardaryeditar(e){
    e.preventDefault();
	var formData = new FormData($("#usuario_form")[0]);
    $.ajax({
        url: "../../controller/usuario.php?op=guardaryeditar",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function(datos){    
            console.log(datos);
            $('#usuario_form')[0].reset();
            $("#modal_usuario").modal('hide');
            $('#usuario_data').DataTable().ajax.reload();

            swal({
                title: "Alerta",
                text: "Completado",
                type: "success",
                confirmButtonClass: "btn-success"
            });
        }
    }); 
}

function agregar_dpto(e){
    e.preventDefault();
	var formData = new FormData($("#departamento_form")[0]);
    $.ajax({
        url: "../../controller/usuario.php?op=agregar_dpto",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function(datos){    
            console.log(datos);
            $('#departamento_form')[0].reset();
            $("#modal_departamento").modal('hide');
            $('#usuario_data').DataTable().ajax.reload();

            swal({
                title: "Alerta",
                text: "Completado",
                type: "success",
                confirmButtonClass: "btn-success"
            });
        }
    }); 
}

function departamento_data(id_usuario){

    $.post("../../controller/usuario.php?op=mostrar", {id_usuario : id_usuario}, function (data) {
        data = JSON.parse(data);
        $('#id_usuario3').val(data.id_usuario);
        $('#usu_correo3').val(data.usu_correo);
    }); 
    console.log('../../controller/usuario.php?op=listar_dpto&id_usuario='+id_usuario)
    tabla2=$('#departamento_data').dataTable({
        "ajax":{
            url: '../../controller/usuario.php?op=listar_dpto&id_usuario='+id_usuario,
            type : "post",
            dataType : "json",						
            error: function(e){
                console.log(e.responseText);	
            }
        },
        "bDestroy": true,
        "responsive": true,
        "bInfo":true,
        "iDisplayLength": 10,
        "autoWidth": false,
        "language": {
            "sProcessing":     "Procesando...",
            "sLengthMenu":     "Mostrar _MENU_ registros",
            "sZeroRecords":    "No se encontraron resultados",
            "sEmptyTable":     "Ningún dato disponible en esta tabla",
            "sInfo":           "_TOTAL_ registros",
            "sInfoEmpty":      "Mostrando un total de 0 registros",
            "sInfoFiltered":   "(_MAX_ registros filtrados)",
            "sInfoPostFix":    "",
            "sSearch":         "Buscar:",
            "sUrl":            "",
            "sInfoThousands":  ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst":    "Primero",
                "sLast":     "Último",
                "sNext":     "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
        }     
    }).DataTable(); 

    $('#modal_departamento_data').modal('show');
}

$(document).ready(function(){

    $.post("../../controller/departamento.php?op=combo",function(data, status){
        $('#id_departamento').html(data);
    });

    tabla=$('#usuario_data').dataTable({
        "aProcessing": true,
        "aServerSide": true,
        dom: 'Bfrtip',
        "searching": true,
        lengthChange: false,
        colReorder: true,
        buttons: [		          
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5'
                ],
        "ajax":{
            url: '../../controller/usuario.php?op=listar',
            type : "post",
            dataType : "json",						
            error: function(e){
                console.log(e.responseText);	
            }
        },
        "bDestroy": true,
        "responsive": true,
        "bInfo":true,
        "iDisplayLength": 10,
        "autoWidth": false,
        "language": {
            "sProcessing":     "Procesando...",
            "sLengthMenu":     "Mostrar _MENU_ registros",
            "sZeroRecords":    "No se encontraron resultados",
            "sEmptyTable":     "Ningún dato disponible en esta tabla",
            "sInfo":           "Mostrando un total de _TOTAL_ registros",
            "sInfoEmpty":      "Mostrando un total de 0 registros",
            "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix":    "",
            "sSearch":         "Buscar:",
            "sUrl":            "",
            "sInfoThousands":  ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst":    "Primero",
                "sLast":     "Último",
                "sNext":     "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
        }     
    }).DataTable(); 
});

function editar(id_usuario){
    $('#mdltitulo').html('Editar Usuario');

    $.post("../../controller/usuario.php?op=mostrar", {id_usuario : id_usuario}, function (data) {
        data = JSON.parse(data);
        $('#id_usuario').val(data.id_usuario);
        $('#nombre_usu').val(data.nombre_usu);
        $('#apellido_usu').val(data.apellido_usu);
        $('#usu_correo').val(data.usu_correo);
        $('#usu_pass').val(data.usu_pass);
        $('#rol_id').val(data.rol_id).trigger('change');
    }); 

    $('#modal_usuario').modal('show');
}

function departamento(id_usuario){
    $('#mdltitulo').html('Agregar Departamento a un Usuario');

    $.post("../../controller/usuario.php?op=mostrar", {id_usuario : id_usuario}, function (data) {
        data = JSON.parse(data);
        $('#id_usuario2').val(data.id_usuario);
        $('#nombre_usu2').val(data.nombre_usu);
        $('#apellido_usu2').val(data.apellido_usu);
        $('#usu_correo2').val(data.usu_correo);
        $('#usu_pass2').val(data.usu_pass);
        $('#rol_id2').val(data.rol_id).trigger('change');
    }); 

    $('#modal_departamento').modal('show');
}

function eliminar(id_usuario){
    swal({
        title: "¡Advertencia!",
        text: "¿Está seguro de eliminar el usuario?",
        type: "error",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Continuar",
        cancelButtonText: "Cancelar",
        closeOnConfirm: false
    },
    function(isConfirm) {
        if (isConfirm) {
            $.post("../../controller/usuario.php?op=eliminar", {id_usuario : id_usuario}, function (data) {

            }); 

            $('#usuario_data').DataTable().ajax.reload();	

            swal({
                title: "Alerta",
                text: "Datos eliminados",
                type: "success",
                confirmButtonClass: "btn-success"
            });
        }
    });
}

$(document).on("click","#btnnuevo", function(){
    $('#mdltitulo').html('Nuevo Usuario');
    $('#usuario_form')[0].reset();
    $('#modal_usuario').modal('show');
});

init();