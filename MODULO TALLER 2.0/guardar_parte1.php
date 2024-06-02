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

// Guardar datos de la primera parte
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $folio = $_POST['folio'];
    $fechaEntrada = $_POST['fechaEntrada'];
    $horaEntrada = $_POST['horaEntrada'];
    $fechaSalida = date('Y-m-d'); // Tomar la fecha de salida actual
    $horaSalida = date('H:i'); // Tomar la hora de salida actual

    $sql = "INSERT INTO orden_servicio (folio, fechaEntrada, fechaSalida, horaEntrada, horaSalida) VALUES ('$folio', '$fechaEntrada', '$fechaSalida', '$horaEntrada', '$horaSalida')";
    if ($conn->query($sql) === TRUE) {
        $orden_id = $conn->insert_id;
        
        // Datos del cliente
        $nombre = $_POST['nombre'];
        $telefono = $_POST['telefono'];
        $datosFacturacion = $_POST['datosFacturacion'];
        $sql_cliente = "INSERT INTO clientes (orden_id, nombre, telefono, datosFacturacion) VALUES ('$orden_id', '$nombre', '$telefono', '$datosFacturacion')";
        $conn->query($sql_cliente);

        // Datos del vehículo
        $marca = $_POST['marca'];
        $numSerie = $_POST['numSerie'];
        $numSerieMotor = $_POST['numSerieMotor'];
        $modelo = $_POST['modelo'];
        $anio = $_POST['anio'];
        $sql_vehiculo = "INSERT INTO vehiculos (orden_id, marca, numSerie, numSerieMotor, modelo, anio) VALUES ('$orden_id', '$marca', '$numSerie', '$numSerieMotor', '$modelo', '$anio')";
        $conn->query($sql_vehiculo);

        // Inventario del vehículo
        $espejosAccesorios = isset($_POST['espejosAccesorios']) ? 1 : 0;
        $Plafonerialuces = isset($_POST['Plafonerialuces']) ? 1 : 0;
        $Llaves = isset($_POST['Llaves']) ? 1 : 0;
        $Parabrisas = isset($_POST['Parabrisas']) ? 1 : 0;
        $TaponDiesel = isset($_POST['TaponDiesel']) ? 1 : 0;
        $TaponRadiadores = isset($_POST['TaponRadiadores']) ? 1 : 0;
        $EstereoRadio = isset($_POST['EstereoRadio']) ? 1 : 0;
        $sql_inventario = "INSERT INTO inventario (orden_id, espejosAccesorios, Plafonerialuces, Llaves, Parabrisas, TaponDiesel, TaponRadiadores, EstereoRadio) VALUES ('$orden_id', '$espejosAccesorios', '$Plafonerialuces', '$Llaves', '$Parabrisas', '$TaponDiesel', '$TaponRadiadores', '$EstereoRadio')";
        $conn->query($sql_inventario);

        // Redirigir a la segunda parte del formulario
        header("Location: modulo_taller_p2.php?folio=$folio");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}

