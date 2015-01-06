<?php
/**
 * Created by PhpStorm.
 * User: leonel
 * Date: 08/12/14
 * Time: 09:36 AM
 */

?>
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
    <head>
        <title>SICAP | Sistema Integral de Costos</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="author" content="Leonel Soriano leonelsoriano3@gmail.com" />
        <link href="../../js/jquery-ui-1.11.0.custom/jquery-ui.css" rel="stylesheet">
        <script src="../../js/jquery-ui-1.11.0.custom/external/jquery/jquery.js"></script>
        <script src="../../js/jquery-ui-1.11.0.custom/jquery-ui.js"></script>

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
                <th>Nombre</th>
                <th>Codigo</th>

                <th></th>

            </tr>
            <?php
            include("../../db.php");
            $sql ="SELECT
    Tbl1.nombre_bien,
    Tbl1.codigo_alias,
    Tbl1.costo_adquisicion,
    Tbl1.vida_util,
    Tbl1.fecha_adquisicion,
    Tbl1.valor_rescate,
	Tbl1.depreciacion,
	Tbl1.codigo,
	Tbl1.tipo
FROM
    (SELECT
		codigo,
        nombre_bien as nombre_bien,
            codigo_alias as codigo_alias,
            costo_adquisicion,
            vida_util,
            fecha_adquisicion,
            valor_rescate,
			codigo_depreciacion as depreciacion,
			'bie_tipo_basico' as tipo
    FROM
        bie_tipo_basico
    WHERE
        codigo_depreciacion <> '1'
UNION SELECT
				codigo,
        nombre_bien as nombre_bien,
            codigo_alias as codigo_alias,
            costo_adquisicion,
            vida_util,
            fecha_adquisicion,
            valor_rescate,
			codigo_depreciacion as depreciacion,
			'bie_tipo_vehiculo' as tipo
    FROM
        bie_tipo_vehiculo
            WHERE
        codigo_depreciacion <> '1'
 UNION SELECT
		codigo,
        nombre_bien as nombre_bien,
            codigo_alias as codigo_alias,
            costo_adquisicion,
            vida_util,
            fecha_adquisicion,
            valor_rescate,
			codigo_depreciacion as depreciacion,
			'bie_tipo_maquinaria' as tipo
    FROM
        bie_tipo_maquinaria
            WHERE
        codigo_depreciacion <> '1'

) Tbl1
ORDER BY Tbl1.nombre_bien
";
            $result=mysql_query($sql);


            echo "<tr align='center'>";

//            echo"<td style='text-align: left'><font color='black'> Todos </font></td>";
//
//            echo '<td> <ul onClick="devolver(\''.('*').'\',\''.'*'.'\')" id="icons" class="ui-widget ui-helper-clearfix"> <li class="ui-state-default ui-corner-all" title=".ui-icon-check"><span class="ui-icon ui-icon-check"></span></li> </ul></td>';
//            echo "</tr>";
//


            while($test = mysql_fetch_array($result))
            {
                //  calculos de horas
                $id = $test['codigo'];
                $nombre = $test['nombre_bien'];
                $codigo_alias = $test['codigo_alias'];
                $codigo_depreciacion = $test['depreciacion'];
                $tipo = $test['tipo'];
                $codigo_alias = $test['codigo_alias'];


                echo "<tr align='center'>";

                echo"<td style='text-align: left'><font color='black'>". $nombre  .  "</font></td>";
                echo"<td style='text-align: left'><font color='black'>". $codigo_alias  .  "</font></td>";

                echo '<td> <ul onClick="devolver(\''.$id.'\',\''.$nombre.'\',\''.$codigo_depreciacion.'\',\''.$tipo.'\')" id="icons" class="ui-widget ui-helper-clearfix"> <li class="ui-state-default ui-corner-all" title=".ui-icon-check"><span class="ui-icon ui-icon-check"></span></li> </ul></td>';
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
        function devolver(id,nombre,codigo_depresiacion,tipo){


            opener.document.formulario.nombre_articulo.value = nombre;
            opener.document.formulario.codigo_bien_hi.value = id;
            opener.document.formulario.tipo_bien_hi.value = tipo;

            /*linea recta = 1 ; horas trabajadas = 7 ; unidaddes producidad = 2; kilometros = 3*/

            alert(tipo);

            if(codigo_depresiacion == 7){
                opener.document.getElementById("valor").innerHTML = 'Horas Trabajadas';
            }else if(codigo_depresiacion == 2){
                opener.document.getElementById("valor").innerHTML = 'Unidades Producidas';
            }else if(codigo_depresiacion == 3){
                opener.document.getElementById("valor").innerHTML = 'Kilometros';
            }


            window.close();

        }
    </script>




<?php

mysql_close($conn);

?>