<div id="modal_archivo_data" class="modal fade bd-example-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">
                    <i class="font-icon-close-2"></i>
                </button>
                <h5 class="modal-title">ARCHIVOS COMPARTIDOS</h5>
            </div>

                <input  type="hidden" id="id_usuario3" name="id_usuario" value="<?php echo $_SESSION["id_usuario"] ?>">
                <input type="hidden" id="id_miembro3" name="id_miembro">
                <input  type="hidden" id="id_estado3" name="id_estado">

                <!-- CONTENIDO -->
                <div class="container">
                    <div><h5 class="m-t-lg with-border">Archivos</h5></div>
                   
                    <div class="col-lg-12">
                        <fieldset class="form-group">
                            <label class="form-label semibold" for="m_cod3">Archivos compartidos para la Dirección Distrital:</label>
                            <input type="text" class="form-control" id="m_cod3" name="m_cod3" disabled>
                        </fieldset>
                    </div>

                    <table id="archivo_data" class="table table-bordered table-striped table-vcenter js-dataTable-full">
					<thead>
						<tr>
							<th class="text-center">Nombre</th>
							<th class="text-center">Descripción</th>
                            <th class="text-center">Tipo</th>
							<th class="text-center">Creador</th>
							<th class="text-center">Descargar</th>
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