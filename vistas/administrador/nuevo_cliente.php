<?php include('../controladores/administrador/nuevo_cliente_controlador.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
   
    <link rel="stylesheet" href="../styles/administrador/nuevo_cliente.css">
</head>
<body>
    <div class="titulo-modulo">
        <p>FORMULARIO DE NUEVO CLIENTE</p>
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
                <input type="text" id="nombres" name="nombres" disabled>
            </div>

            <div class="dato">
                <label for="apellidos">APELLIDOS</label>
                <input type="text" id="apellidos" name="apellidos" disabled>
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
                <label for="nivel-entrenamiento">NIVEL DE ENTRENAMIENTO</label>
                <select id="nivel-entrenamiento" name="nivel-entrenamiento">
                    <option selected>BASICO</option>
                    <option>INTERMEDIO</option>
                    <option>AVANZADO</option>
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
    <script src="../scripts/administrador/nuevo_usuario.js"></script>
</body>
</html>