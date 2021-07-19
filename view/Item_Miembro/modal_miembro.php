<div id="modal_miembro" class="modal fade bd-example-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">
                    <i class="font-icon-close-2"></i>
                </button>
                <h4 class="modal-title" id="mdltitulo"></h4>
            </div>
            <form method="post" id="miembro_form"> 

                <input type="hidden" id="id_usuario" name="id_usuario" value="<?php echo $_SESSION["id_usuario"] ?>">
                <input type="hidden" id="id_miembro" name="id_miembro">

                <!-- INF GENERAL -->
                <div class="container">
                    <div><h5 class="m-t-lg with-border">Información General</h5></div>
                        
                    <div class="col-lg-6">
                        <fieldset class="form-group">
                            <label class="form-label semibold" for="m_cod">Código</label>
                            <input type="text" class="form-control" id="m_cod" name="m_cod" placeholder="Ingrese el código">
                        </fieldset>
                    </div>


                    <div class="col-lg-6">
                        <fieldset class="form-group">
                            <label class="form-label semibold" for="m_nombre">Nombre del Miembro del Personal Técnico</label>
                            <input type="text" class="form-control" id="m_nombre" name="m_nombre" placeholder="Ingrese el nombre del Miembro del Personal Técnico">
                        </fieldset>
                    </div>

                    <div class="col-lg-6">
                        <fieldset class="form-group"> 
                            <label class="form-label semibold" for="id_departamento">Departamento</label>
                            <select id="id_departamento" name="id_departamento" class="form-control" >
            
                            </select>
                        </fieldset>
                    </div>


                    <div class="col-lg-6">
                        <fieldset class="form-group">
                            <label class="form-label semibold" for="m_contactos">Contactos</label>
                            <input type="text" class="form-control" id="m_contactos" name="m_contactos" placeholder="Contactos" >
                        </fieldset>
                    </div>

                    <div class="col-lg-12">
                        <fieldset class="form-group">
                            <label class="form-label semibold" for="m_observacion">Observaciones</label>
                            <input type="text" class="form-control" id="m_observacion" name="m_observacion" placeholder="Observaciones" >
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
                                    <th class="text-center">Aprobado/Reprobado</th>
                                </tr>

                                <tr>
                                    <td>1. Conocen normativa y politicas educativas vigentes en torno a PCPA, protocolos.</th>
                                    <td>
                                        <input type="radio" id="e1t" name="e1" value="2" /> Aprobado <br>
                                        <input type="radio" id="e1f" name="e1" value="1" /> Reprobado
                                    </td>
                                </tr>

                                <tr>
                                    <td>2. Conocen datos estado de situación línea de base.</th>
                                    <td>
                                        <input type="radio" id="e2t" name="e2" value="2" /> Aprobado<br>
                                        <input type="radio" id="e2f" name="e2" value="1" /> Reprobado
                                    </td>
                                </tr>

                                <tr>
                                    <td>3. Conocen la estratagia de prevención de la violencia en contextos educativos.</th>
                                    <td>
                                        <input type="radio" id="e3t" name="e3" value="2" /> Aprobado<br>
                                        <input type="radio" id="e3f" name="e3" value="1" /> Reprobado
                                    </td>
                                </tr>

                                <tr>
                                    <td>4. Conocen la propuesta de de armonización de la prevención de la violencia en la currícula educativa (inicial, primaria y secundaria).</th>
                                    <td>
                                        <input type="radio" id="e4t" name="e4" value="2" /> Aprobado<br>
                                        <input type="radio" id="e4f" name="e4" value="1" /> Reprobado
                                    </td>
                                </tr>

                                <tr>
                                    <td>5. Cuentan con habilidades para capacitar a maestros y maestras, otros actores y hacer seguimiento en las escuelas.</th>
                                    <td>
                                        <input type="radio" id="e5t" name="e5" value="2" /> Aprobado<br>
                                        <input type="radio" id="e5f" name="e5" value="1" /> Reprobado
                                    </td>
                                </tr>

                                <tr>
                                    <td>6. Aplican conocimientos para la gestión externa e interna de la estrategia en el programa y/o servicio.</th>
                                    <td>
                                        <input type="radio" id="e6t" name="e6" value="2" /> Aprobado<br>
                                        <input type="radio" id="e6f" name="e6" value="1" /> Reprobado
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