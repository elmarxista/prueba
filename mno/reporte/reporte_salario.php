<?php
/**
 * Created by PhpStorm.
 * User: leonel
 * Date: 22/10/14
 * Time: 09:16 AM
 */


header("Content-Type: text/html;charset=utf-8");
ini_set('display_errors', 'On');
ini_set('display_errors', 1);

require_once('../../db.php');



if(isset($_POST['submit'])){



    require_once('../../clases/Validate.php');
    require_once('../../clases/funciones.php');

    $validation = array(

        array('nombre' => 'kilometros',
            'requerida' => true,
            'regla' => 'float',
            'tipo' => ','),

        array('nombre' => 'codigo_bien_hi',
            'requerida' => true,
            'regla' => 'number'),

        array('nombre' => 'agua',
            'requerida' => true,
            'regla' => 'number'),

        array('nombre' => 'frenos',
            'requerida' => true,
            'regla' => 'number'),

        array('nombre' => 'aceite',
            'requerida' => true,
            'regla' => 'number'),

        array('nombre' => 'filtro',
            'requerida' => true,
            'regla' => 'number'),

        array('nombre' => 'cauchos',
            'requerida' => true,
            'regla' => 'number'),

    );



    $validated = new Validate($validation,$_POST);
    $validated->validate();



    if(!$validated->getIsError()){

        $kilometros = $_POST['kilometros'];
        $observacion = $_POST['observacion'];
        $codigo_bien_hi = $_POST['codigo_bien_hi'];
        $caucho = $_POST['cauchos'];
        $filtro = $_POST['filtro'];
        $aceite = $_POST['aceite'];
        $agua = $_POST['agua'];
        $frenos = $_POST['frenos'];
        $fecha_actual = fecha_sicap();



        $sql = "SELECT kilometros FROM bie_tipo_vehiculo WHERE codigo = '$codigo_bien_hi'";

        $result=mysql_query($sql);

        $test = mysql_fetch_array($result);

        $kilometros_anteror = $test['kilometros'];

        $nuevos_kilometros =$kilometros - $kilometros_anteror ;



        $sql = "INSERT INTO bie_revicion_diaria_vhiculo
          (cod_vehiculo,agua,aceite,filtro,caucho,frenos,observacion,fecha,kilometros)
          VALUES
          ('$codigo_bien_hi','$agua','$aceite','$filtro','$caucho','$frenos','$observacion','$fecha_actual','$nuevos_kilometros')";



        mysql_query($sql) or die('error agregar revicion de vehiculo'.mysql_error());



        $sql = "UPDATE bie_tipo_vehiculo SET kilometros = '$kilometros' WHERE codigo = '$codigo_bien_hi'";

        mysql_query($sql) or die('error actualizar kilometros  '.mysql_error());

        send_error_redirect(false);
        die;

    }else if($validated->getIsError()){

        send_error_redirect(true);
    }
}



?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <title>SICAP | Sistema Integral de Costos</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="author" content="Leonel Soriano leonelsoriano3@gmail.com" />
    <link href="../../css/helper.css" media="screen" rel="stylesheet" type="text/css" />
    <link href="../../css/stylesheet.css" rel="stylesheet" type="text/css" />
    <script src="../../js/jquery-1.10.2.js"></script>

    <script type="text/javascript">

        $(function() {

            $("#buscar_empleado").click(function() {
                var win = window.open("buscar_empleado.php", "nuevo", "directories=no, location=no, menubar=no, scrollbars=yes, statusbar=no, tittlebar=no, width=900, height=600,left=200,top=90 ");
                win.focus();
            });

        });


        $(function() {

            $("#buscar_departamento").click(function() {
                var win = window.open("buscar_departamento.php", "nuevo", "directories=no, location=no, menubar=no, scrollbars=yes, statusbar=no, tittlebar=no, width=900, height=600,left=200,top=90 ");
                win.focus();
            });

        });

    </script>

</head>


<body class="flickr-com">


