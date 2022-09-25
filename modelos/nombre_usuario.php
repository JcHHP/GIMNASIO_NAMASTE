<?php
    require_once('../modelos/conexionBD.php');

    function nombre_administrador($DNI){
        $consulta="SELECT Nombres,Apellidos FROM administrador WHERE DNI_administrador='$DNI'";
        $respuesta=mysqli_query(conexionBD::conexion(),$consulta);
        
        return $respuesta;
    }

    function nombre_cliente($DNI){
        $consulta="SELECT Nombres,Apellidos FROM cliente WHERE DNI_cliente='$DNI'";
        $respuesta=mysqli_query(conexionBD::conexion(),$consulta);
        
        return $respuesta;
    }

    function nombre_entrenador($DNI){
        $consulta="SELECT Nombres,Apellidos FROM entrenador WHERE DNI_entrenador='$DNI'";
        $respuesta=mysqli_query(conexionBD::conexion(),$consulta);
        
        return $respuesta;
    }
?>