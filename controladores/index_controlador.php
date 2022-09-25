<?php
    session_start();

    require_once(dirname(__FILE__).'../../modelos/validar_usuario.php');
    require_once(dirname(__FILE__).'../../controladores/index_post.php');

    if(isset($_SESSION['DNI-usuario']) && isset($_SESSION['password-usuario']) && isset($_SESSION['perfil-usuario'])){
        existe_sesion($_SESSION['perfil-usuario']);
    }

    if(isset($_POST['input-DNI']) && isset($_POST['input-contraseña'])){

        $DNI=$_POST['input-DNI'];
        $contraseña= $_POST['input-contraseña'];

        $respuesta=validar_usuario($DNI);

        if($respuesta){

            $perfil=$respuesta['perfil'];
            $contraseñaHasheada=$respuesta['password'];

            $validacion= password_verify($contraseña,$contraseñaHasheada);

            if($validacion){

                post_recibido($DNI,$contraseñaHasheada,$perfil);
            }else{
                echo "Contraseña incorrecta";
            }

        }else{
            echo "Usuario no registrado";
        }
    }

?>