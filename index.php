<?php
    include('controladores/index_controlador.php');
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>GIMNASIO NAMASTE</title>

    <link rel="stylesheet" href="styles/index.css">
    <link rel="shortcut icon" href="icons/namaste.png" type="image/x-icon">

    <script src="scripts/sweetalert2.all.min.js"></script>
    <script src="https://kit.fontawesome.com/84156eae16.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="contenedor-principal">
            <div class="cuerpo">
                <div class="img-presentacion">
                    <div class="imagen">
                        <img src="images/fondo.jpg" alt="">
                    </div>
                    
                    <div class="encabezado">
                        <h1>GIMNASIO <label>NAMASTE</label></h1>
                    </div>
                </div>
                <div class="login">
                    <form action="#" method="post" class="formulario-datos">
                        <h1>INICIAR SESION</h1>

                        <div class="DNI">
                            <input type="text" class="input-DNI" name="input-DNI" placeholder="Ingrese su número de DNI" maxlength=8>
                            <i class="fa-solid fa-id-card icono"></i>
                        </div>
                        
                        <div class="contraseña">
                            <input type="password" class="input-contraseña" name="input-contraseña" placeholder="Ingrese su contraseña" maxlength=20>
                            <i class="fa-solid fa-key icono"></i> 
                        </div> 

                        <div class="recuperar_contraseña">
                            <a id="a-recuperar">Olvidé mi contraseña</a>
                        </div>
        
                        <button id="boton-ingresar">INGRESAR</button>
                    </form>

                    <div class="redes">
                        <label>NUESTRAS REDES SOCIALES</label>

                        <div class="redes_imagenes">
                            <div class="facebook">
                                <a href="https://www.facebook.com/gimnasiosaunanamaste" target="blank">
                                    <i class="fa-brands fa-facebook"></i>
                                </a>
                            </div>

                            <div class="tik_tok">
                                <a href="https://www.tiktok.com/@gimnasiosaunanamasteanda" target="blank">
                                    <i class="fa-brands fa-tiktok"></i>
                                </a>
                            </div>

                            <div class="instagram">
                                <a href="https://www.instagram.com/gimnasiosauna" target="blank">
                                    <i class="fa-brands fa-instagram"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
    </div>

    <script src="scripts/index.js"></script>
</body>
</html>