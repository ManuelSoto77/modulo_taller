<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parte 1 - Orden de Servicio</title>
</head>
<body>
    <div id="form-container">

<form id="formulario-parte1" action="guardar_parte1.php" method="post">
    <input type="hidden" name="folio" value="<?php echo $folio;?>" readonly>
            <fieldset>
                <legend>ORDEN DE SERVICIO</legend>
                <p>
    <label for="folio">FOLIO:</label>
    <input type="text" id="folio" name="folio" readonly value="<?php echo $folio; ?>">
</p>
                <p>
        <label for="fechaEntrada">FECHA DE ENTRADA:</label>
        <input type="date" id="fechaEntrada" name="fechaEntrada" value="<?php echo date('Y-m-d');?>" readonly>
    </p>
                <p>
                    <label for="fechaSalida">FECHA DE SALIDA:</label>
                    <input type="date" id="fechaSalida" name="fechaSalida">
                </p>
                <p>
        <label for="horaEntrada">HORA DE ENTRADA:</label>
        <input type="time" id="horaEntrada" name="horaEntrada" value="<?php echo date('H:i');?>" readonly>
    </p>
                <p>
                    <label for="horaSalida">HORA DE SALIDA:</label>
                    <input type="time" id="horaSalida" name="horaSalida">
                </p>
            </fieldset>
            <fieldset>
                <legend>DATOS DEL CLIENTE</legend>
                <p>
                    <label for="nombre">NOMBRE:</label>
                    <input type="text" id="nombre" name="nombre">
                </p>
                <p>
                    <label for="telefono">TELÉFONO:</label>
                    <input type="tel" id="telefono" name="telefono" required pattern="[0-9]{10}">
                </p>
                <p>
                    <label for="datosFacturacion">DATOS DE FACTURACION:</label>
                    <input type="text" id="datosFacturacion" name="datosFacturacion">
                </p>
            </fieldset>
            <fieldset>
                <legend>DATOS DEL VEHÍCULO</legend>
                <p>
                    <label for="marca">MARCA:</label>
                    <input type="text" id="marca" name="marca">
                </p>
                <p>
                    <label for="numSerie">NUM. SERIE:</label>
                    <input type="text" id="numSerie" name="numSerie">
                </p>
                <p>
                    <label for="numSerieMotor">NUM. SERIE MOTOR:</label>
                    <input type="text" id="numSerieMotor" name="numSerieMotor">
                </p>
                <p>
                    <label for="modelo">MODELO:</label>
                    <input type="text" id="modelo" name="modelo">
                </p>
                <p>
                    <label for="anio">AÑO:</label>
                    <input type="number" id="anio" name="anio">
                </p>
                <p id="vehiculosRegistrados">
                    <!-- Aquí se mostrarán los vehículos registrados -->
                </p>
            </fieldset>
            <fieldset>
                <legend>OBSERVACIONES DE RECEPCIÓN</legend>
                <legend>INVENTARIO</legend>
                <p>
                    <input type="checkbox" id="espejosAccesorios" name="espejosAccesorios">
                    <label for="espejosAccesorios">Espejos y accesorios</label>
                </p>
                <p>
                    <input type="checkbox" id="Plafonerialuces" name="Plafonerialuces">
                    <label for="Plafonerialuces">Plafoneria y luces</label>
                </p>
                <p>
                    <input type="checkbox" id="Llaves" name="Llaves">
                    <label for="Llaves">Llaves</label>
                </p>
                <p>
                    <input type="checkbox" id="Parabrisas" name="Parabrisas">
                    <label for="Parabrisas">Parabrisas</label>
                </p>
                <p>
                    <input type="checkbox" id="TaponDiesel" name="TaponDiesel">
                    <label for="TaponDiesel">Tapon Diesel</label>
                </p>
                <p>
                    <input type="checkbox" id="TaponRadiadores" name="TaponRadiadores">
                    <label for="TaponRadiadores">Tapon Radiadores</label>
                </p>
                <p>
                    <input type="checkbox" id="EstereoRadio" name="EstereoRadio">
                    <label for="EstereoRadio">Estereo y/o Radio</label>
                </p>
            <fieldset>
                <legend>NIVEL DE DIESEL</legend>
                <div>
                    <!-- aguja de diesel  -->
                </div>
            </fieldset>
            <input type="submit" value="Guardar y enviar a la segunda parte">
        </form>
    </div>
</body>
</html>
