<?php
    require_once(dirname(__FILE__).'../../../modelos/conexionBD.php');

    function verifica_duplicidad($DNI){
        $consulta="SELECT * FROM perfiles_usuario WHERE DNI=$DNI";
        $respuesta=mysqli_query(conexionBD::conexion(),$consulta);

        return $respuesta;
    }

    function verifica_telefonos($telefono){
        $consulta="SELECT * FROM datos_usuarios WHERE telefono='$telefono'";
        $respuesta=mysqli_query(conexionBD::conexion(),$consulta);

        return $respuesta;
    }

    function verifica_correos($correo){
        $consulta="SELECT * FROM datos_usuarios WHERE correo='$correo'";
        $respuesta=mysqli_query(conexionBD::conexion(),$consulta);

        return $respuesta;
    }

    function agregar_cliente($DNI,$contraseña,$nombres,$apellidos,$sexo,$fnacimiento,$nivel,$telefono,$correo){
        $consulta="INSERT INTO cliente VALUES ('$DNI','$contraseña','$nombres','$apellidos','$sexo','$fnacimiento','$nivel','$telefono','$correo','Activo')";
        $respuesta=mysqli_query(conexionBD::conexion(),$consulta);

    }
?>