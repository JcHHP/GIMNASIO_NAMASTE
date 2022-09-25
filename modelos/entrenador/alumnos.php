<?php
    require_once('../modelos/conexionBD.php');

    function alumnos($DNI){
        $consulta="SELECT * FROM alumnos";
        $respuesta=mysqli_query(conexionBD::conexion(),$consulta);
        
        return $respuesta;
    }
    
?>