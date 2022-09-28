<?php

    require_once(dirname(__FILE__). '../../../modelos/administrador/reportes_modelo.php');
    
    //MATRICULAS
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
                         
        }else{

            $coincidencias=matricula_anual($_POST["DNI"],$_POST["añomes"]);

            if(sizeof($coincidencias)!=0){
                echo(json_encode($coincidencias));
                            
            }else{
                echo "no existe";
            }
        }
    }

    //CONTRATOS
    if(isset($_POST["DNI_entrenador_busqueda"])){
        $respuesta= buscar_cliente($_POST["DNI_entrenador_busqueda"]);
        
        echo mysqli_num_rows($respuesta);
    }

    if(isset($_POST["DNI_entrenador"]) && isset($_POST["periodo"]) && isset($_POST["añomes"])){
        if($_POST["periodo"]=='mensual'){
        
            $coincidencias=contrato_mensual($_POST["DNI_entrenador"],$_POST["añomes"]);
            
            if($coincidencias!=''){
                echo(json_encode($coincidencias));
            
            }else{
                echo "no existe";
            }
                         
        }else{

            $coincidencias=contrato_anual($_POST["DNI_entrenador"],$_POST["añomes"]);

            if(sizeof($coincidencias)!=0){
                echo(json_encode($coincidencias));
                            
            }else{
                echo "no existe";
            }
        }
    }

    //ASISTENCIAS
    if(isset($_POST["DNI_usuario_busqueda"])){
        $respuesta= buscar_usuario($_POST["DNI_usuario_busqueda"]);
        
        echo mysqli_num_rows($respuesta);
    }

    if(isset($_POST["DNI_usuario"]) && isset($_POST["año"]) && isset($_POST["mes"])){
        $coincidencias=asistencias_usuario($_POST["DNI_usuario"],$_POST["año"],$_POST["mes"]);

        if(sizeof($coincidencias)!=0){
            echo(json_encode($coincidencias));
                        
        }else{
            echo "no existe";
        }
    }

    //INGRESOS
    if(isset($_POST["mes_ingreso"]) && isset($_POST["año_ingreso"])){
        $coincidencias=ingresos_mensual($_POST["mes_ingreso"],$_POST["año_ingreso"]);

        if(sizeof($coincidencias)!=0){
            echo(json_encode($coincidencias));
                        
        }else{
            echo "no existe";
        }
    }

    if(isset($_POST["año_ingresos"])){
        $coincidencias=ingresos_anual($_POST["año_ingresos"]);

        if(sizeof($coincidencias)!=0){
            echo(json_encode($coincidencias));
                        
        }else{
            echo "no existe";
        }
    }

    //EGRESOS
    if(isset($_POST["mes_egreso"]) && isset($_POST["año_egreso"])){
        $coincidencias=egresos_mensual($_POST["mes_egreso"],$_POST["año_egreso"]);

        if(sizeof($coincidencias)!=0){
            echo(json_encode($coincidencias));
                        
        }else{
            echo "no existe";
        }
    }

    if(isset($_POST["año_egresos"])){
        $coincidencias=egresos_anual($_POST["año_egresos"]);

        if(sizeof($coincidencias)!=0){
            echo(json_encode($coincidencias));
                        
        }else{
            echo "no existe";
        }
    }
?>