var tabla;
var tabla2;

function init(){

    $("#archivo_form").on("submit",function(e){
        guardar_archivo(e);	
    });
    $("#miembro_form").on("submit",function(e){
        guardaryeditar(e);	
    });

    
}

$(document).ready(function(){

    $.post("../../controller/municipio.php?op=combo",function(data, status){
        $('#id_municipio').html(data);
    });

    $.post("../../controller/estado.php?op=combo",function(data, status){
        $('#id_estado').html(data);
    });

    tabla=$('#miembro_data').dataTable({
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
            url: '../../controller/miembro.php?op=listar',
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

function editar(id_miembro){
    $('#mdltitulo').html('EDITAR MIEMBRO DE PERSONAL TÉCNICO');

    $.post("../../controller/miembro.php?op=mostrar", {id_miembro : id_miembro}, function (data) {
        data = JSON.parse(data);

        $('#id_miembro').val(data.id_miembro);
        $('#id_municipio').val(data.id_municipio);
        $('#id_estado').val(data.id_estado);
        $('#m_cod').val(data.m_cod);
        $('#m_nombre').val(data.m_nombre);
        $('#m_contactos').val(data.m_contactos);
        $('#m_observacion').val(data.m_observacion);
        if((data.e1)==2){
            $("#e1t").prop("checked", true);
        };
        if((data.e1)==1){
            $("#e1f").prop("checked", true);
        };

        if((data.e2)==2){
            $("#e2t").prop("checked", true);
        };
        if((data.e2)==1){
            $("#e2f").prop("checked", true);
        };

        if((data.e3)==2){
            $("#e3t").prop("checked", true);
        };
        if((data.e3)==1){
            $("#e3f").prop("checked", true);
        };

        if((data.e4)==2){
            $("#e4t").prop("checked", true);
        };
        if((data.e4)==1){
            $("#e4f").prop("checked", true);
        };

        if((data.e5)==2){
            $("#e5t").prop("checked", true);
        };
        if((data.e5)==1){
            $("#e5f").prop("checked", true);
        };

        if((data.e6)==2){
            $("#e6t").prop("checked", true);
        };
        if((data.e6)==1){
            $("#e6f").prop("checked", true);
        };

        

        
        $('#m_avance').val(data.m_avance);

    }); 

    $('#modal_miembro').modal('show');
}

function archivo(id_miembro){
    $('#mdltitulo').html('Nuevo Archivo');

    $.post("../../controller/miembro.php?op=mostrar_p/archivo", {id_miembro : id_miembro}, function (data) {
        data = JSON.parse(data);
        
        $('#id_estado2').val(data.id_estado);
        $('#id_miembro2').val(data.id_miembro);
        $('#m_cod2').val(data.m_cod);

    }); 

    $('#modal_archivo').modal('show');
}

function archivo_data(id_miembro, id_estado){

    $.post("../../controller/miembro.php?op=mostrar_p/archivo_data", {id_miembro : id_miembro}, function (data) {
        data = JSON.parse(data);
        
        $('#id_estado3').val(data.id_estado);
        $('#id_miembro3').val(data.id_miembro);
        $('#m_cod3').val(data.m_cod);
    });
    tabla2=$('#archivo_data').dataTable({
        "ajax":{
            url: '../../controller/miembro.php?op=listar_archivo&id_miembro='+id_miembro+'&id_estado='+4,
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

    $('#modal_archivo_data').modal('show');
}

function guardaryeditar(e){
    e.preventDefault();
	var formData = new FormData($("#miembro_form")[0]);
    $.ajax({
        url: "../../controller/miembro.php?op=guardaryeditar",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function(datos){    
            console.log(datos);
            $('#miembro_form')[0].reset();
            $("#modal_miembro").modal('hide');
            $('#miembro_data').DataTable().ajax.reload();

            swal({
                title: "Alerta",
                text: "Completado",
                type: "success",
                confirmButtonClass: "btn-success"
            });
        }
    }); 
}

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
                url: "../../controller/miembro.php?op=guardar_archivo",
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function(datos){    
                    console.log(datos);
                        swal("¡Correcto!", "Registrado Correctamente", "success");
                        $('#archivo_form')[0].reset();
                        $("#modal_archivo").modal('hide');
                        $('#miembro_data').DataTable().ajax.reload();
                  
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

function eliminar(id_miembro){
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
            $.post("../../controller/miembro.php?op=eliminar", {id_miembro : id_miembro}, function (data) {

            }); 

            $('#miembro_data').DataTable().ajax.reload();	

            swal({
                title: "Alerta",
                text: "Datos eliminados",
                type: "success",
                confirmButtonClass: "btn-success"
            });
        }
    });
}

function eliminar_archivo(id_archivo){
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
            $.post("../../controller/miembro.php?op=eliminar_archivo", {id_archivo : id_archivo}, function (data) {

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
    $('#mdltitulo').html('NUEVO MIEMBRO DEL PERSONAL TÉCNICO');
    $('#miembro_form')[0].reset();
    $('#modal_miembro').modal('show');
});


init();