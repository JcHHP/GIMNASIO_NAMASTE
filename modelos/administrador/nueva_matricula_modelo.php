<?php
    require_once(dirname(__FILE__).'../../../modelos/conexionBD.php');

    function datos_cliente($DNI){
        $consulta="SELECT Nombres,Apellidos FROM cliente WHERE DNI_cliente='$DNI'";
        $respuesta=mysqli_query(conexionBD::conexion(),$consulta);
        
        return $respuesta;
    }

    function añade_matricula($DNI,$fInicio,$fFinal,$plan,$sesiones,$monto){
        $consulta="INSERT INTO matricula VALUES(NULL,'$DNI','$fInicio','$fFinal','$plan','$sesiones','$monto')";
        mysqli_query(conexionBD::conexion(),$consulta);
    }
?>