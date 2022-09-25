<?php
    require_once(dirname(__FILE__). '../../../modelos/administrador/nuevo_entrenador_modelo.php');

    if(isset($_POST['numero-DNI']) && isset($_POST['nombres']) && isset($_POST['apellidos']) && isset($_POST['sexo']) &&
       isset($_POST['fecha-nacimiento']) && isset($_POST['nivel-experiencia']) && isset($_POST['telefono']) && isset($_POST['correo-electronico'])){

        $DNI=$_POST['numero-DNI'];
        $contraseña='namastegym';
        $contraseñaHasheada=password_hash($contraseña,PASSWORD_DEFAULT);

        $nombres=ucwords(strtolower($_POST['nombres']));
        $apellidos=ucwords(strtolower($_POST['apellidos']));
        $sexo=$_POST['sexo'];
        $fNacimiento=$_POST['fecha-nacimiento'];
        $experiencia=$_POST['nivel-experiencia'];
        $telefono=$_POST['telefono'];
        $correo=$_POST['correo-electronico'];

        $duplicados=verifica_duplicidad($DNI);
        $cantDuplicados=mysqli_num_rows($duplicados);

        $telefonoDuplicado=verifica_telefonos($telefono);
        $cantTelefonoDuplicado=mysqli_num_rows($telefonoDuplicado);

        $correoDuplicado=verifica_correos($correo);
        $cantCorreoDuplicado=mysqli_num_rows($correoDuplicado);

        if($cantDuplicados==0){

            if($cantTelefonoDuplicado>0){
                echo "Telefono duplicado";
            }else{
                if($cantCorreoDuplicado>0){
                    echo "Correo duplicado";
                }else{

                    agregar_entrenador($DNI,$contraseñaHasheada,$nombres,$apellidos,$sexo,$fNacimiento,$experiencia,$telefono,$correo);
                    echo "Correo sin duplicar";
                }
            }
                        
        }else{

            echo "Con duplicados";
        }       
    }
?>