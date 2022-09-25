<?php
    require_once(dirname(__FILE__).'../../../modelos/conexionBD.php');

    function montos_cuadros(){
        $montosMes=[];

        $diasMes = cal_days_in_month(CAL_GREGORIAN, date('m'), date('Y'));
        $año=date('Y');
        $mes=date('m');
    
        $fechaInicio= $año. "-" .$mes. "-01";
        $fechaFinal= $año. "-" .$mes. "-". $diasMes;

        $consulta="SELECT (
            SELECT ingresos.ingreso AS iasdasd FROM (SELECT SUM(Pago)  AS ingreso FROM matricula WHERE F_inicio BETWEEN '$fechaInicio' AND '$fechaFinal') ingresos) AS Ingresos, 
            (SELECT egresos.egreso AS iasdasd FROM (SELECT SUM(sueldo)  AS egreso FROM contrato WHERE F_inicio BETWEEN '$fechaInicio' AND '$fechaFinal') egresos) AS Egresos";

        $respuesta=mysqli_query(conexionBD::conexion(),$consulta);
    
        array_push($montosMes,$respuesta->fetch_array(MYSQLI_ASSOC),$mes,$año);

        return $montosMes;
    }

    function montos(){
        $montosMeses=[];

        for($i=0;$i<12;$i++){
            $diasMes = cal_days_in_month(CAL_GREGORIAN, $i+1, date('Y'));
            $año=date('Y');
    
            $fechaInicio= $año. "-" .($i+1). "-01";
            $fechaFinal= $año. "-" .($i+1). "-". $diasMes;
    
            $consulta="SELECT (
                SELECT ingresos.ingreso AS iasdasd FROM (SELECT SUM(Pago)  AS ingreso FROM matricula WHERE F_inicio BETWEEN '$fechaInicio' AND '$fechaFinal') ingresos) AS Ingresos, 
                (SELECT egresos.egreso AS iasdasd FROM (SELECT SUM(sueldo)  AS egreso FROM contrato WHERE F_inicio BETWEEN '$fechaInicio' AND '$fechaFinal') egresos) AS Egresos";
    
            $respuesta=mysqli_query(conexionBD::conexion(),$consulta);
        
            array_push($montosMeses,$respuesta->fetch_array(MYSQLI_ASSOC));
        }

        return $montosMeses;
    }
 
?>