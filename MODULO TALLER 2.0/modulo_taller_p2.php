<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parte 2 - Orden de Servicio</title>
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
    $sql = "SELECT * FROM orden_servicio WHERE folio='$folio'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "No se encontraron datos.";
        exit();
    }

    $conn->close();
    ?>
    <form id="formulario-parte2" action="guardar_parte2.php" method="post">
        <input type="hidden" name="folio" value="<?php echo $folio; ?>">
        <fieldset class="table-container">
            <legend>DESCRIPCION DEL TRABAJO</legend>
            <table class="table-with-image">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th></th>
                        <th>Tipo de servicio</th>
                        <th>Especificaciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td><input type="checkbox" name="servicio_1"></td>
                        <td>Motor y enfriamiento</td>
                        <td><input type="text" name="especificacion_1" placeholder="Especificaciones"></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td><input type="checkbox" name="servicio_2"></td>
                        <td>Suspensión y dirección</td>
                        <td><input type="text" name="especificacion_2" placeholder="Especificaciones"></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td><input type="checkbox" name="servicio_3"></td>
                        <td>Tren motriz y transmisión</td>
                        <td><input type="text" name="especificacion_3" placeholder="Especificaciones"></td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td><input type="checkbox" name="servicio_4"></td>
                        <td>Carrocería</td>
                        <td><input type="text" name="especificacion_4" placeholder="Especificaciones"></td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td><input type="checkbox" name="servicio_5"></td>
                        <td>Remolque</td>
                        <td><input type="text" name="especificacion_5" placeholder="Especificaciones"></td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td><input type="checkbox" name="servicio_6"></td>
                        <td>Sistema de freno y rodamiento</td>
                        <td><input type="text" name="especificacion_6" placeholder="Especificaciones"></td>
                    </tr>
                    <tr>
                        <td>7</td>
                        <td><input type="checkbox" name="servicio_7"></td>
                        <td>Sistema eléctrico</td>
                        <td><input type="text" name="especificacion_7" placeholder="Especificaciones"></td>
                    </tr>
                    <tr>
                        <td>8</td>
                        <td><input type="checkbox" name="servicio_8"></td>
                        <td>Otros</td>
                        <td><input type="text" name="especificacion_8" placeholder="Especificaciones"></td>
                    </tr>
                </tbody>
            </table>
        </fieldset>
        <fieldset class="timeline-container">
            <legend>INSUMOS</legend>
            <div class="timeline">
                <div class="timeline-item">
                    <label for="input-1">1.</label>
                    <input type="text" id="input-1" name="insumo_1" class="input-field" placeholder="Ingrese texto aquí">
                </div>
                <div class="timeline-item">
                    <label for="input-2">2.</label>
                    <input type="text" id="input-2" name="insumo_2" class="input-field" placeholder="Ingrese texto aquí">
                </div>
                <div class="timeline-item">
                    <label for="input-3">3.</label>
                    <input type="text" id="input-3" name="insumo_3" class="input-field" placeholder="Ingrese texto aquí">
                </div>
                <div class="timeline-item">
                    <label for="input-4">4.</label>
                    <input type="text" id="input-4" name="insumo_4" class="input-field" placeholder="Ingrese texto aquí">
                </div>
                <div class="timeline-item">
                    <label for="input-5">5.</label>
                    <input type="text" id="input-5" name="insumo_5" class="input-field" placeholder="Ingrese texto aquí">
                </div>
                <div class="timeline-item">
                    <label for="input-6">6.</label>
                    <input type="text" id="input-6" name="insumo_6" class="input-field" placeholder="Ingrese texto aquí">
                </div>
                <div class="timeline-item">
                    <label for="input-7">7.</label>
                    <input type="text" id="input-7" name="insumo_7" class="input-field" placeholder="Ingrese texto aquí">
                </div>
                <div class="timeline-item">
                    <label for="input-8">8.</label>
                    <input type="text" id="input-8" name="insumo_8" class="input-field" placeholder="Ingrese texto aquí">
                </div>
                <div class="timeline-item">
                    <label for="input-9">9.</label>
                    <input type="text" id="input-9" name="insumo_9" class="input-field" placeholder="Ingrese texto aquí">
                </div>
                <div class="timeline-item">
                    <label for="input-10">10.</label>
                    <input type="text" id="input-10" name="insumo_10" class="input-field" placeholder="Ingrese texto aquí">
                </div>
            </div>
        </fieldset>
        <fieldset>
            <legend>OBSERVACIONES</legend>
            <section>
                <h2>OBSERVACIONES ADICIONALES</h2>
                <textarea name="observaciones" id="observaciones" rows="4" cols="50"></textarea>
            </section>
        </fieldset>
        <input type="submit" value="Guardar y enviar para revisión">
    </form>
</body>
</html>
