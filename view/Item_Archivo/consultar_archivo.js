var tabla;

function init(){
    $("#archivo_form").on("submit",function(e){
        guardar_archivo(e);	
    });
}

$(document).ready(function(){

    tabla=$('#archivo_data').dataTable({
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
            url: '../../controller/archivo.php?op=listar_archivo&id_item='+0+'&id_estado='+5,
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

function guardar_archivo(e){
    e.preventDefault();
	var formData = new FormData($("#archivo_form")[0]);
    if ($('#nombre_ar').val()=='' || $('#descripcion_ar').val()=='' || $('#tipo_ar').val()==''|| $('#archivo').val()==''){
        swal({
            title: "¡Advertencia!",
            text: "Campos Vacios",
            type: "warning",
            confirmButtonClass: "btn-warning"
        });
    }else{
        swal({
            title: "¿Está seguro?",
            text: "Se registrarán los datos ingresados",
            type: "info",
            showCancelButton: true,
            confirmButtonText: "Continuar",
            cancelButtonText: "Cancelar",
            showLoaderOnConfirm: true,
            closeOnConfirm: false
          },
          function(){
                $.ajax({
                    url: "../../controller/archivo.php?op=guardar_archivo",
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(datos){    
                        console.log(datos);
                        swal("¡Correcto!", "Registrado Correctamente", "success");
                        $('#archivo_form')[0].reset();
                        $("#modal_archivo").modal('hide');
                        $('#archivo_data').DataTable().ajax.reload();
                    },
                    error: function(datos){
                        swal({
                            title: "¡Error!",
                            text: "No registrado Correctamente",
                            type: "error",
                            confirmButtonClass: "btn-danger",
                            confirmButtonText: "Aceptar"
                        })
                    }
                });        
          });
        
    }
}

function archivo_data(){

    $('#modal_archivo_data').modal('show');
}

function eliminar(id_archivo){
    swal({
        title: "¡Advertencia!",
        text: "¿Está seguro de eliminar el registro?",
        type: "error",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Continuar",
        cancelButtonText: "Cancelar",
        closeOnConfirm: false
    },
    function(isConfirm) {
        if (isConfirm) {
            $.post("../../controller/archivo.php?op=eliminar", {id_archivo : id_archivo}, function (data) {

            }); 

            $('#archivo_data').DataTable().ajax.reload();	

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
    $('#mdltitulo').html('Nuevo Archivo');
    $('#archivo_form')[0].reset();
    $('#modal_archivo').modal('show');
});

init();