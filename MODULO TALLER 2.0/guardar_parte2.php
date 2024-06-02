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

// Guardar datos de la segunda parte
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $folio = $_POST['folio'];
    
    // Obtener orden_id a partir del folio
    $sql_folio = "SELECT id FROM orden_servicio WHERE folio='$folio'";
    $result = $conn->query($sql_folio);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $orden_id = $row['id'];

        // Descripción del trabajo
        for ($i = 1; $i <= 8; $i++) {
            $servicio_no = isset($_POST["servicio_no$i"]) ? 1 : 0;
            $especificaciones = $_POST["especificaciones$i"];
            $tipo_servicio = ["Motor y enfriamiento", "Suspensión y dirección", "Tren motriz y transmisión", "Carrocería", "Remolque", "Sistema de freno y rodamiento", "Sistema eléctrico", "Otros"][$i-1];
            $sql_trabajo = "INSERT INTO trabajos (orden_id, servicio_no, tipo_servicio, especificaciones) VALUES ('$orden_id', '$i', '$tipo_servicio', '$especificacion')";
            $conn->query($sql_trabajo);
        }

        // Insumos
        for ($i = 1; $i <= 10; $i++) {
            $insumo = $_POST["insumo_$i"];
            $sql_insumo = "INSERT INTO insumos (orden_id, insumo_no, descripcion) VALUES ('$orden_id', '$i', '$insumo')";
            $conn->query($sql_insumo);
        }

        // Observaciones
        $observaciones = $_POST['observaciones'];
        $sql_observaciones = "INSERT INTO observaciones (orden_id, observacion) VALUES ('$orden_id', '$observaciones')";
        $conn->query($sql_observaciones);

        // Redirigir a la página de revisión
        header("Location: revisar_datos.php?folio=$folio");
        exit();
    } else {
        echo "Error: No se encontró la orden de servicio con el folio especificado.";
    }

    $conn->close();
}
