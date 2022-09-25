<?php
    require_once(dirname(__FILE__). '../../../modelos/administrador/nueva_matricula_modelo.php');

    if(isset($_POST['numero-DNI'])){
        $DNI=$_POST['numero-DNI'];

        $respuesta=datos_cliente($DNI);
        $coincidencias=mysqli_num_rows($respuesta);

        if($coincidencias==1){
            $datos=$respuesta->fetch_array(MYSQLI_NUM);
            $nombre=$datos[0];
            $apellidos=$datos[1];

            $datos_cliente=array("nombre"=>$nombre,"apellido"=>$apellidos);

            echo(json_encode($datos_cliente));
        }
    }

    if(isset($_POST['numero-DNI']) && isset($_POST['fecha-inicio']) && isset($_POST['fecha-final']) 
       && isset($_POST['tipo-plan']) && isset($_POST['sesiones']) && isset($_POST['monto-total'])){

        $DNI=$_POST['numero-DNI'];
        $fInicio=$_POST['fecha-inicio'];
        $fFinal=$_POST['fecha-final'];
        $plan=$_POST['tipo-plan'];
        $sesiones=$_POST['sesiones'];
        $monto=$_POST['monto-total'];

        añade_matricula($DNI,$fInicio,$fFinal,$plan,$sesiones,$monto);
       }
?>