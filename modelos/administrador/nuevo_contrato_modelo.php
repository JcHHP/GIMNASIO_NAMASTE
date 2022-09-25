<?php
    require_once(dirname(__FILE__).'../../../modelos/conexionBD.php');

    function datos_entrenador($DNI){
        $consulta="SELECT Nombres,Apellidos FROM entrenador WHERE DNI_entrenador='$DNI'";
        $respuesta=mysqli_query(conexionBD::conexion(),$consulta);
        
        return $respuesta;
    }

    function añade_contrato($DNI,$fInicio,$fFinal,$tTrabajo,$sueldo){
        $consulta="INSERT INTO contrato VALUES(NULL,'$DNI','$fInicio','$fFinal','$tTrabajo','$sueldo')";
        mysqli_query(conexionBD::conexion(),$consulta);
    }
?>