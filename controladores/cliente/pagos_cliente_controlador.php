<?php 
    require_once('../modelos/cliente/pagos_cliente_modelo.php');

    $respuesta=cantidad_pagos($_SESSION['DNI-usuario']);
    $filas=mysqli_num_rows($respuesta); 

    for ($i=0; $i<$filas; $i++){
        $datos=$respuesta->fetch_array(MYSQLI_NUM);

        $meses=['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Setiembre','Octubre','Noviembre','Diciembre'];
        $mes=(int)(substr($datos[2],5,2));

        if($datos[4]=='DIARIO'){
            $cantidad_sesiones=30;
        }else{
            $cantidad_sesiones=15;
        }
        
        echo '<td>'. $meses[$mes-1] .'</td>
              <td>'. $datos[2] .'</td>
              <td>S/'. $datos[6] .'.00</td>
              <td>'. $datos[4] .'</td>
              <td>'. $cantidad_sesiones .'</td>
              <td> <button class="boton-archivo"><i class="fa-solid fa-file"></i></button></td>
            </tr>';
    }
?>