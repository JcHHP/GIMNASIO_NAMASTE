<?php

    require_once(dirname(__FILE__). '../../../modelos/administrador/reportes_modelo.php');

    if(isset($_POST["DNI_cliente"])){
        $respuesta= buscar_cliente($_POST["DNI_cliente"]);
        
        echo mysqli_num_rows($respuesta);
    }

    if(isset($_POST["DNI"]) && isset($_POST["periodo"]) && isset($_POST["añomes"])){
        if($_POST["periodo"]=='mensual'){
        
            $coincidencias=matricula_mensual($_POST["DNI"],$_POST["añomes"]);
            
            if($coincidencias!=''){
                echo(json_encode($coincidencias));
            
            }else{
                echo "no existe";
            }
                         
        }
    }
?>