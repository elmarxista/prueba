<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>SICAP | Sistema Integral de Costos</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="author" content="Tomas Bagdanavicius, http://www.lwis.net/free-css-drop-down-menu/" />
<meta name="keywords" content=" css, dropdowns, dropdown menu, drop-down, menu, navigation, nav, horizontal, vertical left-to-right, vertical right-to-left, horizontal linear, horizontal upwards, cross browser, internet explorer, ie, firefox, safari, opera, browser, lwis" />
<meta name="description" content="Clean, standards-friendly, modular framework for dropdown menus" />
<link href="../../css/helper.css" media="screen" rel="stylesheet" type="text/css" />
<script src="../../js/htmlDatePicker.js" type="text/javascript"></script>
<link href="../../css/htmlDatePicker.css" rel="stylesheet">
<!-- Beginning of compulsory code below -->
<link href="/sicap/css/dropdown/dropdown.css" media="screen" rel="stylesheet" type="text/css" />
<link href="/sicap/css/dropdown/themes/flickr.com/default.ultimate.css" media="screen" rel="stylesheet" type="text/css" />
<link href="../../css/stylesheet.css" rel="stylesheet" type="text/css" />

<!-- / END -->

</head>


<body class="flickr-com">
<!--<p><a href="mrh_menu.html" class="main-site">Principal</a></p>-->
<!--<h1><img src="images/seleccion_sicap_archivos/image002.jpg" alt="flickr" />Módulo de Recursos Humanos | Cargo</h1>-->
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
    <h1><img src="/sicap/images/seleccion_sicap_archivos/image002.jpg" alt="flickr" /><strong>                Módulo de Nómina | Monto por Constante</strong></h1>

<TABLE BORDER="0" CELLSPACING="4" WIDTH="500">
     <TR>	 
     <TD><label>Constante</label></TD>    
            <?php // consulta de los meses
            // Consultar la base de datos
                include("../../db.php");
                $consulta_mysql='select * from mno_constante where asignacion="S"';
                $resultado_consulta_mysql=mysql_query($consulta_mysql);
                echo "<TD>";
                echo "<select name='codigoconstante' id='codigoconstante' >";
                    while($fila=mysql_fetch_array($resultado_consulta_mysql)){
                        echo "<option value='".$fila['codigo']."'>".$fila['codigoproceso']."  |  ".$fila['descripcion']."</option>";
                    }
                echo "</select>";
                echo "</TD>";
             ?>   
     </TR>     
     <TR>
          <TD><label>Monto</label></TD>
          <TD><p><input type="text" name="monto" id="monto" size="20"></p></TD>
     </TR> 

</TABLE>

<table>
        <tr>
        <td><input type="submit" value="Guardar datos" name="submit"></td>
        <td><a href="/sicap/mno/montoconstante/montoconstante_ver.php"><input type="button" value="Ver datos"></a> </td>
        <td><a href="/sicap/mno_menu.html"><input type="button" value="Atras"></a> </td>
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

        
        
<?php
if (isset($_POST['submit']))
	{	   
            include '../../db.php';        
            $codigoconstante=$_POST['codigoconstante'];

            $monto=$_POST['monto'];
            
            $sql = "update mno_constante set asignacion='S' where codigo='$codigoconstante'";
            //echo $sql;
           // exit;
            mysql_query($sql) or die('No se pudo guardar la información. '.mysql_error());	

            $sql = "insert into mco_montoconstante(codigoconstante,monto)
                                                          values('$codigoconstante','$monto')";
            //echo $sql;
            //exit;
            mysql_query($sql) or die('No se pudo guardar la información. '.mysql_error());	
            
            echo "<script type='text/javascript'>";
            echo "alert('Registro Almacenado');";
            echo "document.location.href = document.location.href;";
            echo "</script>"; 	
          
            
            
	}
?>
</form>
</body>
</html>
