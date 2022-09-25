<?php
    require_once(dirname(__FILE__).'../../../modelos/conexionBD.php');
    
    function filtro_DNI($DNI){
        $consulta="SELECT * FROM datos_usuarios WHERE DNI like '%$DNI%' AND Estado='Activo'";
        $respuesta=mysqli_query(conexionBD::conexion(),$consulta);
        
        return $respuesta;
    }

    function mostrar_usuarios(){
        $consulta="SELECT * FROM datos_usuarios WHERE Estado='Activo' ORDER BY perfil DESC";
        $respuesta=mysqli_query(conexionBD::conexion(),$consulta);
        
        return $respuesta;
    }

    function agrega_asistencia($DNI,$fecha,$hora){
        $consulta="INSERT INTO asistencia VALUES ('NULL','$DNI','$fecha','$hora')";
        $respuesta=mysqli_query(conexionBD::conexion(),$consulta);
        
        return $respuesta;
    }
?>