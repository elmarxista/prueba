<?php
       
require("../../db.php");
$gerencia =$_REQUEST['gerencia'];
$unidad =$_REQUEST['unidad'];


$result = mysql_query("SELECT * FROM mno_gerencia WHERE codigo  = '$gerencia'");
//echo $result;
//exit;
$test = mysql_fetch_array($result);
if (!$result) 
		{
                    die("Error: Data not found..");
		}
        $codigogerencia=$test['codigoalias'];
        $descripciongerencia=$test['descripcion'];
        
$result = mysql_query("SELECT * FROM mno_unidadadm WHERE codigo  = '$unidad' and codigogerencia='$gerencia'");
//echo $result;
//exit;
$test = mysql_fetch_array($result);
if (!$result) 
		{
                    die("Error: Data not found..");
		}
        $codigounidad=$test['codigoalias'];
        $descripcionunidad=$test['descripcion'];
        
        
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>SICAP | Sistema Integral de Costos</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="author" content="Tomas Bagdanavicius, http://www.lwis.net/free-css-drop-down-menu/" />
<meta name="keywords" content=" css, dropdowns, dropdown menu, drop-down, menu, navigation, nav, horizontal, vertical left-to-right, vertical right-to-left, horizontal linear, horizontal upwards, cross browser, internet explorer, ie, firefox, safari, opera, browser, lwis" />
<meta name="description" content="Clean, standards-friendly, modular framework for dropdown menus" />
<link href="../../css/helper.css" media="screen" rel="stylesheet" type="text/css" />
<link href="../../css/ui-lightness/jquery-ui-1.10.4.custom.css" rel="stylesheet">
<script src="../../js/jquery-1.10.2.js"></script>
<script src="../../js/jquery-ui-1.10.4.custom.js"></script>
<link href="../../css/stylesheet.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="/sicap/resources/demos/style.css">

 <script>
    $(function() {
        $( "#datepicker1" ).datepicker({ dateFormat: 'yy-mm-dd' });
        $( "#datepicker2" ).datepicker({ dateFormat: 'yy-mm-dd' });
        $( "#datepicker3" ).datepicker({ dateFormat: 'yy-mm-dd' });
    });
</script>    
<!-- Beginning of compulsory code below -->

<link href="/sicap/css/dropdown/dropdown.css" media="screen" rel="stylesheet" type="text/css" />
<link href="/sicap/css/dropdown/themes/flickr.com/default.ultimate.css" media="screen" rel="stylesheet" type="text/css" />

<!-- / END -->

</head>
<body class="flickr-com">

<p>&nbsp;</p>
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
  
 <h1><img src="/sicap/images/seleccion_sicap_archivos/image002.jpg" alt="flickr" /><strong>                Módulo de Nómina | Departamento</strong></h1>
<form method="post">
<TABLE BORDER="0" CELLSPACING="4" WIDTH="500">

    <TR>
          <TD><label>Gerencia</label></TD>
          <TD><p><input type="text" name="codigogerencia" id="codigogerencia" size="20" value = "<?php echo $codigogerencia; ?>" disabled ></p></TD>
          <TD><p><input type="text" name="descripciongerencia" id="descripciongerencia" size="20" value="<?php echo $descripciongerencia; ?>" disabled ></p></TD>
    </TR> 
    
    <TR>
          <TD><label>Unidad Administrativa</label></TD>
          <TD><p><input type="text" name="codigounidad" id="codigounidad" size="20" value = "<?php echo $codigounidad; ?>" disabled ></p></TD>
          <TD><p><input type="text" name="descripcionunidad" id="descripcionunidad" size="20" value="<?php echo $descripcionunidad; ?>" disabled ></p></TD>
    </TR> 
      
    <TR>
          <TD><label>Código</label></TD>
          <TD><p><input type="text" name="codigoalias" id="codigoalias" size="20"></p></TD>
    </TR>
    
    <TR>
          <TD><label>Descripción</label></TD>
          <TD><p><input type="text" name="descripcion" id="descripcion" size="20"></p></TD>
    </TR> 

</TABLE>

<table>   
     <tr>
        <td>
            <input type="submit" value="Guardar datos" name="submit">
        </td>
        <td> 
            <a href="departamento_ver.php?gerencia=<?php echo $gerencia?>&unidad=<?php echo $unidad ?>"><input type="button" value="Ver datos"></a>
        </td>
        <TD>
            <a href="/sicap/mno/unidadadm/unidadadm_ver.php?codigo=<?php echo $gerencia?>"><input type="button" value="Atras"></a> 
        </TD>
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
        $codigoalias=$_POST['codigoalias'];
        $descripcion=$_POST['descripcion'];
       
        $sql = "insert into mno_departamento(codigoalias,codigogerencia,codigounidad,descripcion)
                                                      values('$codigoalias','$gerencia','$unidad','$descripcion')";
	//echo $sql;
        //exit;
	mysql_query($sql) or die('No se pudo guardar la información. '.mysql_error());			
	echo "<script type='text/javascript'>";
        echo "    alert('Registro Almacenado');";
        echo "</script>";  		
	
                
        }
        
?>
</form>

</body>
</html>
