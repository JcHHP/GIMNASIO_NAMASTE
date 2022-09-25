<?php
    session_start();

    if(!isset($_SESSION['perfil-usuario']) || $_SESSION['perfil-usuario']!=='entrenador'){
        header('location:../index.php');
    }


    $entrenador=$_SESSION["DNI-usuario"];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>GIMNASIO NAMASTE</title>

    <link rel="stylesheet" href="../styles/menu.css">
    <link rel="shortcut icon" href="../icons/namaste.png" type="image/x-icon">

    <script src="https://kit.fontawesome.com/84156eae16.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="contenedor_general">
        <div class="barra_menu">
            <div class="encabezado">
                <img src="../icons/namaste_index.png">
                <h1>GIMNASIO <label>NAMASTE</label></h1>
            </div>

            <div class="opciones_menu">
                
                <div class="opcion">
                    <i class="fa-sharp fa-solid fa-person"></i>
                    <a href="entrenador.php?modulo=alumnos">ALUMNOS</a>
                </div>

                <div class="opcion">
                    <i class="fa-solid fa-sack-dollar"></i>
                    <a href="entrenador.php?modulo=mispagos">MIS PAGOS</a>
                </div>

                <div class="opcion">
                    <i class="fa-solid fa-plus"></i>
                    <a href="entrenador.php?modulo=agregarEjercicios">NUEVO EJERCICIO</a>
                </div>
            </div>
        </div>

        <div class="contenido">
            <div class="cabecera">
                <?php include('../controladores/nombre_usuario_controlador.php');?> 
                <i class="fa-solid fa-circle-user"></i>

                <div class="boton_salir">
                    <a href="../controladores/cerrar_sesion.php">
                        <i class="fa-solid fa-arrow-right-from-bracket"></i>
                    </a>
                </div>
            </div>

            <div class="contenido-modulo">
                <?php include('../controladores/Entrenador/modulos_entrenador.php');?>
            </div>
        </div>
    </div>
</body>
</html>