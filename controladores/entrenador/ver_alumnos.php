<?php 
    require_once('../modelos/entrenador/alumnos.php');

    $respuesta=alumnos($_SESSION['DNI-usuario']);
    $filas=mysqli_num_rows($respuesta); 

    for ($i=0; $i<$filas; $i++){
        $datos=$respuesta->fetch_array(MYSQLI_NUM);

        
        // echo '<td>'. $datos[1] .'</td>
        //       <td>'. $datos[2] .'</td>
        //       <td>'. $datos[3] .'</td>
        //       <td><a href="">Ver Detalles</a></td>            
             
        //     </tr>';
        ?>
        
        <div class="card card-solid">
          <div class="card-body pb-0">
            <div class="row">
              <div class="col-12 col-sm-6 col-md-6 d-flex align-items-stretch flex-column contenedor-general">
                <div class="card bg-light d-flex flex-fill">
                  <div class="card-header text-muted border-bottom-0"> 
                    <?php
                      echo  $datos[0] ;
                    ?> 
                  </div>
                  <div class="card-body pt-0">
                    <div class="row">
                      <div class="col-7">
                        <h2 class="lead">
                          <b>
                            <?php
                              echo  $datos[1] ;
                            ?>
                          </b>
                        </h2>
                        <p class="text-muted text-sm">
                          <b>EDAD:</b>
                          <?php echo $datos[2]?><br>
                          <b>PESO:</b>
                          <?php echo $datos[3]?><br>
                          <b>ESTATURA:</b>
                          <?php echo $datos[4]. ' m'?><br>
                          <b>NIVEL:</b>
                          <?php echo $datos[5]?>  <br>
                          <b>TIPO DE PLAN:</b>
                          <?php echo $datos[6]?> <br>
                          <b>FECHA DE INICIO:</b>
                          <?php echo $datos[7]?>
                        </p>
                        
                        <ul class="ml-4 mb-0 fa-ul text-muted">
                          <li class="small"><span class="fa-li"><i class="fas fa-lg fa-envelope"></i></span> <?php echo $datos[8]?></li>
                          <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> <?php echo $datos[9]?></li>
                        </ul>
                      </div>
                      <div class="col-5 text-center">
                        <div class="perfil">
                          <i class="fa-solid fa-circle-user"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card-footer">
                    <div class="text-right">
                      <a href="#" class="btn btn-sm btn-primary">
                        <i class="fa-sharp fa-solid fa-pen-to-square"></i> Ver/Asignar Rutinas
                      </a>
                      <a href="#" class="btn btn-sm btn-primary">
                        <i class="fa-sharp fa-solid fa-pen-to-square"></i> Registrar Avance
                      </a>
                      <a href="#" class="btn btn-sm btn-primary">
                        <i class="fa-sharp fa-solid fa-pen-to-square"></i> Actualizar datos
                      </a>
                    
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
<?php
    }
    
?>