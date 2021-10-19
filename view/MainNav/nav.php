<?php
    if ($_SESSION["rol_id"]==1){
        ?>
            <nav class="side-menu">
                <ul class="side-menu-list">
                    <li class="blue-dirty">
                        <a href="..\Home\">
                            <span class="glyphicon glyphicon-th"></span>
                            <span class="lbl">Inicio</span>
                        </a>
                    </li>

                    


                    <!-- <li class="blue-dirty">
                        <a href="..\Consultar_Fuente\">
                            <span class="glyphicon glyphicon-th"></span>
                            <span class="lbl">Fuentes</span>
                        </a>
                    </li> -->

                    <li class="blue-dirty">
                        <a href="..\Item_Unidad_A\">
                            <span class="glyphicon glyphicon-th"></span>
                            <span class="lbl">Unidades Educativas A (R2.IVO6,R2.IVO7)</span>
                        </a>
                    </li>

                    <li class="blue-dirty">
                        <a href="..\Item_Unidad_B\">
                            <span class="glyphicon glyphicon-th"></span>
                            <span class="lbl">Unidades Educativas B (R4.IVO3)</span>
                        </a>
                    </li>

                    <li class="blue-dirty">
                        <a href="..\Item_Dde\">
                            <span class="glyphicon glyphicon-th"></span>
                            <span class="lbl">Direcciones Distritales (R1.IVO5)</span>
                        </a>
                    </li>
                    
                    <li class="blue-dirty">
                        <a href="..\Item_Miembro\">
                            <span class="glyphicon glyphicon-th"></span>
                            <span class="lbl">Miembros del Personal Técnico (R1.IVO2)</span>
                        </a>
                    </li>

                    <li class="blue-dirty">
                        
                        <script>
                            function getURL() {
                                var lengthOfName = window.location.href
                                document.getElementById('message').innerHTML = lengthOfName;
                            }
                        </script>

                        <a data-toggle="collapse" data-target="#collapseExample" href='../Home/' role="button" aria-expanded="false" aria-controls="collapseExample" onclick="getURL();">
                                <span class="glyphicon glyphicon-th"></span>
                                <span class="lbl">Análisis CAP</span>
                        </a>
                        <div class="collapse" id="collapseExample"  >
                            <a class="dropdown-item" href="../Cap_Adolescentes/" >Adolescentes</a>
                            <a class="dropdown-item" href="../Cap_Infantes/">Infantes</a>
                            <a class="dropdown-item" href="..\Cap_Maestros\">Maestros</a>
                            <a class="dropdown-item" href="../Cap_Ninos/">Niños</a>
                            <a class="dropdown-item" href="..\Cap_PPFF\">PPFF</a>
                        </div>  
                         <!-- <p>
                            <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                Link with href
                            </a>
                            <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                Button with data-target
                            </button>
                        </p>
                        <div class="collapse" id="collapseExample">
                        <div class="card card-body">
                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
                        </div>
                        </div>  -->
                        <!-- <button class="dropdown-btn">Dropdown
                            <i class="fa fa-caret-down"></i>
                        </button>
                        <div class="dropdown-container">
                            <a href="..\Cap_Adolescentes\">Link 1</a>
                            <a href="..\Cap_Infantes\">Link 2</a>
                            <a href="#">Link 3</a>
                        </div>  -->

                        
                    </li>

                    <li class="blue-dirty">
                        <a href="..\Item_Archivo">
                            <span class="glyphicon glyphicon-th"></span>
                            <span class="lbl">Archivos</span>
                        </a>
                    </li>

                    <li class="blue-dirty">
                        <a href="..\Item_Usuario">
                            <span class="glyphicon glyphicon-th"></span>
                            <span class="lbl">Administrar Usuarios</span>
                        </a>
                    </li>
                </ul>
            </nav>
        <?php
    }

    if ($_SESSION["rol_id"]==2){
        ?>
            <nav class="side-menu">
                <ul class="side-menu-list">
                    <li class="blue-dirty">
                        <a href="..\Home\">
                            <span class="glyphicon glyphicon-th"></span>
                            <span class="lbl">Inicio</span>
                        </a>
                    </li>

                    <!-- <li class="blue-dirty">
                        <a href="..\Consultar_Fuente\">
                            <span class="glyphicon glyphicon-th"></span>
                            <span class="lbl">Fuentes</span>
                        </a>
                    </li> -->

                    <li class="blue-dirty">
                        <a href="..\Item_Unidad_A\">
                            <span class="glyphicon glyphicon-th"></span>
                            <span class="lbl">Unidades Educativas A (R2.IVO6,R2.IVO7)</span>
                        </a>
                    </li>

                    <li class="blue-dirty">
                        <a href="..\Item_Unidad_B\">
                            <span class="glyphicon glyphicon-th"></span>
                            <span class="lbl">Unidades Educativas B (R4.IVO3)</span>
                        </a>
                    </li>

                    <li class="blue-dirty">
                        <a href="..\Item_Dde\">
                            <span class="glyphicon glyphicon-th"></span>
                            <span class="lbl">Direcciones Distritales (R1.IVO5)</span>
                        </a>
                    </li>
                    
                    <li class="blue-dirty">
                        <a href="..\Item_Miembro\">
                            <span class="glyphicon glyphicon-th"></span>
                            <span class="lbl">Miembros del Personal Técnico (R1.IVO2)</span>
                        </a>
                    </li>
                </ul>
            </nav>
        <?php
    }

    if ($_SESSION["rol_id"]==3){
        ?>
            <nav class="side-menu">
                <ul class="side-menu-list">
                    <li class="blue-dirty">
                        <a href="..\Home\">
                            <span class="glyphicon glyphicon-th"></span>
                            <span class="lbl">Inicio</span>
                        </a>
                    </li>

                    
                    <!-- <li class="blue-dirty">
                        <a href="..\Consultar_Fuente\">
                            <span class="glyphicon glyphicon-th"></span>
                            <span class="lbl">Fuentes</span>
                        </a>
                    </li> -->

                    <li class="blue-dirty">
                        <a href="..\Item_Unidad_A\">
                            <span class="glyphicon glyphicon-th"></span>
                            <span class="lbl">Unidades Educativas A (R2.IVO6,R2.IVO7)</span>
                        </a>
                    </li>

                    <li class="blue-dirty">
                        <a href="..\Item_Unidad_B\">
                            <span class="glyphicon glyphicon-th"></span>
                            <span class="lbl">Unidades Educativas B (R4.IVO3)</span>
                        </a>
                    </li>

                    <li class="blue-dirty">
                        <a href="..\Item_Dde\">
                            <span class="glyphicon glyphicon-th"></span>
                            <span class="lbl">Direcciones Distritales (R1.IVO5)</span>
                        </a>
                    </li>
                    
                    <li class="blue-dirty">
                        <a href="..\Item_Miembro\">
                            <span class="glyphicon glyphicon-th"></span>
                            <span class="lbl">Miembros del Personal Técnico (R1.IVO2)</span>
                        </a>
                    </li>

                    <li class="blue-dirty">
                        <a href="..\Item_Archivo">
                            <span class="glyphicon glyphicon-th"></span>
                            <span class="lbl">Archivos</span>
                        </a>
                    </li>

                </ul>
            </nav>
        <?php
    }
?>
