<?php

include_once('clases/Seguridad.php');

$a = new Seguridad();

$a->chekear_session();

?>

<?php
/**
 * Created by PhpStorm.
 * User: leonel
 * Date: 13/10/14
 * Time: 08:37 AM
 */
?>

    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
    <head>
        <title>SICAP | Sistema Integral de Costos</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="author" content="Leonel Soriano leonelsoriano3@gmail.com" />
        <link href="./js/jquery-ui-1.11.0.custom/jquery-ui.css" rel="stylesheet">
        <script src="./js/jquery-ui-1.11.0.custom/external/jquery/jquery.js"></script>
        <script src="./js/jquery-ui-1.11.0.custom/jquery-ui.js"></script>
        <link href="./css/helper.css" media="screen" rel="stylesheet" type="text/css" />
        <link href="./css/stylesheet.css" rel="stylesheet" type="text/css" />
        <script src="./js/jquery-1.10.2.js"></script>

        <style>
            body{
                font: 62.5% "Trebuchet MS", sans-serif;
                margin: 50px;
            }
            .demoHeaders {
                margin-top: 2em;
            }
            #dialog-link {
                padding: .4em 1em .4em 20px;
                text-decoration: none;
                position: relative;
            }
            #dialog-link span.ui-icon {
                margin: 0 5px 0 0;
                position: absolute;
                left: .2em;
                top: 50%;
                margin-top: -8px;
            }
            #icons {
                margin: 0;
                padding: 0;
            }
            #icons li {
                margin: 2px;
                position: relative;
                padding: 4px 0;
                cursor: pointer;
                float: left;
                list-style: none;
            }
            #icons span.ui-icon {
                float: left;
                margin: 0 4px;
            }
            .fakewindowcontain .ui-widget-overlay {
                position: absolute;
            }
            select {
                width: 200px;
            }

            table.tablas-nuevas {
                border-collapse: collapse;



            }

            table.tablas-nuevas, th.tablas-nuevas, td.tablas-nuevas {
                border: 1px solid black;
            }

            table.tablas-nuevas {
                margin: 0 auto;
                width: 90%;

            }

            table.tablas-nuevas th {
                height: 30px;

                padding-right: 3px;
                padding-left: 3px;
            }


            table.tablas-nuevas td {
                text-align: center;

                vertical-align: bottom;

            }

            table.tablas-nuevas td {
                padding: 6px;
            }

            table.tablas-nuevas ,table.tablas-nuevas td,table.tablas-nuevas th {
                border: 0px solid;

            }



            table.tablas-nuevas td{
                border-right: .5px solid white;
                border-bottom: .1px solid black;
            }


            table.tablas-nuevas th {
                border: 0.5px solid white;
                background-color: #88A3FD;
                font-weight: normal;
                border-top: 5px solid #7A96F9;
                padding-right: 3px;
                padding-left: 3px;
            }


            table.tablas-nuevas tr:nth-child(odd){ background-color:#ECF0FF; }

            table.tablas-nuevas tr:nth-child(even)    { background-color:#C6D1FC; }

            table.tablas-nuevas tr:nth-child(even):hover{
                background-color: #B0C1FA;
            }

            table.tablas-nuevas tr:nth-child(odd):hover{
                background-color: #B0C1FA;
            }

        </style>



    </head>
    <body class="flickr-com">


    <!-- Beginning of compulsory code below -->
    <form method="post">

        <table border=none class="tablas-nuevas">
            <tr>
                <th>Cedula</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th></th>

            </tr>
            <?php
            include("db.php");
            $sql ="
SELECT * FROM mrh_empleado WHERE retirado = 'no' ORDER BY cedula*1";
            $result=mysql_query($sql);


            while($test = mysql_fetch_array($result))
            {
                //  calculos de horas
                $id = $test['codigo'];
                $primernombre = $test['primernombre'];
                $primerapellido = $test['primerapellido'];
                $cedula = $test['cedula'];


                echo "<tr align='center'>";
                echo"<td><font color='black'>". $cedula . "</font></td>";
                echo"<td><font color='black'>". $primernombre .  "</font></td>";
                echo"<td><font color='black'>". $primerapellido . "</font></td>";


                echo '<td> <ul onClick="devolver(\''.$id.'\',\''.$cedula .'\')" id="icons" class="ui-widget ui-helper-clearfix"> <li class="ui-state-default ui-corner-all" title=".ui-icon-check"><span class="ui-icon ui-icon-check"></span></li> </ul></td>';
                echo "</tr>";/*     <span onClick="devolvercedula(\''.$codigo_alias.'\',\''.$nombre.'\',\''.$proveedor.'\',\''.$descripcion.'\',\''.$ubicacion.'\',\''.$existencia.'\')" class="ui-icon ui-icon-check"></span>*/
            }
            mysql_close($conn);


            ?>
        </table>

        <!-- / END -->

    </form>

    </body>
    </html>

    <script>
        function devolver(id,cedula){

            opener.document.formulario.nombre_empleado.value = cedula;
            opener.document.formulario.buscar_empleado_hi.value = id;


            window.close();

        }
    </script>




<?php

mysql_close($conn);

?>