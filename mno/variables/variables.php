<?php
/**
 * Created by PhpStorm.
 * User: leonel
 * Date: 28/09/14
 * Time: 12:30 AM
 */


header("Content-Type: text/html;charset=utf-8");
ini_set('display_errors', 'On');
ini_set('display_errors', 1);

require_once('../../db.php');



if(isset($_POST['submit'])){


    require_once('../../clases/Validate.php');
    require_once('../../clases/funciones.php');

    $validation = array(

        array('nombre' => 'valor',
            'requerida' => true,
            'regla' => 'float',
            'tipo' => ','),

        array('nombre' => 'nombre',
            'requerida' => true,),

    );



    $validated = new Validate($validation,$_POST);
    $validated->validate();



    if(!$validated->getIsError()){

        $nombre = $_POST['nombre'];
        $valor = $_POST['valor'];
        $contable = $_POST['contable'];


        $sql = "SELECT count(mno_new_cosntantes.codigo) as cantidad FROM mno_new_cosntantes
            WHERE mno_new_cosntantes.nombre = '$nombre'";

        $result=mysql_query($sql);

        $test = mysql_fetch_array($result);

        $cantidad = $test['cantidad'];


        if($cantidad != '0'){
            send_error_redirect(true,'Variable+ya+existe');
        }


        $sql = "INSERT INTO mno_new_cosntantes
          (nombre,valor,codigo_contable)
          VALUES
          ('$nombre','$valor','$contable')";



        mysql_query($sql) or die('error agregar revicion de vehiculo'.mysql_error());



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


</head>


<body class="flickr-com">

<?php

    if(isset($_GET['msg'])){
        print rawurldecode($_GET['msg']);
    }

?>

<form method="post" accept-charset="UTF-8" name="formulario">

    <div id="body_bottom_bgd">
        <div id="">

            <div align="justify" id="right_col" >

                <div id="header">
                </div>

                <div id="">
                    <div id="firefoxbug"><!-- firefoxbug -->
                        <!-- <div id="blue_line"></div>-->
                        <div class="dynamicContent" align="left">
                            <!--  <h1>Inicio</h1>-->
                            <!--<p><a href="seleccion_sicap.html" class="main-site">Principal</a></p>-->
                            <h1><img src="../../images/seleccion_sicap_archivos/image002.jpg" alt="flickr" /><strong>                Módulo de Recursos Humanos | Variables</strong></h1>
                            <br/>
                            <TABLE BORDER="0" CELLSPACING="10" >

                                <tr>
                                    <td><label>Nombre</label></td>
                                    <td>
                                        <input type="text" name="nombre"  >

                                    </td>
                                </tr>

                                <tr>
                                    <td><label>Codigo Contable</label></td>
                                    <td>
                                        <input type="text" name="contable"  >

                                    </td>
                                </tr>


                                <tr>
                                    <td><label>Valor</label></td>
                                    <td>
                                        <input type="text" name="valor"  >

                                    </td>

                                </tr>

                                <!-- leonel -->

                            </TABLE>

                            <br/>
                            <table>
                                <tr>
                                    <td><input type="submit" value="Guardar datos" name="submit"></td>
                                    <td><a href="variables_ver.php"><input type="button" value="Ver datos"></a> </td>
                                    <td><a href="../../mno_menu.html"><input type="button" value="Atras"></a> </td>

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

            <p>&nbsp; </p>
            <div class="clearboth"></div>
        </div>
        <div align="center" class="pie">SICAP 2014</div>
    </div>




</form>

</body>
</html>