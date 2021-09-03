<div id="modal_departamento_data" class="modal fade bd-example-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">
                    <i class="font-icon-close-2"></i>
                </button>
                <h5 class="modal-title">DEPARTAMENTOS ASINADOS</h5>
            </div>

            <input type="hidden" id="id_usuario3" name="id_usuario3">

                <!-- CONTENIDO -->
                <div class="container">
                    <div><h5 class="m-t-lg with-border">Departamentos</h5></div>
                   
                    <div class="col-lg-12">
                    <fieldset class="form-group">
                            <label class="form-label semibold" for="usu_correo3">Departamentos asignados al usuario:</label>
                            <input type="text" class="form-control" id="usu_correo3" name="usu_correo3" disabled>
                        </fieldset>
                    </div>

                    <table id="departamento_data" class="table table-bordered table-striped table-vcenter js-dataTable-full">
					<thead>
						<tr>
							<th class="text-center">Nombre</th>
						</tr>
					</thead>
					<tbody>

					</tbody>
				</table>

                </div>

                

                <div class="modal-footer">
                    <button type="button" class="btn btn-rounded btn-default" data-dismiss="modal">Cerrar</button>
                </div>
        </div>
    </div>
</div>