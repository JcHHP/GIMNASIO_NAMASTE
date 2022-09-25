<?php
if(isset($_GET["modulo"])){
    switch ($_GET["modulo"]){
        case 'miavance':
            include("../vistas/cliente/mi_avance.php");
            break;
        
        case 'mientrenador':
            include("../vistas/cliente/mi_entrenador.php");
            break;
        
        case 'mispagos':
            include("../vistas/cliente/pagos_cliente.php");
            break;
        
        default:
            include("../vistas/cliente/mi_avance.php");
            break;
    }
    
}else{
    include("../vistas/cliente/mi_avance.php");
}
?>