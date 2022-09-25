<?php
require_once('../controladores/entrenador/agregarEjercicioC.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../styles/entrenador/agregarEjercicios.css">

</head>
<body>
    <div class="titulo-modulo">
        <p>LISTADO DE EJERCICIOS</p>
    </div>

    <div class="contenido-principal">
      <form class="insertarEjercicios" id='form' method="post" action="" enctype='multipart/form-data'>
        <label for="NombreEjercicio1">NOMBRE</label>
        <input class="nom" type='text'placeholder="Ingrese el nombre del ejercicio" name="NombreEjercicio1" required >

        <label for="DescripcionEjercicio1">DESCRIPCION</label>
        <input class="Des" type='text' placeholder="Ingrese la descripción del ejercicio" name="DescripcionEjercicio1" required >
        
        <label for="NivelEjercicio1">NIVEL</label>
        <select class="opt" name="NivelEjercicio1">
            <option>Basico</option>
            <option>Regular</option>
            <option>Avanzado</option>
        </select>
        
        <input class="arch" type='file' name='Ejercicios1' size='10'>
        <button class="boton1" type="submit" value="Agregar" name="Enviar1">AGREGAR</button>
      </form>

      <table id="t1" class="TablaEjer"  >
        <thead class="cabeza1">
          <tr>
            <th>Imagen </th>
            <th>Nombre</th>
            <th>Nivel</th>
          </tr>
        </thead>

        <tbody>
            <?php   $resultado=mostrarEjercicioM();
                foreach($resultado as $res): ?>
            <tr>
                
                <td > 
                  <img class="img1" src="data:image/png;base64,<?php echo base64_encode($res['Imagen'])?>" alt="" >
                </td> 
                <td>
                  <?php echo $res['Nombre_ejercicio'] ;?>
                </td>

                <td>
                  <?php echo $res['Nivel'] ;?>
                </td>

            </tr>

            <?php endforeach; ?>  
        </tbody>

      </table>
    </div>
</body>
</html>

