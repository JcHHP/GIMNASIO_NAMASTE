<?php
    require_once(dirname(__FILE__).'../../../modelos/conexionBD.php');
    
    function buscar_cliente($DNI){
        $consulta="SELECT * FROM datos_usuarios WHERE DNI='$DNI'";
        $respuesta=mysqli_query(conexionBD::conexion(),$consulta);
        
        return $respuesta;
    }

    function matricula_mensual($DNI,$MES){
        $año= date('Y');
        $numeroMes;

        $consulta="SELECT m.DNI_cliente AS DNI,CONCAT(c.Nombres,' ',c.Apellidos) AS NOMBRE, m.F_inicio AS FECHA, m.Tipo_plan AS PLAN, m.Pago AS PAGO FROM matricula m 
        INNER JOIN cliente c 
        ON m.DNI_cliente=c.DNI_cliente 
        WHERE m.DNI_cliente='$DNI' AND
        m.F_inicio BETWEEN '$año-$MES-01' AND '$año-$MES-31';";

        $respuesta=mysqli_query(conexionBD::conexion(),$consulta);
        
        return $respuesta->fetch_array(MYSQLI_ASSOC);
    }
?>