<?php
    require_once('../modelos/conexionBD.php');

    function cantidad_pagos($DNI){
        $consulta="SELECT * FROM matricula WHERE DNI_cliente='$DNI'";
        $respuesta=mysqli_query(conexionBD::conexion(),$consulta);
        
        return $respuesta;
    }
?>