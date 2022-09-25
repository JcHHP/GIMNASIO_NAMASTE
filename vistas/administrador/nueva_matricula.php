<?php include('../controladores/administrador/nuevo_cliente_controlador.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
   
    <link rel="stylesheet" href="../styles/administrador/nueva_matricula.css">
</head>
<body>
    <div class="titulo-modulo">
        <p>FORMULARIO DE NUEVA MATRICULA</p>
    </div>

    <div class="contenido_principal">
        <form action="administrador.php" method="POST" class="formulario-datos">
            <div class="dato input-DNI">
                <label for="numero-DNI">DNI</label>
                <input type="text" id="numero-DNI" name="numero-DNI" placeholder="Ingrese el número de DNI del cliente" maxlength=8>
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
                <label for="tipo-plan">TIPO DE PLAN</label>
                <select id="tipo-plan" name="tipo-plan">
                    <option selected>DIARIO</option>
                    <option>INTERDIARIO</option>
                </select>
            </div>

            <div class="dato">
                <label for="fecha-inicio">FECHA DE INICIO</label>
                <input type="date" id="fecha-inicio" name="fecha-inicio" value="<?php echo date("Y-m-d")?>" disabled>
            </div>

            <div class="dato">
                <label for="fecha-final">FECHA FINAL</label>
                <input type="date" id="fecha-final" name="fecha-final" value="<?php echo (date("Y")."-". (date("m")+1)."-".date("d"))?>" disabled>
            </div>

            <div class="dato">
                <label for="descuento">DESCUENTO (S/.)</label>
                <input type="text" id="descuento" name="descuento" maxlength=9 placeholder="*opcional">
            </div>

            <div class="dato">
                <label for="monto-total">MONTO TOTAL</label>
                <input type="text" id="monto-total" name="monto-total" value="S/100.00" disabled>
            </div>

            <button type="submit" class="btn-submit">AÑADIRㅤ<i class="fa-sharp fa-solid fa-plus"></i></button>
        </form>
    </div>
    
    <script src="../scripts/administrador/nueva_matricula.js"></script>
</body>
</html>