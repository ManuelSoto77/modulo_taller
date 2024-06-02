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

// Finalizar la orden de servicio
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $folio = $_POST['folio'];

    // Aquí puedes actualizar el estado de la orden de servicio o realizar cualquier otra acción necesaria

    echo "Orden de servicio aceptada y finalizada.";
    // Redirigir a la página principal o a un resumen de la orden
    header("Location: resumen.php?folio=$folio");
    exit();
}

$conn->close();