<form method="get" accept-charset="UTF-8" name="formulario" action="../beneficio_periodicos/beneficio_periodicos_ver.php">

    <div id="body_bottom_bgd">
        <div id=""> <!--<img src="images/Logo_Inventario.png"/>-->
            <!--</div>-->                <!-- Menu -->
            <!--  ?php include 'include/nav.php'; ?>-->
            <div align="justify" id="right_col" >

                <div id="header">
                </div>

                <div id="">
                    <div id="firefoxbug"><!-- firefoxbug -->
                        <!-- <div id="blue_line"></div>-->
                        <div class="dynamicContent" align="left">
                            <!--  <h1>Inicio</h1>-->
                            <!--<p><a href="seleccion_sicap.html" class="main-site">Principal</a></p>-->
                            <h1><img src="../../images/seleccion_sicap_archivos/image002.jpg" alt="flickr" /><strong>                Módulo de Nomina | Reporte</strong></h1>
                            <br/>
                            <TABLE BORDER="0" CELLSPACING="10" >

                                <tr>
                                    <td><label>Empleado</label></td>
                                    <td>
                                        <input type="text" name="nombre_empleado"  disabled>

                                        <input type="button" name="buscar_empleado" id="buscar_empleado" value="Buscar"/>

                                    </td>
                                    <input type="hidden" name="cedulaempleado" id="codigo_empleado_hi"/>
                                </tr>


                                <tr>
                                    <td><label>Departamento</label></td>
                                    <td>
                                        <input type="text" name="nombre_departamento"  disabled>

                                        <input type="button" name="buscar_departamento" id="buscar_departamento" value="Buscar"/>

                                    </td>
                                    <input type="hidden" name="codigo_departamento_hi" id="codigo_departamento_hi"/>
                                </tr>


                                <TR>
                                    <TD><label>Mes</label></TD>
                                    <TD>
                                        <select name='mes' id='mes' >

                                            <?php

                                            $mes = date('n');

                                            if($mes == 1){
                                                echo(" <option value='1' selected>Enero</option>");
                                            }else{
                                                echo(" <option value='1' >Enero</option>");
                                            }
                                            if($mes == 2){
                                                echo(" <option value='2' selected>Febrero</option>");
                                            }else{
                                                echo(" <option value='2' >Febrero</option>");
                                            }
                                            if($mes == 3){
                                                echo(" <option value='3' selected>Marzo</option>");
                                            }else{
                                                echo(" <option value='3' >Marzo</option>");
                                            }
                                            if($mes == 4){
                                                echo(" <option value='4' selected>Abril</option>");
                                            }else{
                                                echo(" <option value='4' >Abril</option>");
                                            }
                                            if($mes == 5){
                                                echo(" <option value='5' selected>Mayo</option>");
                                            }else{
                                                echo(" <option value='5' >Mayo</option>");
                                            }
                                            if($mes == 6){
                                                echo(" <option value='6' selected>Junio</option>");
                                            }else{
                                                echo(" <option value='6' >Junio</option>");
                                            }
                                            if($mes == 7){
                                                echo(" <option value='7' selected>Julio</option>");
                                            }else{
                                                echo(" <option value='7' >Julio</option>");
                                            }
                                            if($mes == 8){
                                                echo(" <option value='8' selected>Agosto</option>");
                                            }else{
                                                echo(" <option value='8' >Agosto</option>");
                                            }
                                            if($mes == 9){
                                                echo(" <option value='9' selected>Septiembre</option>");
                                            }else{
                                                echo(" <option value='9' >Septiembre</option>");
                                            }
                                            if($mes == 10){
                                                echo(" <option value='10' selected>Octubre</option>");
                                            }else{
                                                echo(" <option value='10' >Octubre</option>");
                                            }
                                            if($mes == 11){
                                                echo(" <option value='11' selected>Noviembre</option>");
                                            }else{
                                                echo(" <option value='11' >Noviembre</option>");
                                            }
                                            if($mes == 12){
                                                echo(" <option value='12' selected>Diciembre</option>");
                                            }else{
                                                echo(" <option value='12' >Diciembre</option>");
                                            }

                                            ?>

                                        </select>
                                    </TD>



                                <TR>
                                    <TD><label>Año</label></TD>
                                    <TD>
                                        <select name='anhio' id='codigoanhio' >

                                            <?php $anhio = date('Y');
                                            echo('<option value="'.($anhio -12).'">'.($anhio -12).'</option>');
                                            echo('<option value="'.($anhio -11).'">'.($anhio -11).'</option>');
                                            echo('<option value="'.($anhio -10).'">'.($anhio -10).'</option>');
                                            echo('<option value="'.($anhio -9).'">'.($anhio -9).'</option>');
                                            echo('<option value="'.($anhio -8).'">'.($anhio -8).'</option>');
                                            echo('<option value="'.($anhio -7).'">'.($anhio -7).'</option>');
                                            echo('<option value="'.($anhio -6).'">'.($anhio -6).'</option>');
                                            echo('<option value="'.($anhio -5).'">'.($anhio -5).'</option>');
                                            echo('<option value="'.($anhio -4).'">'.($anhio -4).'</option>');
                                            echo('<option value="'.($anhio -3).'">'.($anhio -3).'</option>');
                                            echo('<option value="'.($anhio -2).'">'.($anhio -2).'</option>');
                                            echo('<option value="'.($anhio -1).'">'.($anhio -1).'</option>');
                                            echo('<option value="'.($anhio).'"selected>'.($anhio).'</option>');
                                            echo('<option value="'.($anhio + 1).'">'.($anhio + 1).'</option>');
                                            ?>
                                        </select>
                                    </TD>

                                    <tr>

                                    <tr></tr>

                                    <?php

                                        $sql = "SELECT * FROM mno_new_concepto_tipo ";
                                    $result=mysql_query($sql);
                                    $indice = 0;
                                    while($test = mysql_fetch_array($result)){

                                        $id =  $test['codigo'];
                                        $nombre = $test['nombre'];
                                        if($indice == 2){
                                            echo('<tr>');
                                        }
                                        echo('<td>');
                                        echo('<labe>'.$nombre.'</labe>');
                                        echo('</td>');
                                        echo('<td>');
                                        echo('<input type="checkbox" name="'.$id.'" checked/>');
                                        echo('</td>');
                                        if($indice == 2){
                                            echo('</tr>');
                                        }

                                        if($indice == 3){
                                            $indice = 0;
                                        }
                                        $indice = $indice + 1;
                                    }


                                    ?>


                                    <!-- leonel -->


                            </TABLE>

                            <br/>
                            <table>
                                <tr>
                                    <td><input type="submit" value="Generar Reporte" name="submit"></td>
                                    <td><a href="../../bie_menu.php"><input type="button" value="Atras"></a> </td>

                                </tr>
                            </table>
                            <!-- / END -->
                            <p></p>
                        </div>
                    </div><!--end firefoxbug-->
                </div><!--end left_bgd-->

            </div>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>
                <!--end right_col-->
            </p>
            <p>&nbsp; </p>
            <div class="clearboth"></div>
        </div>
        <div align="center" class="pie">SICAP 2014</div>
    </div>




</form>

</body>
</html>