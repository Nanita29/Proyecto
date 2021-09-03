<div id="modal_unidad" class="modal fade bd-example-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">
                    <i class="font-icon-close-2"></i>
                </button>
                <h4 class="modal-title" id="mdltitulo"></h4>
            </div>
            <form method="post" id="unidad_form"> 

                <input type="hidden" id="id_usuario" name="id_usuario" value="<?php echo $_SESSION["id_usuario"] ?>">
                <input type="hidden" id="id_unidad_a" name="id_unidad_a">

                <!-- INF GENERAL -->
                <!-- <div class="container">
                        <div><h5 class="m-t-lg with-border">Información General</h5></div>
                    <div class="col-lg-6">
                        <fieldset class="form-group">
                            <label class="form-label semibold" for="a_cod">Código</label>
                            <input type="text" class="form-control" id="a_cod" name="a_cod" placeholder="Ingrese el código">
                        </fieldset>
                    </div>
                    
                    <div class="col-lg-6">
                        <fieldset class="form-group">
                            <label class="form-label semibold" for="a_nombre">Nombre de la Unidad Educativa</label>
                            <input type="text" class="form-control" id="a_nombre" name="a_nombre" placeholder="Ingrese el nombre de la nueva Unidad Educativa">
                        </fieldset>
                    </div>

                    <div class="col-lg-6">
                        <fieldset class="form-group"> 
                            <label class="form-label semibold" for="id_comunidad">Comunidad</label>
                            <select id="id_comunidad" name="id_comunidad" class="form-control">
                                
                            </select>
                        </fieldset>
                    </div>

                    <div class="col-lg-6">
                        <fieldset class="form-group"> 
                            <label class="form-label semibold" for="id_fuente">Fuente de financiamiento</label>
                            <select id="id_fuente" name="id_fuente" class="form-control">
                                
                            </select>
                        </fieldset>
                    </div>


                    <div class="col-lg-6">
                        <fieldset class="form-group">
                            <label class="form-label semibold" for="a_director_nombre">Director</label>
                            <input type="text" class="form-control" id="a_director_nombre" name="a_director_nombre" placeholder="Ingrese el nombre del director">
                        </fieldset>
                    </div>

                    <div class="col-lg-6">
                        <fieldset class="form-group">
                            <label class="form-label semibold" for="a_director_tel">Teléfono Director</label>
                            <input type="text" class="form-control" id="a_director_tel" name="a_director_tel" placeholder="Ingrese el teléfono del director">
                        </fieldset>
                    </div>

                    <div class="col-lg-6">
                        <fieldset class="form-group">
                            <label class="form-label semibold" for="a_pcpa">PCPA</label>
                            <input type="text" class="form-control" id="a_pcpa" name="a_pcpa" placeholder="Ingrese el PCPA">
                        </fieldset>
                    </div>

                    <div class="col-lg-6">
                        <fieldset class="form-group">
                            <label class="form-label semibold" for="a_tecnico">Técnico</label>
                            <input type="text" class="form-control" id="a_tecnico" name="a_tecnico" placeholder="Ingrese el técnico"><br>
                        </fieldset>
                    </div>
                    

                </div> -->
                <div class="container">
                    <div><h5 class="m-t-lg with-border">INFORMACIÓN GENERAL</h5></div>
                        <div class="col-lg-6">
                            <fieldset class="form-group">
                                <label class="form-label semibold" for="a_cod">Código</label>
                                <input type="text" class="form-control" id="a_cod" name="a_cod" placeholder="Ingrese el código">
                            </fieldset>
                        </div>
                        
                        <div class="col-lg-6">
                            <fieldset class="form-group">
                                <label class="form-label semibold" for="a_nombre">Nombre de la Unidad Educativa</label>
                                <input type="text" class="form-control" id="a_nombre" name="a_nombre" placeholder="Ingrese el nombre de la nueva Unidad Educativa">
                            </fieldset>
                        </div>

                        <div class="col-lg-6">
                            <fieldset class="form-group"> 
                                <label class="form-label semibold" for="id_comunidad">Zona Territorial</label>
                                <select id="id_comunidad" name="id_comunidad" class="form-control">
                                    
                                </select>
                            </fieldset>
                        </div>

                        <div class="col-lg-6">
                            <fieldset class="form-group"> 
                                <label class="form-label semibold" for="id_fuente">Fuente de financiamiento</label>
                                <select id="id_fuente" name="id_fuente" class="form-control">
                                    
                                </select>
                            </fieldset>
                        </div>


                        <div class="col-lg-6">
                            <fieldset class="form-group">
                                <label class="form-label semibold" for="a_director_nombre">Director</label>
                                <input type="text" class="form-control" id="a_director_nombre" name="a_director_nombre" placeholder="Ingrese el nombre del director">
                            </fieldset>
                        </div>

                        <div class="col-lg-6">
                            <fieldset class="form-group">
                                <label class="form-label semibold" for="a_director_tel">Teléfono Director</label>
                                <input type="text" class="form-control" id="a_director_tel" name="a_director_tel" placeholder="Ingrese el teléfono del director">
                            </fieldset>
                        </div>

                        <div class="col-lg-6">
                            <fieldset class="form-group">
                                <label class="form-label semibold" for="a_dna">DNA</label>
                                <input type="text" class="form-control" id="a_dna" name="a_dna" placeholder="Ingrese el DNA">
                            </fieldset>
                        </div>

                        <div class="col-lg-6">
                            <fieldset class="form-group">
                                <label class="form-label semibold" for="a_tecnico">Técnico</label>
                                <input type="text" class="form-control" id="a_tecnico" name="a_tecnico" placeholder="Ingrese el técnico"><br>
                            </fieldset>
                        </div>

                        <div class="col-lg-6">
                            <fieldset class="form-group">
                                <label class="form-label semibold" for="a_centro_salud">Centro de Salud</label>
                                <input type="text" class="form-control" id="a_centro_salud" name="a_centro_salud" placeholder="Ingrese el centro de salud"><br>
                            </fieldset>
                        </div>
                        

                </div>
                
                <!-- DOCENTES -->
                <div class="container">
                    <div class="centered"><h5 class="m-t-lg with-border">Plantel Docente</h5></div>
                        <div class="col-lg-2">
                            <fieldset class="form-group">
                                <label class="form-label semibold" for="a_docen_ini_v">Docentes Inicial Varones</label>
                                <input type="number" class="form-control" id="a_docen_ini_v" name="a_docen_ini_v" placeholder=0>
                            </fieldset>
                        </div>

                        <div class="col-lg-2">
                            <fieldset class="form-group">
                                <label class="form-label semibold" for="a_docen_ini_m">Docentes Inicial Mujeres</label>
                                <input type="number" class="form-control" id="a_docen_ini_m" name="a_docen_ini_m" placeholder="0">
                            </fieldset>
                        </div>

                        <div class="col-lg-2">
                            <fieldset class="form-group">
                                <label class="form-label semibold" for="a_docen_pri_v">Docentes Primaria Varones</label>
                                <input type="number" class="form-control" id="a_docen_pri_v" name="a_docen_pri_v" placeholder="0">
                            </fieldset>
                        </div>

                        <div class="col-lg-2">
                            <fieldset class="form-group">
                                <label class="form-label semibold" for="a_docen_pri_m">Docentes Primaria Mujeres</label>
                                <input type="number" class="form-control" id="a_docen_pri_m" name="a_docen_pri_m" placeholder="0">
                            </fieldset>
                        </div>

                        <div class="col-lg-2">
                            <fieldset class="form-group">
                                <label class="form-label semibold" for="a_docen_sec_v">Docentes Secundaria Varones</label>
                                <input type="number" class="form-control" id="a_docen_sec_v" name="a_docen_sec_v" placeholder="0">
                            </fieldset>
                        </div>

                        <div class="col-lg-2">
                            <fieldset class="form-group">
                                <label class="form-label semibold" for="a_docen_sec_m">Docentes Secundaria Mujeres</label>
                                <input type="number" class="form-control" id="a_docen_sec_m" name="a_docen_sec_m" placeholder="0"><br>
                            </fieldset>
                        </div>
                </div>
                
                <!-- ESTUDIANTES -->
                <div class="container">
                    <div class="centered"><h5 class="m-t-lg with-border">Estudiantes</h5></div>
                        <div class="col-lg-2">
                            <fieldset class="form-group">
                                <label class="form-label semibold" for="a_est_ini_v">Estudiantes Inicial Varones</label>
                                <input type="number" class="form-control" id="a_est_ini_v" name="a_est_ini_v" placeholder="0">
                            </fieldset>
                        </div>

                        <div class="col-lg-2">
                            <fieldset class="form-group">
                                <label class="form-label semibold" for="a_est_ini_m">Estudiantes Inicial Mujeres</label>
                                <input type="number" class="form-control" id="a_est_ini_m" name="a_est_ini_m" placeholder="0">
                            </fieldset>
                        </div>

                        <div class="col-lg-2">
                            <fieldset class="form-group">
                                <label class="form-label semibold" for="a_est_pri_v">Estudiantes Primaria Varones</label>
                                <input type="number" class="form-control" id="a_est_pri_v" name="a_est_pri_v" placeholder="0">
                            </fieldset>
                        </div>

                        <div class="col-lg-2">
                            <fieldset class="form-group">
                                <label class="form-label semibold" for="a_est_pri_m">Estudiantes Primaria Mujeres</label>
                                <input type="number" class="form-control" id="a_est_pri_m" name="a_est_pri_m" placeholder="0">
                            </fieldset>
                        </div>

                        <div class="col-lg-2">
                            <fieldset class="form-group">
                                <label class="form-label semibold" for="a_est_sec_v">Estudiantes Secundaria Varones</label>
                                <input type="number" class="form-control" id="a_est_sec_v" name="a_est_sec_v" placeholder="0">
                            </fieldset>
                        </div>

                        <div class="col-lg-2">
                            <fieldset class="form-group">
                                <label class="form-label semibold" for="a_est_sec_m">Estudiantes Secundaria Mujeres</label>
                                <input type="number" class="form-control" id="a_est_sec_m" name="a_est_sec_m" placeholder="0"><br>
                            </fieldset>
                        </div>

                </div>

                <!-- SALUD -->
                <div class="container">
                    <div><h5 class="m-t-lg with-border">Personal Médico</h5></div>
                        <div class="col-lg-2">
                            <fieldset class="form-group">
                                <label class="form-label semibold" for="a_per_med_v">Personal Salud Médico Varones</label>
                                <input type="number" class="form-control" id="a_per_med_v" name="a_per_med_v" placeholder="0">
                            </fieldset>
                        </div>

                        <div class="col-lg-2">
                            <fieldset class="form-group">
                                <label class="form-label semibold" for="a_per_med_m">Personal Salud Médico Mujeres</label>
                                <input type="number" class="form-control" id="a_per_med_m" name="a_per_med_m" placeholder="0">
                            </fieldset>
                        </div>

                        <div class="col-lg-2">
                            <fieldset class="form-group">
                                <label class="form-label semibold" for="a_per_enf_v">Personal Salud Enfermería Varones</label>
                                <input type="number" class="form-control" id="a_per_enf_v" name="a_per_enf_v" placeholder="0">
                            </fieldset>
                        </div>

                        <div class="col-lg-2">
                            <fieldset class="form-group">
                                <label class="form-label semibold" for="a_per_enf_m">Personal Salud Enfermería Mujeres</label>
                                <input type="number" class="form-control" id="a_per_enf_m" name="a_per_enf_m" placeholder="0"><br>
                            </fieldset>
                        </div>
                </div>

                <!-- ESTADOS MONITOREO X-->
                <div class="container">
                    <div><h5 class="m-t-lg with-border">Estados de Monitoreo "X"</h5></div>

                        <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                            <thead>
                                <tr>
                                    <th class="text-center">Estado</th>
                                    <th class="text-center">¿Cumplió?</th>
                                </tr>

                                <tr>
                                    <td>1. Conocen la normativa RM 2021/04 Planes de Convivencia Pacífica y Armónica.</th>
                                    <td>
                                        <input type="radio" id="e1t" name="e1" value="2" /> Si <br>
                                        <input type="radio" id="e1f" name="e1" value="1" /> No
                                    </td>
                                </tr>

                                <tr>
                                    <td>2. Desarrollaron talleres para el diseño de PCPA, con representantes por unidad educativa.</th>
                                    <td>
                                        <input type="radio" id="e2t" name="e2" value="2" /> Si<br>
                                        <input type="radio" id="e2f" name="e2" value="1" /> No
                                    </td>
                                </tr>

                                <tr>
                                    <td>3. Firma y entrega de PCPA.</th>
                                    <td>
                                        <input type="radio" id="e3t" name="e3" value="2" /> Si<br>
                                        <input type="radio" id="e3f" name="e3" value="1" /> No
                                    </td>
                                </tr>

                                <tr>
                                    <td>4. Informe de implementacion por UE del PCPA.</th>
                                    <td>
                                        <input type="radio" id="e4t" name="e4" value="2" /> Si<br>
                                        <input type="radio" id="e4f" name="e4" value="1" /> No
                                    </td>
                                </tr>
                            </thead>
                        </table>

                </div>

                <!-- ESTADOS MONITOREO Y-->
                <div class="container">
                    <div><h5 class="m-t-lg with-border">Estados de Monitoreo "Y"</h5></div>

                        <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                            <thead>
                                <tr>
                                    <th class="text-center">Estado</th>
                                    <th class="text-center">¿Cumplió?</th>
                                </tr>

                                <tr>
                                    <td>1. Socialización del protocolo (UE priorizadas) y DNA.</th>
                                    <td>
                                        <input type="radio" id="e1_2t" name="e1_2" value="2" /> Si <br>
                                        <input type="radio" id="e1_2f" name="e1_2" value="1" /> No
                                    </td>
                                </tr>

                                <tr>
                                    <td>2. Elaboración - aprobación del mecanismo de referencia y contra referencia de casos (DDE, UE priorizadas y DNA).</th>
                                    <td>
                                        <input type="radio" id="e2_2t" name="e2_2" value="2" /> Si<br>
                                        <input type="radio" id="e2_2f" name="e2_2" value="1" /> No
                                    </td>
                                </tr>

                                <tr>
                                    <td>3. Gestión para recojo de información referida al reporte de casos y funcionamiento del mecanismo (directores UE, Comisiones de Convivencia en coordinación con DNA).</th>
                                    <td>
                                        <input type="radio" id="e3_2t" name="e3_2" value="2" /> Si<br>
                                        <input type="radio" id="e3_2f" name="e3_2" value="1" /> No
                                    </td>
                                </tr>

                                <tr>
                                    <td>4. Socialización de la experiencia.</th>
                                    <td>
                                        <input type="radio" id="e4_2t" name="e4_2" value="2" /> Si<br>
                                        <input type="radio" id="e4_2f" name="e4_2" value="1" /> No
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