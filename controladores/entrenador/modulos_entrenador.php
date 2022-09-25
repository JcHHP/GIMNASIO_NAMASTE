<?php
if(isset($_GET["modulo"])){
    switch ($_GET["modulo"]){
        case 'alumnos':
            include("../vistas/entrenador/alumnos.php");
            break;

        case 'mispagos':
            include("../vistas/entrenador/mis_pagos.php");
            break;
        
         case 'rutinas':
            include("../vistas/entrenador/mis_pagos.php");
            break;

        case 'agregarEjercicios':
                include("../vistas/entrenador/agregarEjercicios.php");
                break;     
        
        default:
            include("../vistas/entrenador/alumnos.php");
            break;
    }
    
}else{
    include("../vistas/entrenador/alumnos.php");
}
?>