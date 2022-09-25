<?php
if(isset($_GET["modulo"])){
    switch ($_GET["modulo"]){
        case 'asistencia':
            include("../vistas/administrador/registrar_asistencia.php");
            break;
        
        case 'matricula':
            include("../vistas/administrador/nueva_matricula.php");
            break;
        
        case 'contrato':
            include("../vistas/administrador/nuevo_contrato.php");
            break;

        case 'nuevocliente':
            include("../vistas/administrador/nuevo_cliente.php");
            break;
        
        case 'nuevoentrenador':
            include("../vistas/administrador/nuevo_entrenador.php");
            break;

        case 'estadocuentas':
            include("../vistas/administrador/estado_cuentas.php");
            break;

        case 'reportes':
            include("../vistas/administrador/reportes.php");
            break;

        default:
            include("../vistas/administrador/registrar_asistencia.php");
            break;
    }
    
}else{
    include("../vistas/administrador/registrar_asistencia.php");
}
?>