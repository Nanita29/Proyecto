<div id="modal_archivo" class="modal fade bd-example-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">
                    <i class="font-icon-close-2"></i>
                </button>
                <h5 class="modal-title">NUEVO ARCHIVO</h5>
            </div>
            <form method="post" id="archivo_form"> 

                <input  type="hidden" id="id_usuario2" name="id_usuario" value="<?php echo $_SESSION["id_usuario"] ?>">
                <input type="hidden" id="id_unidad_a2" name="id_unidad_a">
                <input  type="hidden" id="id_estado2" name="id_estado">

                <!-- CONTENIDO -->
                <div class="container">
                    <div><h5 class="m-t-lg with-border">Información General</h5></div>
                   
                    <div class="col-lg-12">
                        <fieldset class="form-group">
                            <label class="form-label semibold" for="a_cod2">Se subirá un archivo para la Unidad Educativa:</label>
                            <input type="text" class="form-control" id="a_cod2" name="a_cod2" disabled>
                        </fieldset>
                    </div>

                    <div class="col-lg-12">
                        <fieldset class="form-group">
                            <label class="form-label semibold" for="nombre_ar">Nombre del Archivo</label>
                            <input type="text" class="form-control" id="nombre_ar" name="nombre_ar" placeholder="Ingrese el nombre">
                        </fieldset>
                    </div>

                    <div class="col-lg-6" style="display: none">
                        <fieldset class="form-group">
                            <label class="form-label semibold" for="id_item">ID_ITEM</label>
                            <input type="text" class="form-control" id="id_item" name="id_item" placeholder="Ingrese el código" value=<?php echo $row['id_item'] ?>>
                        </fieldset>
                    </div>
                    
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-label" for="tipo_ar">Tipo de Archivo</label>
                            <select class="select2" id="tipo_ar" name="tipo_ar">
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                                <option value="D">D</option>
                                <option value="E">E</option>
                            </select>
                        </div>
                    </div>

                    

                    <div class="col-lg-12">
                        <fieldset class="form-group">
                            <label class="form-label semibold" for="descripcion_ar">Descripción del archivo</label>
                            <textarea class="form-control" id="descripcion_ar" name="descripcion_ar" rows="4" placeholder="Ingrese la descripción del archivo"></textarea>
                        </fieldset>
                    </div>
                    
                    <div class="col-lg-12">
                        <fieldset class="form-group">
                            <label class="form-label semibold" for="archivo">Archivo</label>
                            <input type="file" class="form-control" id="archivo" name="archivo" placeholder="Ingrese el nombre">
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