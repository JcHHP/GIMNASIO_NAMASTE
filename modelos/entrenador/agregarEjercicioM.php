<?php
    require_once('../modelos/conexionBD.php');

    function insertarEjerM($datosC){
        $Descripcion= $datosC['Descripcion'];
        $img= $datosC['imagenBinario'];
        $binario= mysqli_escape_string(conexionBD::conexion(),$img) ; // limpiar binario     
        $NombreEjerc= $datosC['NombreEjer'];
        $nivel= $datosC['Nivel'];
        $consulta="INSERT INTO `ejercicio` VALUES(null,'$NombreEjerc','$Descripcion','$binario','$nivel')";
       
        $respuesta=mysqli_query(conexionBD::conexion(),$consulta);
       
        return $respuesta;
    }

    function mostrarEjercicioM(){
       
        $consulta="SELECT Imagen,Nombre_ejercicio, Nivel from  `ejercicio`";
       
        $respuesta=mysqli_query(conexionBD::conexion(),$consulta);
       
        return $respuesta;
    }
    
?>