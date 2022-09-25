<?php 
    require_once('../modelos/Entrenador/pagos_entrenador.php');

    $respuesta=pagos($_SESSION['DNI-usuario']);
    $filas=mysqli_num_rows($respuesta); 

    for ($i=0; $i<$filas; $i++){
        $datos=$respuesta->fetch_array(MYSQLI_NUM);
       
        
        echo '<td>'. $datos[1] .'</td>
              <td>'. $datos[2] .'</td>
              <td>S/'.$datos[3]*$datos[1] .'.00'.'</td>
             
              <td> 
                <button"><i class="fa-solid fa-check"></i></button>
              </td>
            </tr>';
    }
   
?>