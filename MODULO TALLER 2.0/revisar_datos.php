<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Revisión y Aceptación</title>
</head>
<body>
    <?php
    // Conexión a la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "modulo_taller";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Obtener los datos del folio
    $folio = $_GET['folio'];
    $sql_folio = "SELECT id FROM orden_servicio WHERE folio='$folio'";
    $result_folio = $conn->query($sql_folio);
    if ($result_folio->num_rows > 0) {
        $row_folio = $result_folio->fetch_assoc();
        $orden_id = $row_folio['id'];
        
        // Obtener datos de la orden de servicio
        $sql_orden = "SELECT * FROM orden_servicio WHERE id='$orden_id'";
        $result_orden = $conn->query($sql_orden);
        $orden = $result_orden->fetch_assoc();

        // Obtener datos del cliente
        $sql_cliente = "SELECT * FROM clientes WHERE orden_id='$orden_id'";
        $result_cliente = $conn->query($sql_cliente);
        $cliente = $result_cliente->fetch_assoc();

        // Obtener datos del vehículo
        $sql_vehiculo = "SELECT * FROM vehiculos WHERE orden_id='$orden_id'";
        $result_vehiculo = $conn->query($sql_vehiculo);
        $vehiculo = $result_vehiculo->fetch_assoc();

        // Obtener inventario del vehículo
        $sql_inventario = "SELECT * FROM inventario WHERE orden_id='$orden_id'";
        $result_inventario = $conn->query($sql_inventario);
        $inventario = $result_inventario->fetch_assoc();

        // Obtener descripción del trabajo
        $sql_trabajo = "SELECT * FROM trabajos WHERE orden_id='$orden_id'";
        $result_trabajo = $conn->query($sql_trabajo);

        // Obtener insumos
        $sql_insumos = "SELECT * FROM insumos WHERE orden_id='$orden_id'";
        $result_insumos = $conn->query($sql_insumos);

        // Obtener observaciones
        $sql_observaciones = "SELECT * FROM observaciones WHERE orden_id='$orden_id'";
        $result_observaciones = $conn->query($sql_observaciones);
        $observaciones = $result_observaciones->fetch_assoc();
    } else {
        echo "Error: No se encontró la orden de servicio con el folio especificado.";
        exit();
    }

    $conn->close();
    ?>

    <form id="formulario-revision" action="aceptar.php" method="post">
        <input type="hidden" name="folio" value="<?php echo $folio; ?>">
        <fieldset>
            <legend>Revisión de Orden de Servicio</legend>
            <!-- Mostrar datos de la orden de servicio -->
            <p>Folio: <?php echo $orden['folio']; ?></p>
            <p>Fecha de Entrada: <?php echo $orden['fechaEntrada']; ?></p>
            <p>Fecha de Salida: <?php echo $orden['fechaSalida']; ?></p>
            <p>Hora de Entrada: <?php echo $orden['horaEntrada']; ?></p>
            <p>Hora de Salida: <?php echo $orden['horaSalida']; ?></p>

            <!-- Mostrar datos del cliente -->
            <p>Nombre: <?php echo $cliente['nombre']; ?></p>
            <p>Teléfono: <?php echo $cliente['telefono']; ?></p>
            <p>Datos de Facturación: <?php echo $cliente['datosFacturacion']; ?></p>

            <!-- Mostrar datos del vehículo -->
            <p>Marca: <?php echo $vehiculo['marca']; ?></p>
            <p>Número de Serie: <?php echo $vehiculo['numSerie']; ?></p>
            <p>Número de Serie del Motor: <?php echo $vehiculo['numSerieMotor']; ?></p>
            <p>Modelo: <?php echo $vehiculo['modelo']; ?></p>
            <p>Año: <?php echo $vehiculo['anio']; ?></p>

            <!-- Mostrar inventario del vehículo -->
            <p>Espejos y Accesorios: <?php echo $inventario['espejosAccesorios'] ? 'Sí' : 'No'; ?></p>
            <p>Plafonería y Luces: <?php echo $inventario['Plafonerialuces'] ? 'Sí' : 'No'; ?></p>
            <p>Llaves: <?php echo $inventario['Llaves'] ? 'Sí' : 'No'; ?></p>
            <p>Parabrisas: <?php echo $inventario['Parabrisas'] ? 'Sí' : 'No'; ?></p>
            <p>Tapón de Diesel: <?php echo $inventario['TaponDiesel'] ? 'Sí' : 'No'; ?></p>
            <p>Tapón de Radiadores: <?php echo $inventario['TaponRadiadores'] ? 'Sí' : 'No'; ?></p>
            <p>Estéreo y/o Radio: <?php echo $inventario['EstereoRadio'] ? 'Sí' : 'No'; ?></p>

            <!-- Mostrar descripción del trabajo -->
            <table>
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Tipo de Servicio</th>
                        <th>Especificaciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($trabajos = $result_trabajo->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $trabajos['servicio_no']; ?></td>
                        <td><?php echo $trabajos['tipo_servicio']; ?></td>
                        <td><?php echo $trabajos['especificaciones']; ?></td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>

            <!-- Mostrar insumos -->
            <table>
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Descripción</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($insumos = $result_insumos->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $insumos['insumo_no']; ?></td>
                        <td><?php echo $insumos['descripcion']; ?></td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>

            <!-- Mostrar observaciones -->
            <p>Observaciones: <?php echo $observaciones['observacion']; ?></p>

            <input type="submit" value="Aceptar y finalizar">
        </fieldset>
    </form>
</body>
</html>
