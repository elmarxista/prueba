<?php
error_reporting(E_ALL ^ E_NOTICE);
require_once ('excel_reader2.php');

include_once('../clases/funciones.php');
include_once('../db.php');

$data = new Spreadsheet_Excel_Reader();
$data->setOutputEncoding('CP1251');
$data->read('a.xls');
$asd = 0;

function cambiar_mes($mes){

    if($mes == 'Aug'){
        return  '08';
    }else if($mes == 'May'){
        return  '05';
    }else if($mes == 'Oct'){
        return '10';
    }else if($mes == 'Jun'){
        return '06';

    }else if($mes == 'Dec'){
        return '12';

    }else if($mes == 'Feb'){
        return '02';

    }else if($mes == 'Jul'){
        return '07';
    }else if($mes == 'Apr'){
        return '04';
    }else if($mes == 'Jan'){
        return '01';
    }else if($mes == 'Sep'){
        return '09';
    }else if($mes == 'Mar'){
        return  '03';
    }else if($mes == 'Nov'){
        return '11';
    }
    else{
        return $mes;
    }



}

function tranform_anhio ($anhio){


    if($anhio >= 0 && $anhio <= 30){
        return '20' . $anhio;
    }else{
        return '19'. $anhio;
    }
}

//echo("<table>");
//
//
//for ($i = 1; $i <= $data->sheets[0]['numRows']; $i++) {
//    echo("<tr>");
//    for ($j = 1; $j <= $data->sheets[0]['numCols']; $j++) {
//        echo("<td>".$data->sheets[0]['cells'][$i][$j] ."</td>");
//    }
//    echo("</tr>");
//
//}
//echo("</table>");

//$sql = "insert into mrh_empleado(cedula,ficha,primernombre,segundonombre,primerapellido,segundoapellido,
//					fechanacimiento,telefono,celular,estadocivil,becado,sexo,fechaingreso,fechaegreso,
//						codigocargo,estatus,condicion,codigoperioricidad,direccionhabitacion,codigo_departamento,vehiculo,nacionalidad,tipo_trabajador,foto)
//                                                      values('$cedula','$ficha','$primernombre','$segundonombre','$primerapellido','$segundoapellido','$fechanacimiento',
//							'$telefono','$celular','$estadocivil','$becado','$sexo','$fechaingreso','$fechaegreso','$codigocargo','$estatus','$condicion',
//								'$codigoperioricidad','$direccionhabitacion','$departamento','$vehiculo','$nacionalidad','$tipo_trabajador','$imagen')";


//$sql = "insert into mrh_empleado(
//					,,,
//						,,,,,,,,,foto)
//                                                      values('$cedula','$ficha','$primernombre','$segundonombre','$primerapellido','$segundoapellido','$fechanacimiento',
//							'$telefono','$celular','$estadocivil','$becado','$sexo','$fechaingreso','$fechaegreso','$codigocargo','$estatus','$condicion',
//								'$codigoperioricidad','$direccionhabitacion','$departamento','$vehiculo','$nacionalidad','$tipo_trabajador','$imagen')";


