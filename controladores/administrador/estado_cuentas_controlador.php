<?php
    require_once(dirname(__FILE__). '../../../modelos/administrador/estado_cuentas_modelo.php');

    if(isset($_POST["cargar_montos"])){
        $obtenerMontoMes=montos_cuadros();

        echo(json_encode($obtenerMontoMes));
    }
    
    if(isset($_POST["documento_cargado"])){
        $obtenerMontos=montos();

        echo(json_encode($obtenerMontos));
    }
?>