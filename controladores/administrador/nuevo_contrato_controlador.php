<?php
    require_once(dirname(__FILE__). '../../../modelos/administrador/nuevo_contrato_modelo.php');

    if(isset($_POST['numero-DNI'])){
        $DNI=$_POST['numero-DNI'];

        $respuesta=datos_entrenador($DNI);
        $coincidencias=mysqli_num_rows($respuesta);

        if($coincidencias==1){
            $datos=$respuesta->fetch_array(MYSQLI_NUM);
            $nombre=$datos[0];
            $apellidos=$datos[1];

            $datos_entrenador=array("nombre"=>$nombre,"apellido"=>$apellidos);

            echo(json_encode($datos_entrenador));
        }
    }

    if(isset($_POST['numero-DNI']) && isset($_POST['fecha-inicio']) && isset($_POST['fecha-final']) 
       && isset($_POST['tiempo-trabajo']) && isset($_POST['sueldo'])){

        $DNI=$_POST['numero-DNI'];
        $fInicio=$_POST['fecha-inicio'];
        $fFinal=$_POST['fecha-final'];
        $tTrabajo=$_POST['tiempo-trabajo'];
        $sueldo=$_POST['sueldo'];

        añade_contrato($DNI,$fInicio,$fFinal,$tTrabajo,$sueldo);
       }
?>