<?php
    
    function crear_sesion($DNI,$CONTRASEÑA,$PERFIL){
        $_SESSION['DNI-usuario']=$DNI;
        $_SESSION['password-usuario']=$CONTRASEÑA;
        $_SESSION['perfil-usuario']=$PERFIL;
    }

    function existe_sesion($PERFIL){
        switch($PERFIL){
                case 'usuario':
                    header('location:vistas/usuario.php');
                    break;
    
                case 'administrador':
                    header('location:vistas/administrador.php');
                    break;
    
                case 'entrenador':
                    header('location:vistas/entrenador.php');
                    break;
        }
    }

?>