<?php
    require_once(dirname(__FILE__).'../../modelos/conexionBD.php');

    function validar_usuario($DNI){
        $consulta="select perfil,password from perfiles_usuario where DNI='$DNI'";
        $respuesta=mysqli_query(conexionBD::conexion(),$consulta);

        return $respuesta->fetch_array(MYSQLI_ASSOC);
    }
?>