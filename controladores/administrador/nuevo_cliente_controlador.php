<?php
    require_once(dirname(__FILE__). '../../../modelos/administrador/nuevo_cliente_modelo.php');

    if(isset($_POST['numero-DNI']) && isset($_POST['nombres']) && isset($_POST['apellidos']) && isset($_POST['sexo']) &&
       isset($_POST['fecha-nacimiento']) && isset($_POST['nivel-entrenamiento']) && isset($_POST['telefono']) && isset($_POST['correo-electronico'])){
    
        $contraseña='namastegym';
        $contraseñaHasheada=password_hash($contraseña,PASSWORD_DEFAULT);

        $nombres=ucwords(strtolower($_POST['nombres']));
        $apellidos=ucwords(strtolower($_POST['apellidos']));
        $sexo=$_POST['sexo'];
        $fNacimiento=$_POST['fecha-nacimiento'];
        $nivel=$_POST['nivel-entrenamiento'];
        $DNI=$_POST['numero-DNI'];
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

                    agregar_cliente($DNI,$contraseñaHasheada,$nombres,$apellidos,$sexo,$fNacimiento,$nivel,$telefono,$correo);
                    echo "Correo sin duplicar";
                }
            }
        }else{

            echo "Con duplicados";
        }
    }
?>