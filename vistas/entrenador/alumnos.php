<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../styles/entrenador/alumnos.css">
    <!-- <link rel="stylesheet" href="../styles/entrenador/adminlte.min.css"> -->
    
</head>
<body>
    <div class="titulo-modulo">
        <p>LISTA DE ALUMNOS</p>
    </div>

    <div class="contenido-principal">
        <table class='lista_alumnos'>
            <thead>
                <th>APELLIDOS Y NOMBRES</th>
                <th>NIVEL</th>
            </thead>

            <tr>
                <?php include('../controladores/Entrenador/ver_alumnos.php');?>
        </table>      
    </div>
</body>
</html>