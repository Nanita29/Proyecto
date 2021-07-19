var tabla;
var tabla2;

function init(){

    $("#archivo_form").on("submit",function(e){
        guardar_archivo(e);	
    });
    $("#dde_form").on("submit",function(e){
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

    tabla=$('#dde_data').dataTable({
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
            url: '../../controller/dde.php?op=listar',
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

function editar(id_dde){
    $('#mdltitulo').html('EDITAR DIRECCIÓN DISTRITAL');

    $.post("../../controller/dde.php?op=mostrar", {id_dde : id_dde}, function (data) {
        data = JSON.parse(data);
        $('#id_dde').val(data.id_dde);
        $('#id_municipio').val(data.id_municipio);
        $('#id_estado').val(data.id_estado);
        $('#id_usuario').val(data.id_usuario);
        $('#d_cod').val(data.d_cod);
        $('#d_nombre').val(data.d_nombre);
        $('#d_director_nombre').val(data.d_director_nombre);
        $('#d_director_tel').val(data.d_director_tel);
        $('#d_datos').val(data.d_datos);

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
         
        
        $('#d_avance').val(data.d_avance);

    }); 

    $('#modal_dde').modal('show');
}

function archivo(id_dde){
    $('#mdltitulo').html('Nuevo Archivo');

    $.post("../../controller/dde.php?op=mostrar_p/archivo", {id_dde : id_dde}, function (data) {
        data = JSON.parse(data);
        
        $('#id_estado2').val(data.id_estado);
        $('#id_dde2').val(data.id_dde);
        $('#d_cod2').val(data.d_cod);

    }); 

    $('#modal_archivo').modal('show');
}

function archivo_data(id_dde, id_estado){

    $.post("../../controller/dde.php?op=mostrar_p/archivo_data", {id_dde : id_dde}, function (data) {
        data = JSON.parse(data);
        
        $('#id_estado3').val(data.id_estado);
        $('#id_dde3').val(data.id_dde);
        $('#d_cod3').val(data.d_cod);
    });
    console.log(id_estado)
    tabla2=$('#archivo_data').dataTable({
        "ajax":{
            url: '../../controller/dde.php?op=listar_archivo&id_dde='+id_dde+'&id_estado='+id_estado,
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
	var formData = new FormData($("#dde_form")[0]);
    if ($('#id_municipio').val()=='' ){
        swal({
            title: "¡Advertencia!",
            text: "Campos Vacios",
            type: "warning",
            confirmButtonClass: "btn-danger"
        });
    }else{
        swal({
            title: "¿Está seguro?",
            text: "Se registrarán los datos ingresados",
            type: "info",
            showCancelButton: true,
            confirmButtonClass: "btn-success",
            confirmButtonText: "Continuar",
            closeOnConfirm: false
          },
          function(){
                $.ajax({
                    url: "../../controller/dde.php?op=guardaryeditar",
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(datos){    
                        console.log(datos);
                        $('#dde_form')[0].reset();
                        $("#modal_dde").modal('hide');
                        $('#dde_data').DataTable().ajax.reload();

                        swal("¡Correcto!", "Registrado Correctamente", "success");
                    }
                });
          });
        
    } 
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
                url: "../../controller/dde.php?op=guardar_archivo",
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function(datos){    
                    console.log(datos);
                    setTimeout(function () {
                        swal("¡Correcto!", "Registrado Correctamente", "success");
                        $('#archivo_form')[0].reset();
                        $("#modal_archivo").modal('hide');
                        $('#dde_data').DataTable().ajax.reload();
                      }, 2000);
                }
            }); 
          });
    }  
}


$(document).on("click","#btnnuevo", function(){
    $('#mdltitulo').html('NUEVA DIRECCIÓN DISTRITAL');
    $('#dde_form')[0].reset();
    $('#modal_dde').modal('show');
});


init();