for ($i = 2; $i <= $data->sheets[0]['numRows']; $i++) {


    $sql_pre = '';

    $sql_post = "";



//    for ($j = 0; $j < $data->sheets[0]['numCols']; $j++) {
//
////        if($j == 0){
////
////            $sql_pre .= 'ficha';
////           echo( "hola" );
////
////
////
////        }
//
//    }




    $cedula = $data->sheets[0]['cells'][$i][2];
    $ficha = $data->sheets[0]['cells'][$i][1];

    $nombres = explode(" ",$data->sheets[0]['cells'][$i][3]);

    $primernombre = cadena_estetica($nombres[0]);
    $segundonombre = cadena_estetica($nombres[1]);

    $apellidos =  explode(" ",$data->sheets[0]['cells'][$i][4]);

    $primerapellido = cadena_estetica($apellidos[0]);
    $segundoapellido = cadena_estetica($apellidos[1]);


    $telefono = $data->sheets[0]['cells'][$i][6];


    $celular = '';


    $estadocivil = '';

    if($data->sheets[0]['cells'][$i][11] == '1'){

        $estadocivil = 'C';
    }else{
        $estadocivil = 'S';
    }


    $becado = '0';

    $sexo = '';

    if($data->sheets[0]['cells'][$i][10] == '1'){

        $sexo = 'M';
    }else{
        $sexo = 'F';
    }


   $fecha_nacimineto_excel = explode("-",$data->sheets[0]['cells'][$i][7]);

    $dia = $fecha_nacimineto_excel[0];

    $mes = cambiar_mes($fecha_nacimineto_excel[1]);

    $anhio = tranform_anhio($fecha_nacimineto_excel[2]);

    $fecha_nacimineto = $anhio . '-' . $mes . '-' . $dia;



    $fechaingreso = '';
    $fechaingreso_excel = explode("-",$data->sheets[0]['cells'][$i][13]);

    $dia = $fecha_nacimineto_excel[0];

    $mes = cambiar_mes($fecha_nacimineto_excel[1]);

    $anhio = tranform_anhio($fecha_nacimineto_excel[2]);

    $fechaingreso = $anhio . '-' . $mes . '-' . $dia;



//    = explode("-",$data->sheets[0]['cells'][$i][23]);
    $fechaegreso = '';



    if($data->sheets[0]['cells'][$i][22] != "  -   -"){
        $fechaegreso_excel  = explode("-",$data->sheets[0]['cells'][$i][22]);

        $dia = $fechaegreso_excel[0];

        $mes = cambiar_mes($fechaegreso_excel[1]);

        $anhio = tranform_anhio($fechaegreso_excel[2]);

        $fechaegreso = $anhio . '-' . $mes . '-' . $dia;

    }


    $codigocargo = cadena_estetica($data->sheets[0]['cells'][$i][23]);

    $sql = "SELECT codigo FROM mrh_cargo WHERE  descripcion = '$codigocargo'";


    $result = mysql_query($sql);

    $test = mysql_fetch_array($result);

    $codigocargo = $test['codigo'];
    $asd++;

    $estatus = '1';
    $condicion = 'N';
    $codigoperioricidad = '0';

    $direccionhabitacion = utf8_encode($data->sheets[0]['cells'][$i][5]);

    $codigo_departamento = '0';

    $vehiculo = 'no';

    $nacionalidad = $data->sheets[0]['cells'][$i][9];

    if($nacionalidad == '1'){
        $nacionalidad = 'V';
    }else{
        $nacionalidad = 'E';
    }

    $tipo_trabajador = $data->sheets[0]['cells'][$i][19];


    $imagen = '';
    $departamento = '';


    $sql = "insert into mrh_empleado(cedula,ficha,primernombre,segundonombre,primerapellido,segundoapellido,
					fechanacimiento,telefono,celular,estadocivil,becado,sexo,fechaingreso,fechaegreso,
						codigocargo,estatus,condicion,codigoperioricidad,direccionhabitacion,codigo_departamento,vehiculo,nacionalidad,tipo_trabajador,foto)
                                                      values('$cedula','$ficha','$primernombre','$segundonombre','$primerapellido','$segundoapellido','$fecha_nacimineto',
							'$telefono','$celular','$estadocivil','$becado','$sexo','$fechaingreso','$fechaegreso','$codigocargo','$estatus','$condicion',
								'$codigoperioricidad','$direccionhabitacion','$departamento','$vehiculo','$nacionalidad','$tipo_trabajador','$imagen')";


    mysql_query($sql) or die('No se pudo guardar la información del trabajador. '.mysql_error());




    $sql  = "SELECT codigo FROM  mrh_empleado WHERE cedula = '$cedula'";



    $result = mysql_query($sql);

    $test = mysql_fetch_array($result);

    $codigoempleado = $test['codigo'];


    $hijos = $data->sheets[0]['cells'][$i][12];



    for($z=0;$z < $hijos ; $z++){
        $sql = "insert into mrh_carga(cedulaempleado,cedula,primernombre,segundonombre,primerapellido,
                            segundoapellido,fechanacimiento,parentesco,estudios)
                values ('$codigoempleado','$cedula',' ',' ',' ',
                        ' ',' ','H',' ')";

        mysql_query($sql) or die('Error agregando hijos :$. '.mysql_error());
    }

    //echo($asd . "->" . $hijos . "</br>" );


}
