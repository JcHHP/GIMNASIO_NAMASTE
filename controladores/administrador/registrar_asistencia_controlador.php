<?php 
  require_once(dirname(__FILE__). '../../../modelos/administrador/registrar_asistencia_modelo.php');

  if(isset($_POST["DNI-asistencia"]) && isset($_POST["fecha-actual"]) && isset($_POST["hora-actual"])){
    $DNI= $_POST["DNI-asistencia"];
    $fecha= $_POST["fecha-actual"];
    $hora= $_POST["hora-actual"];

    agrega_asistencia($DNI,$fecha,$hora);

  }else if(isset($_POST["numero-DNI"])){
    $numeroDNI=$_POST["numero-DNI"];
    
    $coincidencias=filtro_DNI($numeroDNI);
    $filas=mysqli_num_rows($coincidencias);

    echo '<thead>
            <th>DNI</th>
            <th>NOMBRES Y APELLIDOS</th>
            <th>PERFIL</th>
            <th>ASISTENCIA</th>
          </thead>';
    
    for ($i=0; $i<$filas; $i++){
      $datos=$coincidencias->fetch_array(MYSQLI_NUM);
      
      echo  '<td>'. $datos[0] .'</td>
            <td>'. $datos[1] ." ". $datos[2] .'</td>
            <td>'. ucfirst($datos[3]) .'</td>
            <td> 
              <button class="boton-asistencia" onclick="registraAsistencia('.$datos[0].')"><i class="fa-solid fa-check"></i></button>
            </td>
          </tr>';
    }

  }else if(isset($_POST["valor-cero"])){
    $respuesta=mostrar_usuarios();
    $filas=mysqli_num_rows($respuesta); 

    echo '<thead>
            <th>DNI</th>
            <th>NOMBRES Y APELLIDOS</th>
            <th>PERFIL</th>
            <th>ASISTENCIA</th>
          </thead>';

    for ($i=0; $i<$filas; $i++){
        $datos=$respuesta->fetch_array(MYSQLI_NUM);
        
        echo  '<td>'. $datos[0] .'</td>
              <td>'. $datos[1] ." ". $datos[2] .'</td>
              <td>'. ucfirst($datos[3]) .'</td>
              <td> 
                <button class="boton-asistencia" onclick="registraAsistencia('.$datos[0].')"><i class="fa-solid fa-check"></i></button>
              </td>
            </tr>';
    }
  }else{
    $respuesta=mostrar_usuarios();
    $filas=mysqli_num_rows($respuesta); 

    echo '<thead>
            <th>DNI</th>
            <th>NOMBRES Y APELLIDOS</th>
            <th>PERFIL</th>
            <th>ASISTENCIA</th>
          </thead>';

    for ($i=0; $i<$filas; $i++){
        $datos=$respuesta->fetch_array(MYSQLI_NUM);
        
        echo  '<td>'. $datos[0] .'</td>
              <td>'. $datos[1] ." ". $datos[2] .'</td>
              <td>'. ucfirst($datos[3]) .'</td>
              <td> 
                <button class="boton-asistencia" onclick="registraAsistencia('.$datos[0].')"><i class="fa-solid fa-check"></i></button>
              </td>
            </tr>';
    }
  }
?>