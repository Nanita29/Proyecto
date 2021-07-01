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

                    <li class="blue-dirty">
                        <a href="..\Consultar_Fuente\">
                            <span class="glyphicon glyphicon-th"></span>
                            <span class="lbl">Fuentes</span>
                        </a>
                    </li>

                    <li class="blue-dirty">
                        <a href="..\Consultar_Unidad_A\">
                            <span class="glyphicon glyphicon-th"></span>
                            <span class="lbl">Unidades Educativas "A"</span>
                        </a>
                    </li>

                    <li class="blue-dirty">
                        <a href="..\Nuevo_Unidad_A\">
                            <span class="glyphicon glyphicon-th"></span>
                            <span class="lbl">Unidades Educativas "B"</span>
                        </a>
                    </li>

                    <li class="blue-dirty">
                        <a href="..\Consultar_Unidad_Proyecto\">
                            <span class="glyphicon glyphicon-th"></span>
                            <span class="lbl">Direcciones Distritales</span>
                        </a>
                    </li>

                    <li class="blue-dirty">
                        <a href="..\Nuevo_Unidad_A\">
                            <span class="glyphicon glyphicon-th"></span>
                            <span class="lbl">Miembros del personal técnico</span>
                        </a>
                    </li>
                </ul>
            </nav>
        <?php
    }else{
        ?>
            <nav class="side-menu">
                <ul class="side-menu-list">
                    <li class="blue-dirty">
                        <a href="..\Home\">
                            <span class="glyphicon glyphicon-th"></span>
                            <span class="lbl">Inicio</span>
                        </a>
                    </li>
                    <li class="blue-dirty">
                        <a href="..\MntUsuario\">
                            <span class="glyphicon glyphicon-th"></span>
                            <span class="lbl">Mantenimiento Usuario</span>
                        </a>
                    </li>
                    <li class="blue-dirty">
                        <a href="..\ConsultarTicket\">
                            <span class="glyphicon glyphicon-th"></span>
                            <span class="lbl">Consultar Ticket</span>
                        </a>
                    </li>
                </ul>
            </nav>
        <?php
    }
?>
