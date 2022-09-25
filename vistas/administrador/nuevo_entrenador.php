<?php include('../controladores/administrador/nuevo_entrenador_controlador.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
   
    <link rel="stylesheet" href="../styles/administrador/nuevo_entrenador.css">
</head>
<body>
    <div class="titulo-modulo">
        <p>FORMULARIO DE NUEVO ENTRENADOR</p>
    </div>

    <div class="contenido_principal">
        <form action="administrador.php" method="POST" class="formulario-datos">
            <div class="dato input-DNI">
                <label for="numero-DNI">DNI</label>
                <input type="text" id="numero-DNI" name="numero-DNI" placeholder="Ingrese el número de DNI" maxlength=8>

                <div class="boton-buscar">
                    <button type="button" id="buscar-DNI"><i class="fa-solid fa-magnifying-glass"></i></button>
                </div>
            </div>

            <div class="dato">
                <label for="nombres">NOMBRES</label>
                <input type="text" id="nombres" name="nombres">
            </div>

            <div class="dato">
                <label for="apellidos">APELLIDOS</label>
                <input type="text" id="apellidos" name="apellidos">
            </div>

            <div class="dato">
                <label for="sexo">SEXO</label>
                <input type="text" id="sexo" name="sexo" maxlength=9>
            </div>

            <div class="dato">
                <label for="fecha-nacimiento">FECHA DE NACIMIENTO</label>
                <input type="date" id="fecha-nacimiento" name="fecha-nacimiento">
            </div>

            <div class="dato">
                <label for="nivel-experiencia">NIVEL DE EXPERIENCIA</label>
                <select id="nivel-experiencia" name="nivel-experiencia">
                    <option selected>MEDIA</option>
                    <option>AVANZADA</option>
                </select>
            </div>

            <div class="dato">
                <label for="telefono">TELÉFONO</label>
                <input type="text" id="telefono" name="telefono" maxlength=9>
            </div>

            <div class="dato">
                <label for="correo-electronico">CORREO ELECTRÓNICO</label>
                <input type="text" id="correo-electronico" name="correo-electronico">
            </div>

            <button type="submit" class="btn-submit">AÑADIRㅤ<i class="fa-sharp fa-solid fa-plus"></i></button>
        </form>
    </div>
    
    <script src="../scripts/RENIEC.js"></script>
    <script src="../scripts/administrador/nuevo_entrenador.js"></script>
</body>
</html>