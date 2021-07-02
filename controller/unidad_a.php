<?php
    require_once("../config/conexion.php");
    require_once("../models/Unidad_A.php");
    $unidad_a = new Unidad_A();

    switch($_GET["op"]){
        case "insert":
           $unidad_a->insert_unidad_a(
                $_POST["id_comunidad"],
                $_POST["id_estado"],
                $_POST["id_fuente"],
                $_POST["id_usuario"],
                $_POST["a_cod"],
                $_POST["a_nombre"],
                $_POST["a_director_nombre"],
                $_POST["a_director_tel"],
                $_POST["a_pcpa"],
                $_POST["a_tecnico"],
                $_POST["a_docen_ini_v"],
                $_POST["a_docen_ini_m"],
                $_POST["a_docen_pri_v"],
                $_POST["a_docen_pri_m"],
                $_POST["a_docen_sec_v"],
                $_POST["a_docen_sec_m"],
                $_POST["a_est_ini_v"],
                $_POST["a_est_ini_m"],
                $_POST["a_est_pri_v"],
                $_POST["a_est_pri_m"],
                $_POST["a_est_sec_v"],
                $_POST["a_est_sec_m"],
                $_POST["a_per_med_v"],
                $_POST["a_per_med_m"],
                $_POST["a_per_enf_v"],
                $_POST["a_per_enf_m"],
                $_POST["file1"],
                $_POST["file2"],
                $_POST["file3"],
                $_POST["file4"],
                $_POST["a_avance"]);


        break;

        case "listar":
            $datos=$unidad_a->listar_unidad_a();
            $data= Array();
            foreach($datos as $row){
                $sub_array = array();
                /* CAMPOS EN LA TABLA: */
                //$sub_array[] = $row["id_unidad_a"];
                $sub_array[] = $row["a_nombre"];
                $sub_array[] = $row["a_director_nombre"];
                $sub_array[] = $row["a_director_tel"];
                $sub_array[] = $row["a_pcpa"];
                $sub_array[] = $row["a_tecnico"];
                $sub_array[] = $row["a_avance"];
                //ESTADO 1:
                    if ($row["e1"]==TRUE || $row["e1"]>0){
                        $sub_array[] = '<a download="E1_'.$row["a_nombre"].'" href="'.$row["e1"].'">
                                            <button type="button" onClick=""  id="'.$row["e1"].'" class="btn btn-inline btn-primary btn-sm ladda-button">
                                                <i class="fa fa-download"></i>
                                            </button>
                                        </a>';
                    }else{
                        $sub_array[] = '';
                    }
                
                //ESTADO 2:
                if ($row["e2"]==TRUE || $row["e2"]>0){
                    $sub_array[] = '<a download="E2_'.$row["a_nombre"].'" href="'.$row["e2"].'">
                                        <button type="button" onClick=""  id="'.$row["e2"].'" class="btn btn-inline btn-primary btn-sm ladda-button">
                                            <i class="fa fa-download"></i>
                                        </button>
                                    </a>';
                }else{
                    $sub_array[] = '';
                }

                //ESTADO 3:
                if ($row["e3"]==TRUE || $row["e3"]>0){
                    $sub_array[] = '<a download="E3_'.$row["a_nombre"].'" href="'.$row["e3"].'">
                                        <button type="button" onClick=""  id="'.$row["e3"].'" class="btn btn-inline btn-primary btn-sm ladda-button">
                                            <i class="fa fa-download"></i>
                                        </button>
                                    </a>';
                }else{
                    $sub_array[] = '';
                }

                //ESTADO 4:
                if ($row["e4"]==TRUE || $row["e4"]>0){
                    $sub_array[] = '<a download="E4_'.$row["a_nombre"].'" href="'.$row["e4"].'">
                                        <button type="button" onClick=""  id="'.$row["e4"].'" class="btn btn-inline btn-primary btn-sm ladda-button">
                                            <i class="fa fa-download"></i>
                                        </button>
                                    </a>';
                }else{
                    $sub_array[] = '';
                }
                    
                
               /*  $sub_array[] = $row["e2"];
                $sub_array[] = $row["e3"];
                $sub_array[] = $row["e4"]; */
                $sub_array[] = $row["nombre_usu"]." ".$row["apellido_usu"];

                $sub_array[] = '<a href="..\Cambio_Unidad_A\?ID='.$row["id_unidad_a"].'\">
                <button type="button" onClick=""  id="'.$row["id_unidad_a"].'" class="btn btn-inline btn-primary btn-sm ladda-button"><i class="fa fa-eye"></i></button>
            </a>
';
                $data[] = $sub_array;
            }

            $results = array(
                "sEcho"=>1, 
                "iTotalRecords"=>count($data),
                "iTotalDisplayRecords"=>count($data),
                "aaData"=>$data);
            echo json_encode($results);
        break;
        
        case "listardetalle":
            $datos=$unidad_a->listar_unidad_a_id($_POST['id_unidad_a']);
            $data= Array();
            ?>
                <?php
                    foreach($datos as $row){
                        ?>
                            <div class="row">
                                <p> Desde esta ventana podrá editar una Unidad Educativa "A"</p>
                                <form method="post" id="unidad_form"> 

                                    <input type="hidden" id="id_usuario" name="id_usuario" value="<?php echo $_SESSION["id_usuario"] ?>">

                                    <!-- <div class="col-lg-6">
                                        <fieldset class="form-group">
                                            <label class="form-label semibold" for="a_file">Código</label>
                                            <input type="file" class="form-control" id="a_file" name="a_file" placeholder="Ingrese el código">
                                        </fieldset>
                                    </div> -->
            <!--
                                    <img style='display:block; width:100px;height:100px;' id='base64image'                 
                                    src= 'data:image/jpeg;base64,/9j/4AAQSkZJRgABAQEAYABgAAD/4QAiRXhpZgAATU0AKgAAAAgAAQESAAMAAAABAAEAAAAAAAD/2wBDAAIBAQIBAQICAgICAgICAwUDAwMDAwYEBAMFBwYHBwcGBwcICQsJCAgKCAcHCg0KCgsMDAwMBwkODw0MDgsMDAz/2wBDAQICAgMDAwYDAwYMCAcIDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAz/wAARCAFLAg0DASIAAhEBAxEB/8QAHwAAAQUBAQEBAQEAAAAAAAAAAAECAwQFBgcICQoL/8QAtRAAAgEDAwIEAwUFBAQAAAF9AQIDAAQRBRIhMUEGE1FhByJxFDKBkaEII0KxwRVS0fAkM2JyggkKFhcYGRolJicoKSo0NTY3ODk6Q0RFRkdISUpTVFVWV1hZWmNkZWZnaGlqc3R1dnd4eXqDhIWGh4iJipKTlJWWl5iZmqKjpKWmp6ipqrKztLW2t7i5usLDxMXGx8jJytLT1NXW19jZ2uHi4+Tl5ufo6erx8vP09fb3+Pn6/8QAHwEAAwEBAQEBAQEBAQAAAAAAAAECAwQFBgcICQoL/8QAtREAAgECBAQDBAcFBAQAAQJ3AAECAxEEBSExBhJBUQdhcRMiMoEIFEKRobHBCSMzUvAVYnLRChYkNOEl8RcYGRomJygpKjU2Nzg5OkNERUZHSElKU1RVVldYWVpjZGVmZ2hpanN0dXZ3eHl6goOEhYaHiImKkpOUlZaXmJmaoqOkpaanqKmqsrO0tba3uLm6wsPExcbHyMnK0tPU1dbX2Nna4uPk5ebn6Onq8vP09fb3+Pn6/9oADAMBAAIRAxEAPwD5rooor8DP9oAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiv04/4h2dK/wCi96f/AOEyn/ydR/xDs6V/0XvT/wDwmU/+Tq+g/wBV8z/59f8Ak0f8z8X/AOJhvD//AKGH/lKv/wDKz8x6K/Tj/iHZ0r/oven/APhMp/8AJ1H/ABDs6V/0XvT/APwmU/8Ak6j/AFXzP/n1/wCTR/zD/iYbw/8A+hh/5Sr/APys/Meiv04/4h2dK/6L3p//AITKf/J1H/EOzpX/AEXvT/8AwmU/+TqP9V8z/wCfX/k0f8w/4mG8P/8AoYf+Uq//AMrPzHor9OP+IdnSv+i96f8A+Eyn/wAnUf8AEOzpX/Re9P8A/CZT/wCTqP8AVfM/+fX/AJNH/MP+JhvD/wD6GH/lKv8A/Kz8x6K+8vEHw3tfgb8TdR1TTf7Sj8Qa5YagbyC90uHw9FZz+HtL/tDVNH1DSbACxvtK1WE2MimCfGyVCzzFZPP+Da8vFYN0NJPW7+VrfjZp+W297foPDfE1POIyqUY2hyxad7qXNzJtXSfKpRlFNpOXK5JKLi5FFFFcZ9OFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAf/9k='

                                    />
            -->

                                    <!-- <a  download="FILENAME.txt"             
                                    href= 'data:text/plain;base64,VEUgUVVJRVJPIERFTUFTSUFETyDimaU='
                                    >
                                    descargar
                                    </a> -->

                                    <!-- INF GENERAL -->
                                    <div class="container">
                                        <div><h5 class="m-t-lg with-border">INFORMACIÓN GENERAL</h5></div>
                                            
                                            <div class="col-lg-6">
                                                <fieldset class="form-group">
                                                    <label class="form-label semibold" for="a_nombre">Nombre de la Unidad Educativa</label>
                                                    <input type="text" class="form-control" id="a_nombre" name="a_nombre" placeholder="Nombre" value=<?php echo $row['a_nombre'] ?>>
                                                </fieldset>
                                            </div>


                                            <div class="col-lg-6">
                                                <fieldset class="form-group">
                                                    <label class="form-label semibold" for="a_director_nombre">Director</label>
                                                    <input type="text" class="form-control" id="a_director_nombre" name="a_director_nombre" placeholder="Director" value=<?php echo $row['a_director_nombre'] ?>>
                                                </fieldset>
                                            </div>

                                            <div class="col-lg-6">
                                                <fieldset class="form-group">
                                                    <label class="form-label semibold" for="a_director_tel">Teléfono Director</label>
                                                    <input type="text" class="form-control" id="a_director_tel" name="a_director_tel" placeholder="Ingrese el teléfono del director" value=<?php echo $row['a_director_tel'] ?>>
                                                </fieldset>
                                            </div>

                                            <div class="col-lg-6">
                                                <fieldset class="form-group">
                                                    <label class="form-label semibold" for="a_pcpa">PCPA</label>
                                                    <input type="text" class="form-control" id="a_pcpa" name="a_pcpa" placeholder="Ingrese el PCPA" value=<?php echo $row['a_pcpa'] ?>>
                                                </fieldset>
                                            </div>

                                            <div class="col-lg-6">
                                                <fieldset class="form-group">
                                                    <label class="form-label semibold" for="a_tecnico">Técnico</label>
                                                    <input type="text" class="form-control" id="a_tecnico" name="a_tecnico" placeholder="Ingrese el técnico" value=<?php echo $row['a_tecnico'] ?>><br>
                                                </fieldset>
                                            </div>
                                            

                                    </div>

                                    
                                    
                                    <!-- DOCENTES -->
                                    <div class="container">
                                        <div class="centered"><h5 class="m-t-lg with-border">PLANTEL DOCENTE</h5></div>
                                            <div class="col-lg-2">
                                                <fieldset class="form-group">
                                                    <label class="form-label semibold" for="a_docen_ini_v">Docentes Inicial Varones</label>
                                                    <input type="number" class="form-control" id="a_docen_ini_v" name="a_docen_ini_v" placeholder="Total">
                                                </fieldset>
                                            </div>

                                            <div class="col-lg-2">
                                                <fieldset class="form-group">
                                                    <label class="form-label semibold" for="a_docen_ini_m">Docentes Inicial Mujeres</label>
                                                    <input type="number" class="form-control" id="a_docen_ini_m" name="a_docen_ini_m" placeholder="Total">
                                                </fieldset>
                                            </div>

                                            <div class="col-lg-2">
                                                <fieldset class="form-group">
                                                    <label class="form-label semibold" for="a_docen_pri_v">Docentes Primaria Varones</label>
                                                    <input type="number" class="form-control" id="a_docen_pri_v" name="a_docen_pri_v" placeholder="Total">
                                                </fieldset>
                                            </div>

                                            <div class="col-lg-2">
                                                <fieldset class="form-group">
                                                    <label class="form-label semibold" for="a_docen_pri_m">Docentes Primaria Mujeres</label>
                                                    <input type="number" class="form-control" id="a_docen_pri_m" name="a_docen_pri_m" placeholder="Total">
                                                </fieldset>
                                            </div>

                                            <div class="col-lg-2">
                                                <fieldset class="form-group">
                                                    <label class="form-label semibold" for="a_docen_sec_v">Docentes Secundaria Varones</label>
                                                    <input type="number" class="form-control" id="a_docen_sec_v" name="a_docen_sec_v" placeholder="Total">
                                                </fieldset>
                                            </div>

                                            <div class="col-lg-2">
                                                <fieldset class="form-group">
                                                    <label class="form-label semibold" for="a_docen_sec_m">Docentes Secundaria Mujeres</label>
                                                    <input type="number" class="form-control" id="a_docen_sec_m" name="a_docen_sec_m" placeholder="Total"><br>
                                                </fieldset>
                                            </div>
                                    </div>

                                    
                                    <!-- ESTUDIANTES -->
                                    <div class="container">
                                        <div class="centered"><h5 class="m-t-lg with-border">ESTUDIANTES</h5></div>
                                            <div class="col-lg-2">
                                                <fieldset class="form-group">
                                                    <label class="form-label semibold" for="a_est_ini_v">Estudiantes Inicial Varones</label>
                                                    <input type="number" class="form-control" id="a_est_ini_v" name="a_est_ini_v" placeholder="Total">
                                                </fieldset>
                                            </div>

                                            <div class="col-lg-2">
                                                <fieldset class="form-group">
                                                    <label class="form-label semibold" for="a_est_ini_m">Estudiantes Inicial Mujeres</label>
                                                    <input type="number" class="form-control" id="a_est_ini_m" name="a_est_ini_m" placeholder="Total">
                                                </fieldset>
                                            </div>

                                            <div class="col-lg-2">
                                                <fieldset class="form-group">
                                                    <label class="form-label semibold" for="a_est_pri_v">Estudiantes Primaria Varones</label>
                                                    <input type="number" class="form-control" id="a_est_pri_v" name="a_est_pri_v" placeholder="Total">
                                                </fieldset>
                                            </div>

                                            <div class="col-lg-2">
                                                <fieldset class="form-group">
                                                    <label class="form-label semibold" for="a_est_pri_m">Estudiantes Primaria Mujeres</label>
                                                    <input type="number" class="form-control" id="a_est_pri_m" name="a_est_pri_m" placeholder="Total">
                                                </fieldset>
                                            </div>

                                            <div class="col-lg-2">
                                                <fieldset class="form-group">
                                                    <label class="form-label semibold" for="a_est_sec_v">Estudiantes Secundaria Varones</label>
                                                    <input type="number" class="form-control" id="a_est_sec_v" name="a_est_sec_v" placeholder="Total">
                                                </fieldset>
                                            </div>

                                            <div class="col-lg-2">
                                                <fieldset class="form-group">
                                                    <label class="form-label semibold" for="a_est_sec_m">Estudiantes Secundaria Mujeres</label>
                                                    <input type="number" class="form-control" id="a_est_sec_m" name="a_est_sec_m" placeholder="Total"><br>
                                                </fieldset>
                                            </div>

                                    </div>

                                    <!-- SALUD -->
                                    <div class="container">
                                        <div><h5 class="m-t-lg with-border">PERSONAL MÉDICO</h5></div>
                                            <div class="col-lg-2">
                                                <fieldset class="form-group">
                                                    <label class="form-label semibold" for="a_per_med_v">Personal Salud Médico Varones</label>
                                                    <input type="number" class="form-control" id="a_per_med_v" name="a_per_med_v" placeholder="Total">
                                                </fieldset>
                                            </div>

                                            <div class="col-lg-2">
                                                <fieldset class="form-group">
                                                    <label class="form-label semibold" for="a_per_med_m">Personal Salud Médico Mujeres</label>
                                                    <input type="number" class="form-control" id="a_per_med_m" name="a_per_med_m" placeholder="Total">
                                                </fieldset>
                                            </div>

                                            <div class="col-lg-2">
                                                <fieldset class="form-group">
                                                    <label class="form-label semibold" for="a_per_enf_v">Personal Salud Enfermería Varones</label>
                                                    <input type="number" class="form-control" id="a_per_enf_v" name="a_per_enf_v" placeholder="Total">
                                                </fieldset>
                                            </div>

                                            <div class="col-lg-2">
                                                <fieldset class="form-group">
                                                    <label class="form-label semibold" for="a_per_enf_m">Personal Salud Enfermería Mujeres</label>
                                                    <input type="number" class="form-control" id="a_per_enf_m" name="a_per_enf_m" placeholder="Total"><br>
                                                </fieldset>
                                            </div>
                                    </div>

                                    <!-- ESTADOS MONITOREO -->
                                    <div class="container">
                                        <div><h5 class="m-t-lg with-border">ESTADOS DE MONITOREO</h5></div>

                                            <div class="col-lg-6">
                                                <fieldset class="form-group">
                                                    <label class="form-label semibold" for="e1">ESTADO 1</label>
                                                    <input type="file" class="form-control" id="e1" name="e1" placeholder="Ingrese el código">
                                                </fieldset>
                                            </div> 

                                            <div class="col-lg-6">
                                                <fieldset class="form-group">
                                                    <label class="form-label semibold" for="e2">ESTADO 2</label>
                                                    <input type="file" class="form-control" id="e2" name="e2" placeholder="Ingrese el código">
                                                </fieldset>
                                            </div> 

                                            <div class="col-lg-6">
                                                <fieldset class="form-group">
                                                    <label class="form-label semibold" for="e3">ESTADO 3</label>
                                                    <input type="file" class="form-control" id="e3" name="e3" placeholder="Ingrese el código">
                                                </fieldset>
                                            </div> 

                                            <div class="col-lg-6">
                                                <fieldset class="form-group">
                                                    <label class="form-label semibold" for="e4">ESTADO 4</label>
                                                    <input type="file" class="form-control" id="e4" name="e4" placeholder="Ingrese el código">
                                                </fieldset>
                                            </div> 

                                    </div>

                                    
                                    <!-- AVANCE -->
                                    <div class="col-lg-3">
                                        <fieldset class="form-group">
                                            <label class="form-label semibold" for="a_avance">AVANCE</label>
                                            <input type="number" class="form-control" id="a_avance" name="a_avance" placeholder="Total" value=<?php echo $row['a_avance'] ?>>
                                        </fieldset>
                                    </div>

                                
                                    <div class="col-lg-12">
                                        <button type="submit" name="action" value="add" class="btn btn-rounded btn-inline btn-primary">Guardar</button>
                                    </div>
                                </form>
                            </div>
                        <?php
                    }
                ?>
            <?php
        break;

            $results = array(
                "sEcho"=>1,
                "iTotalRecords"=>count($data),
                "iTotalDisplayRecords"=>count($data),
                "aaData"=>$data);
            echo json_encode($results);
        break;

        case "mostrar";
            $datos=$unidad_a->listar_unidad_a_id($_POST["id_unidad_a"]);  
            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row)
                {
                    $output["id_unidad_a"] = $row["id_unidad_a"];
                    $output["id_comunidad"] = $row["id_comunidad"];
                    $output["id_estado"] = $row["id_estado"];
                    $output["id_fuente"] = $row["id_fuente"];
                    $output["a_cod"] = $row["a_cod"];
                    $output["a_nombre"] = $row["a_nombre"];
                    $output["a_director_nombre"] = $row["a_director_nombre"];
                    $output["a_director_tel"] = $row["a_director_tel"];
                    $output["a_pcpa"] = $row["a_pcpa"];
                    $output["a_tecnico"] = $row["a_tecnico"];
                    $output["a_docen_ini_v"] = $row["a_docen_ini_v"];
                    $output["a_docen_ini_m"] = $row["a_docen_ini_m"];
                    $output["a_docen_pri_v"] = $row["a_docen_pri_v"];
                    $output["a_docen_pri_m"] = $row["a_docen_pri_m"];
                    $output["a_docen_sec_v"] = $row["a_docen_sec_v"];
                    $output["a_docen_sec_m"] = $row["a_docen_sec_m"];
                    $output["a_est_ini_v"] = $row["a_est_ini_v"];
                    $output["a_est_ini_m"] = $row["a_est_ini_m"];
                    $output["a_est_pri_v"] = $row["a_est_pri_v"];
                    $output["a_est_pri_m"] = $row["a_est_pri_m"];
                    $output["a_est_sec_v"] = $row["a_est_sec_v"];
                    $output["a_est_sec_m"] = $row["a_est_sec_m"];
                    $output["a_per_med_v"] = $row["a_per_med_v"];
                    $output["a_per_med_m"] = $row["a_per_med_m"];
                    $output["a_per_enf_v"] = $row["a_per_enf_v"];
                    $output["a_per_enf_m"] = $row["a_per_enf_m"];
                    $output["e1"] = $row["e1"];
                    $output["e2"] = $row["e2"];
                    $output["e3"] = $row["e3"];
                    $output["e4"] = $row["e4"];
                    $output["a_avance"] = $row["a_avance"];
                }
                echo json_encode($output);
            }   
        break;
    }
?> 