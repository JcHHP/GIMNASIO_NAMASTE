<?php
    require_once('../modelos/conexionBD.php');

    function pagos($DNI){
        $consulta="SELECT * FROM detalles_pagoentrenador WHERE DNI_entrenador='$DNI'";
        $respuesta=mysqli_query(conexionBD::conexion(),$consulta);
        
        return $respuesta;
    }


?>