<?php
    session_start();

    if(!isset($_SESSION['perfil-usuario']) || $_SESSION['perfil-usuario']!=='usuario'){
        header('location:../index.php');
    }

    $cliente=$_SESSION["DNI-usuario"];
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
                    <i class="fa-solid fa-list-check"></i>
                    <a href="usuario.php?modulo=miavance">MI RUTINA SEMANAL</a>
                </div>

                <div class="opcion">
                    <i class="fa-solid fa-dumbbell"></i>
                    <a href="usuario.php?modulo=mientrenador">MI ENTRENADOR</a>
                </div>

                <div class="opcion">
                    <i class="fa-solid fa-sack-dollar"></i>
                    <a href="usuario.php?modulo=mispagos">MIS PAGOS</a>
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
                <?php include('../controladores/cliente/modulos_cliente.php');?>
            </div>
        </div>
    </div>
</body>
</html>