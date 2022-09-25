<?php
    class conexionBD{
        static public function conexion(){
            $servidor="localhost";
            $baseDeDatos="namaste";
            $usuario="root";
            $contrasenia="";

            $conexion=new mysqli($servidor,$usuario,$contrasenia,$baseDeDatos);

            return $conexion;
        }
    }
?>