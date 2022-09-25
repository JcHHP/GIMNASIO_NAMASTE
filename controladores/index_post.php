<?php
    include(dirname(__FILE__).'../../controladores/control_sesiones.php');

    function post_recibido($DNI,$CONTRASEÑA,$PERFIL){
        switch($PERFIL){
            case 'usuario':
                crear_sesion($DNI,$CONTRASEÑA,'usuario');
                echo "vistas/usuario.php";

                break;

            case 'administrador':
                crear_sesion($DNI,$CONTRASEÑA,'administrador');
                echo "vistas/administrador.php";

                break;

            case 'entrenador':
                crear_sesion($DNI,$CONTRASEÑA,'entrenador');

                echo "vistas/entrenador.php";
                break;
            
            default:

                echo "index.php";
                break;
        }
    }
?>