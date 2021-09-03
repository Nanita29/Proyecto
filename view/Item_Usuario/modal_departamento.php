<div id="modal_departamento" class="modal fade bd-example-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">
                    <i class="font-icon-close-2"></i>
                </button>
                <h5 class="modal-title">Agregar Departamento a un Usuario</h5>
            </div>
            <form method="post" id="departamento_form"> 

                <input type="hidden" id="id_usuario2" name="id_usuario2">

                <!-- CONTENIDO -->
                <div class="container">
                    <div><h5 class="m-t-lg with-border">Información General</h5></div>
                   
                    <div class="col-lg-12">
                        <fieldset class="form-group">
                            <label class="form-label semibold" for="usu_correo2">Se agregará un departamento al usuario:</label>
                            <input type="text" class="form-control" id="usu_correo2" name="usu_correo2" disabled>
                        </fieldset>
                    </div>

                    <div class="col-lg-12">
                        <fieldset class="form-group"> 
                            <label class="form-label semibold" for="id_departamento">Departamento</label>
                            <select id="id_departamento" name="id_departamento" class="form-control" >
            
                            </select>
                        </fieldset>
                    </div>


                </div>

                

                <div class="modal-footer">
                    <button type="button" class="btn btn-rounded btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="submit" name="action" id="##" value="add" class="btn btn-rounded btn-primary">Guardar</button>
                </div>
			</form>
        </div>
    </div>
</div>