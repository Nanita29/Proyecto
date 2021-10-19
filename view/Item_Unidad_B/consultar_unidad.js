var tabla;
var tabla2;

function init(){
    $("#archivo_form").on("submit",function(e){
        guardar_archivo(e);	
    });
    $("#unidad_form").on("submit",function(e){
        guardaryeditar(e);	
    });
}

$(document).ready(function(){

    $.post("../../controller/comunidad.php?op=combo",function(data, status){
        $('#id_comunidad').html(data);
    });

    $.post("../../controller/estado.php?op=combo",function(data, status){
        $('#id_estado').html(data);
    });

    $.post("../../controller/fuente.php?op=combo",function(data, status){
        $('#id_fuente').html(data);
    });

    tabla=$('#unidad_data').dataTable({
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
            url: '../../controller/unidad_b.php?op=listar',
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

function editar(id_unidad_a){
    $('#mdltitulo').html('EDITAR UNIDAD EDUCATIVA');

    $.post("../../controller/unidad_b.php?op=mostrar", {id_unidad_a : id_unidad_a}, function (data) {
        data = JSON.parse(data);
        $('#id_unidad_a').val(data.id_unidad_a);
        $('#id_comunidad').val(data.id_comunidad);
        $('#id_estado').val(data.id_estado);
        $('#id_fuente').val(data.id_fuente);
        $('#a_cod').val(data.a_cod);
        $('#a_nombre').val(data.a_nombre);
        $('#a_director_nombre').val(data.a_director_nombre);
        $('#a_director_tel').val(data.a_director_tel);
        $('#a_dna').val(data.a_dna);
        $('#a_centro_salud').val(data.a_centro_salud);
        $('#a_tecnico').val(data.a_tecnico);
        $('#a_docen_ini_v').val(data.a_docen_ini_v);
        $('#a_docen_ini_m').val(data.a_docen_ini_m);
        $('#a_docen_pri_v').val(data.a_docen_pri_v);
        $('#a_docen_pri_m').val(data.a_docen_pri_m);
        $('#a_docen_sec_v').val(data.a_docen_sec_v);
        $('#a_docen_sec_m').val(data.a_docen_sec_m);
        $('#a_est_ini_v').val(data.a_est_ini_v);
        $('#a_est_ini_m').val(data.a_est_ini_m);
        $('#a_est_pri_v').val(data.a_est_pri_v);
        $('#a_est_pri_m').val(data.a_est_pri_m);
        $('#a_est_sec_v').val(data.a_est_sec_v);
        $('#a_est_sec_m').val(data.a_est_sec_m);
        $('#a_per_med_v').val(data.a_per_med_v);
        $('#a_per_med_m').val(data.a_per_med_m);
        $('#a_per_enf_v').val(data.a_per_enf_v);
        $('#a_per_enf_m').val(data.a_per_enf_m);
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
        $('#a_avance').val(data.a_avance);

    }); 

    $('#modal_unidad').modal('show');
}

function archivo(id_unidad_a){
    $('#mdltitulo').html('Nuevo Archivo');

    $.post("../../controller/unidad_b.php?op=mostrar_p/archivo", {id_unidad_a : id_unidad_a}, function (data) {
        data = JSON.parse(data);
        
        $('#id_estado2').val(data.id_estado);
        $('#id_unidad_a2').val(data.id_unidad_a);
        $('#a_cod2').val(data.a_cod);

    }); 

    $('#modal_archivo').modal('show');
}

function archivo_data(id_unidad_a,id_estado){

    $.post("../../controller/unidad_b.php?op=mostrar_p/archivo_data", {id_unidad_a : id_unidad_a}, function (data) {
        data = JSON.parse(data);
        
        $('#id_estado3').val(data.id_estado);
        $('#id_unidad_a3').val(data.id_unidad_a);
        $('#a_cod3').val(data.a_cod);
    });
    console.log('../../controller/unidad_b.php?op=listar_archivo&id_unidad_a='+id_unidad_a+'&id_estado='+ 3)
    
    tabla2=$('#archivo_data').dataTable({
        "ajax":{
            url: '../../controller/unidad_b.php?op=listar_archivo&id_unidad_a='+id_unidad_a+'&id_estado='+3,
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
	var formData = new FormData($("#unidad_form")[0]);
    if ($('#a_cod').val()=='' || $('#a_nombre').val()=='' ){
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
                url: "../../controller/unidad_b.php?op=guardaryeditar",
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function(datos){    
                    console.log(datos);
                    swal({
                        title: "Completado",
                        text: "Datos registrados",
                        type: "success",
                        confirmButtonClass: "btn-success"
                    });
                        $('#archivo_form')[0].reset();
                        $("#modal_unidad").modal('hide');
                        $('#unidad_data').DataTable().ajax.reload();
                     
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
                url: "../../controller/unidad_b.php?op=guardar_archivo",
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function(datos){    
                    console.log(datos);
                    swal({
                        title: "Completado",
                        text: "Datos registrados",
                        type: "success",
                        confirmButtonClass: "btn-success"
                    });
                        $('#archivo_form')[0].reset();
                        $("#modal_archivo").modal('hide');
                        $('#unidad_data').DataTable().ajax.reload();
                     
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

function eliminar(id_unidad_a){
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
            $.post("../../controller/unidad_b.php?op=eliminar", {id_unidad_a : id_unidad_a}, function (data) {

            }); 

            $('#unidad_data').DataTable().ajax.reload();	

            swal({
                title: "Completado",
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
            $.post("../../controller/unidad_b.php?op=eliminar_archivo", {id_archivo : id_archivo}, function (data) {

            }); 

            $('#archivo_data').DataTable().ajax.reload();	

            swal({
                title: "Completado",
                text: "Datos eliminados",
                type: "success",
                confirmButtonClass: "btn-success"
            });
        }
    });
}

$(document).on("click","#btnnuevo", function(){
    $('#mdltitulo').html('NUEVA UNIDAD EDUCATIVA');
    $('#unidad_form')[0].reset();
    $('#modal_unidad').modal('show');
});


init();