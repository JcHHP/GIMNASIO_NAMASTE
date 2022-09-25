<?php
    require_once("../modelos/nombre_usuario.php");

    switch($_SESSION['perfil-usuario']){
        case 'usuario':
            $respuesta=nombre_cliente($_SESSION['DNI-usuario']);
            break;

        case 'administrador':
            $respuesta=nombre_administrador($_SESSION['DNI-usuario']);
            break;

        case 'entrenador':
            $respuesta=nombre_entrenador($_SESSION['DNI-usuario']);
            break;
    }

    $datos=$respuesta->fetch_array(MYSQLI_NUM);

    $nombre_completo=$datos[0] ." ". $datos[1];
    echo "<span>".$nombre_completo."</span>";
?>