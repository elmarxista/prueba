<?php
/**
 * Created by PhpStorm.
 * User: leonel
 * Date: 28/09/14
 * Time: 03:05 PM
 */

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html >
<head>
    <title>SICAP | Sistema Integral de Costos</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="author" content="Leonel Soriano leonelsoriano3@gmail.com" />
    <link href="../../css/helper.css" media="screen" rel="stylesheet" type="text/css" />
    <script src="../../js/htmlDatePicker.js" type="text/javascript"></script>

    <link href="../../css/stylesheet.css" rel="stylesheet" type="text/css" />

    <!-- / END -->

</head>
<body class="flickr-com">

<!--<p><a href="mrh_menu.html" class="main-site">Principal</a></p>-->

<!--<h1><img src="images/flickr.com/icon.png" alt="flickr" />Módulo de Recursos Humanos | Listado de Turnos</h1>-->

<!-- Beginning of compulsory code below -->

<form method="post">

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
                            <h1><img src="../../images/seleccion_sicap_archivos/image002.jpg" alt="flickr" /><strong>                Módulo de Recursos Humanos | Formulas</strong></h1>
                            <br/><br/>
                            <table border=none class="tablas-nuevas">

                                <tr id="tmp">
                                    <th>Nombre</th>

                                    <th>Formula</th>

                                    <th></th>
                                    <th></th>

                                </tr>
                                <tr>
                                    <?php



                                    include("../../db.php");
                                    $result=mysql_query("SELECT * FROM mno_new_formulas ;");

                                    while($test = mysql_fetch_array($result)){

                                        $id = $test['codigo'];
                                        $nombre = $test['nombre'];
                                        $formula = $test['formula'];



                                        echo "<tr align='center'>";
                                        echo"<td><font color='black'>". $nombre . "</font></td>";

                                        echo"<td><font color='black'>". $formula . "</font></td>";



                                            echo"<td> <a href ='formula_mod.php?id=$id'>Modificar</a></td>";
                                            echo"<td> <a href ='formula_del.php?id=$id'>Borrar</a></td>";


                                        echo "</tr>";
                                    }
                                    mysql_close($conn);
                                    ?>
                                </tr>

                            </table>
                            <br/>
                            <a href="./formulas.php"><input type="button" value="Atras"></a>
                            <a href="./formulas.php"><input type="button" value="Atras"></a>
                            <p></p>
                        </div>
                    </div><!--end firefoxbug-->
                </div><!--end left_bgd-->

            </div>
            <p>
                <!--end right_col-->
            </p>
            <p>&nbsp; </p>
            <div class="clearboth"></div>
        </div>
        <div align="center" class="pie">SICAP 2014</div>
    </div>

    <!-- / END -->

</form>

</body>
</html>