<div id="modal_dde" class="modal fade bd-example-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">
                    <i class="font-icon-close-2"></i>
                </button>
                <h4 class="modal-title" id="mdltitulo"></h4>
            </div>
            <form method="post" id="dde_form"> 

                <input type="hidden" id="id_usuario" name="id_usuario" value="<?php echo $_SESSION["id_usuario"] ?>">
                <input type="hidden" id="id_dde" name="id_dde">

                <!-- INF GENERAL -->
                <div class="container">
                    <div><h5 class="m-t-lg with-border">Información General</h5></div>
                        
                        <div class="col-lg-6">
                            <fieldset class="form-group">
                                <label class="form-label semibold" for="d_cod">Código</label>
                                <input type="text" class="form-control" id="d_cod" name="d_cod" placeholder="Ingrese el código">
                            </fieldset>
                        </div>


                        <div class="col-lg-6">
                            <fieldset class="form-group">
                                <label class="form-label semibold" for="d_nombre">Nombre de la Dirección Distrital</label>
                                <input type="text" class="form-control" id="d_nombre" name="d_nombre" placeholder="Ingrese el nombre de la Dirección Distrital">
                            </fieldset>
                        </div>

                        <div class="col-lg-6">
                            <fieldset class="form-group"> 
                                <label class="form-label semibold" for="id_municipio">Zona Territorial</label>
                                <select id="id_municipio" name="id_municipio" class="form-control" >
                
                                </select>
                            </fieldset>
                        </div>


                        <div class="col-lg-6">
                            <fieldset class="form-group">
                                <label class="form-label semibold" for="d_director_nombre">Director</label>
                                <input type="text" class="form-control" id="d_director_nombre" name="d_director_nombre" placeholder="Director" >
                            </fieldset>
                        </div>

                        <div class="col-lg-6">
                            <fieldset class="form-group">
                                <label class="form-label semibold" for="d_director_tel">Teléfono Director</label>
                                <input type="text" class="form-control" id="d_director_tel" name="d_director_tel" placeholder="Ingrese el teléfono del director" >
                            </fieldset>
                        </div>

                        <div class="col-lg-12">
                            <fieldset class="form-group">
                                <label class="form-label semibold" for="d_datos">Datos</label>
                                <input type="text" class="form-control" id="d_datos" name="d_datos" placeholder="Ingrese los datos" >
                            </fieldset>
                        </div>

                </div>

                <!-- ESTADOS MONITOREO -->
                <div class="container">
                    <div><h5 class="m-t-lg with-border">Estados de Monitoreo</h5></div>

                        <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                            <thead>
                                <tr>
                                    <th class="text-center">Estado</th>
                                    <th class="text-center">¿Cumplió?</th>
                                </tr>

                                <tr>
                                    <td>1. Conocen normativa y políticas educativas vigentes en torno a PCPA, protocolos.</th>
                                    <td>
                                        <input type="radio" id="e1t" name="e1" value="2" /> Si <br>
                                        <input type="radio" id="e1f" name="e1" value="1" /> No
                                    </td>
                                </tr>

                                <tr>
                                    <td>2. Conocen datos estado de situación línea de base.</th>
                                    <td>
                                        <input type="radio" id="e2t" name="e2" value="2" /> Si<br>
                                        <input type="radio" id="e2f" name="e2" value="1" /> No
                                    </td>
                                </tr>

                                <tr>
                                    <td>3. Conocen la estratagia de prevención de la violencia en contextos educativos.</th>
                                    <td>
                                        <input type="radio" id="e3t" name="e3" value="2" /> Si<br>
                                        <input type="radio" id="e3f" name="e3" value="1" /> No
                                    </td>
                                </tr>

                                <tr>
                                    <td>4. Conocen la propuesta de buenas prácticas de las modalidades de prevención de la violencia en el aula (inicial, primaria y secundaria). </th>
                                    <td>
                                        <input type="radio" id="e4t" name="e4" value="2" /> Si<br>
                                        <input type="radio" id="e4f" name="e4" value="1" /> No
                                    </td>
                                </tr>
                            </thead>
                        </table>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-rounded btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="submit" name="action" id="#" value="add" class="btn btn-rounded btn-primary">Guardar</button>
                </div>
			</form>
        </div>
    </div>
</div>