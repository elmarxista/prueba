<?php

include_once('clases/Seguridad.php');

$a = new Seguridad();

$a->chekear_session();

?>

<?php
       
require("db.php");
$id =$_REQUEST['codigo'];

$result = mysql_query("SELECT * FROM mno_apartado WHERE codigo  = '$id'");
//echo $result;
//exit;
$test = mysql_fetch_array($result);
if (!$result) 
		{
		die("Error: Data not found..");
		}
        
        $descripcion=$test['descripcion'];
        $dias=$test['dias'];    
        $fechavigencia=$test['fechavigencia'];
                
if(isset($_POST['submit']))
{	
        
        $descripcion=$_POST['descripcion'];
        $dias=$_POST['dias'];
        $fechavigencia=$_POST['fechavigencia'];

        $sql = "update mno_apartado set descripcion='$descripcion',dias='$dias',fechavigencia='$fechavigencia'
                 where codigo = '$id'";
       //echo $sql;
       //exit;
	mysql_query($sql) or die(mysql_error()); 
        
	echo "<script language='JavaScript' type='text/javascript'>";
        echo "alert('El Registro se ha Modificado');";		
        echo "</script>";
	
	header("Location: apartado_ver.php");			
}
mysql_close($conn);
?> 

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>SICAP | Sistema Integral de Costos</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="author" content="Tomas Bagdanavicius, http://www.lwis.net/free-css-drop-down-menu/" />
<meta name="keywords" content=" css, dropdowns, dropdown menu, drop-down, menu, navigation, nav, horizontal, vertical left-to-right, vertical right-to-left, horizontal linear, horizontal upwards, cross browser, internet explorer, ie, firefox, safari, opera, browser, lwis" />
<meta name="description" content="Clean, standards-friendly, modular framework for dropdown menus" />
<link href="css/helper.css" media="screen" rel="stylesheet" type="text/css" />
<link href="css/ui-lightness/jquery-ui-1.10.4.custom.css" rel="stylesheet">
<script src="js/jquery-1.10.2.js"></script>
<script src="js/jquery-ui-1.10.4.custom.js"></script>   
<link rel="stylesheet" href="/resources/demos/style.css">
<link href="./css/stylesheet.css" rel="stylesheet" type="text/css" />

<script>
    $(function() {
        $( "#datepicker1" ).datepicker({ dateFormat: 'yy-mm-dd' });
        $( "#datepicker2" ).datepicker({ dateFormat: 'yy-mm-dd' });
        $( "#datepicker3" ).datepicker({ dateFormat: 'yy-mm-dd' });
    });
</script>    
    


<!-- Beginning of compulsory code below -->

<link href="css/dropdown/dropdown.css" media="screen" rel="stylesheet" type="text/css" />
<link href="css/dropdown/themes/flickr.com/default.ultimate.css" media="screen" rel="stylesheet" type="text/css" />

<!-- / END -->

</head>
<body class="flickr-com">

<!--<p><a href="mrh_menu.html" class="main-site">Principal</a></p>

<h1><img src="images/flickr.com/icon.png" alt="flickr" />Módulo de Recursos Humanos | Empleados</h1>-->

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
    <h1><img src="images/seleccion_sicap_archivos/image002.jpg" alt="flickr" /><strong>                Módulo de Recursos Humanos | Apartado</strong></h1>

<TABLE BORDER="0" CELLSPACING="4" WIDTH="500">

    <TR>
          <TD><label>Descripción</label></TD>
          <TD><p><input type="text" name="descripcion" id="descripcion" size="20" value="<?php echo $descripcion?>"></p></TD>
    </TR> 
    <TR>
          <TD><label>Días</label></TD>
          <TD><p><input type="text" name="dias" id="descripcion" size="20" value="<?php echo $dias?>"></p></TD>
    </TR> 
    <TR>
          <TD><label>Fecha de Vigencia</label></TD>
          <TD><p><input type="text" name="fechavigencia" id="fechavigencia" size="20" value="<?php echo $fechavigencia?>"></p></TD>
    </TR>      

</TABLE>

<table>
    <tr> 
        <td>
            <input type="submit" name="submit" value="Guardar datos" >
        </td>
        <td>
            <a href="apartado_ver.php"><input type="button" value="Ver datos"></a> 
        </td>
    </tr> 
</table>
<!-- / END -->
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



</form>
</body>
</html>
