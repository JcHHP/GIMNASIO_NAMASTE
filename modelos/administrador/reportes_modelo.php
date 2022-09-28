<?php
    require_once(dirname(__FILE__).'../../../modelos/conexionBD.php');
    
    //MATRICULAS
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
        m.F_inicio BETWEEN '$año-$MES-01' AND '$año-$MES-31'";

        $respuesta=mysqli_query(conexionBD::conexion(),$consulta);
        
        return $respuesta->fetch_array(MYSQLI_ASSOC);
    }

    function matricula_anual($DNI,$AÑO){
        $resultados=[];

        $consulta="SELECT m.DNI_cliente AS DNI,CONCAT(c.Nombres,' ',c.Apellidos) AS NOMBRE, m.F_inicio AS FECHA, m.Tipo_plan AS PLAN, m.Pago AS PAGO FROM matricula m 
        INNER JOIN cliente c 
        ON m.DNI_cliente=c.DNI_cliente 
        WHERE m.DNI_cliente='$DNI' AND
        m.F_inicio BETWEEN '$AÑO-01-01' AND '$AÑO-12-31'
        ORDER BY m.F_inicio ASC";

        $respuesta=mysqli_query(conexionBD::conexion(),$consulta);

        for($i=0;$i<mysqli_num_rows($respuesta);$i++){
            $datos=$respuesta->fetch_array(MYSQLI_ASSOC);
            array_push($resultados,$datos);
        }
        
        return $resultados;
    }

    //CONTRATOS
    function buscar_entrenador($DNI){
        $consulta="SELECT * FROM datos_usuarios WHERE DNI='$DNI'";
        $respuesta=mysqli_query(conexionBD::conexion(),$consulta);
        
        return $respuesta;
    }

    function contrato_mensual($DNI,$MES){
        $año= date('Y');
        $numeroMes;

        $consulta="SELECT c.DNI_entrenador AS DNI,CONCAT(e.Nombres,' ',e.Apellidos) AS NOMBRE, c.F_inicio AS FECHA, c.tiempo_trabajo AS TIEMPO, c.sueldo AS SUELDO FROM contrato c 
        INNER JOIN entrenador e 
        ON c.DNI_entrenador=e.DNI_entrenador 
        WHERE c.DNI_entrenador='$DNI' AND
        c.F_inicio BETWEEN '$año-$MES-01' AND '$año-$MES-31'";

        $respuesta=mysqli_query(conexionBD::conexion(),$consulta);
        
        return $respuesta->fetch_array(MYSQLI_ASSOC);
    }

    function contrato_anual($DNI,$AÑO){
        $resultados=[];

        $consulta="SELECT c.DNI_entrenador AS DNI,CONCAT(e.Nombres,' ',e.Apellidos) AS NOMBRE, c.F_inicio AS FECHA, c.tiempo_trabajo AS TIEMPO, c.sueldo AS SUELDO FROM contrato c 
        INNER JOIN entrenador e 
        ON c.DNI_entrenador=e.DNI_entrenador 
        WHERE c.DNI_entrenador='$DNI' AND
        c.F_inicio BETWEEN '$AÑO-01-01' AND '$AÑO-12-31'
        ORDER BY c.F_inicio ASC";

        $respuesta=mysqli_query(conexionBD::conexion(),$consulta);

        for($i=0;$i<mysqli_num_rows($respuesta);$i++){
            $datos=$respuesta->fetch_array(MYSQLI_ASSOC);
            array_push($resultados,$datos);
        }
        
        return $resultados;
    }

    //ASISTENCIAS
    function buscar_usuario($DNI){
        $consulta="SELECT * FROM datos_usuarios WHERE DNI='$DNI'";
        $respuesta=mysqli_query(conexionBD::conexion(),$consulta);
        
        return $respuesta;
    }

    function asistencias_usuario($DNI,$AÑO,$MES){
        $resultados=[];

        $consulta="SELECT a.DNI_usuario AS DNI, CONCAT(du.nombres,' ',du.apellidos) AS NOMBRE,du.perfil AS PERFIL, a.Fecha AS FECHA, a.Hora AS HORA FROM asistencia a 
                   INNER JOIN datos_usuarios du 
                   ON a.DNI_usuario=du.DNI 
                   WHERE a.DNI_usuario='$DNI' AND 
                   a.Fecha BETWEEN '$AÑO-$MES-01' AND '$AÑO-$MES-31'";

        $respuesta=mysqli_query(conexionBD::conexion(),$consulta);

        for($i=0;$i<mysqli_num_rows($respuesta);$i++){
            $datos=$respuesta->fetch_array(MYSQLI_ASSOC);
            array_push($resultados,$datos);
        }
        
        return $resultados;
    }

    //INGRESOS
    function ingresos_mensual($MES,$AÑO){
        $resultados=[];

        $consulta="SELECT m.F_inicio AS FECHA,CONCAT(c.Nombres,' ',c.Apellidos) AS NOMBRES, m.Pago AS PAGO FROM matricula m 
                   INNER JOIN cliente c
                   ON m.DNI_cliente=c.DNI_cliente
                   WHERE m.F_inicio BETWEEN '$AÑO-$MES-01' AND '$AÑO-$MES-31'
                   ORDER BY m.F_inicio";

        $respuesta=mysqli_query(conexionBD::conexion(),$consulta);
        
        for($i=0;$i<mysqli_num_rows($respuesta);$i++){
            $datos=$respuesta->fetch_array(MYSQLI_ASSOC);
            array_push($resultados,$datos);
        }
        
        return $resultados;
    }

    function ingresos_anual($AÑO){
        $resultados=[];

        $consulta="SELECT m.F_inicio AS FECHA,CONCAT(c.Nombres,' ',c.Apellidos) AS NOMBRES, m.Pago AS PAGO FROM matricula m 
                   INNER JOIN cliente c
                   ON m.DNI_cliente=c.DNI_cliente
                   WHERE m.F_inicio BETWEEN '$AÑO-01-01' AND '$AÑO-12-31'
                   ORDER BY m.F_inicio";

        $respuesta=mysqli_query(conexionBD::conexion(),$consulta);
        
        for($i=0;$i<mysqli_num_rows($respuesta);$i++){
            $datos=$respuesta->fetch_array(MYSQLI_ASSOC);
            array_push($resultados,$datos);
        }
        
        return $resultados;
    }

    //EGRESOS
    function egresos_mensual($MES,$AÑO){
        $resultados=[];

        $consulta="SELECT c.F_inicio AS FECHA,CONCAT(e.Nombres,' ',e.Apellidos) AS NOMBRES, c.sueldo AS PAGO FROM contrato c
                   INNER JOIN entrenador e
                   ON c.DNI_entrenador=e.DNI_entrenador
                   WHERE c.F_inicio BETWEEN '$AÑO-$MES-01' AND '$AÑO-$MES-31'
                   ORDER BY c.F_inicio";

        $respuesta=mysqli_query(conexionBD::conexion(),$consulta);
        
        for($i=0;$i<mysqli_num_rows($respuesta);$i++){
            $datos=$respuesta->fetch_array(MYSQLI_ASSOC);
            array_push($resultados,$datos);
        }
        
        return $resultados;
    }

    function egresos_anual($AÑO){
        $resultados=[];

        $consulta="SELECT c.F_inicio AS FECHA,CONCAT(e.Nombres,' ',e.Apellidos) AS NOMBRES, c.sueldo AS PAGO FROM contrato c
                   INNER JOIN entrenador e
                   ON c.DNI_entrenador=e.DNI_entrenador
                   WHERE c.F_inicio BETWEEN '$AÑO-01-01' AND '$AÑO-12-31'
                   ORDER BY c.F_inicio";

        $respuesta=mysqli_query(conexionBD::conexion(),$consulta);
        
        for($i=0;$i<mysqli_num_rows($respuesta);$i++){
            $datos=$respuesta->fetch_array(MYSQLI_ASSOC);
            array_push($resultados,$datos);
        }
        
        return $resultados;
    }
?>