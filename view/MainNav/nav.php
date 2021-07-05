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
                            <span class="lbl">Unidades Educativas (R2.IVO6)</span>
                        </a>
                    </li>

                    <li class="blue-dirty">
                        <a href="..\Consultar_Unidad_B\">
                            <span class="glyphicon glyphicon-th"></span>
                            <span class="lbl">Unidades Educativas (R2.IVO7, R4.IVO3)</span>
                        </a>
                    </li>

                    <li class="blue-dirty">
                        <a href="..\Consultar_Dde\">
                            <span class="glyphicon glyphicon-th"></span>
                            <span class="lbl">Direcciones Distritales (R1.IVO5)</span>
                        </a>
                    </li>

                    <li class="blue-dirty">
                        <a href="..\Consultar_Miembro\">
                            <span class="glyphicon glyphicon-th"></span>
                            <span class="lbl">Miembros del personal técnico (R1.IVO2)</span>
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
