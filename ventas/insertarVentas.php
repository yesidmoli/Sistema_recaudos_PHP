<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// archivo de conexión 
include("../conexion.php");
// Establecer la conexión
$con = connection();

// Inicializar variables
$cedula = "";
$nombre = "";
$direccion = "";
$ciudad = "";
$telefono = "";
$email = "";

// Verificar si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si se hizo clic en el botón "Buscar Cliente"
    if (isset($_POST["buscarCliente"])) {
        // Verificar si se proporcionó una cédula
        if (!empty($_POST["cedula"])) {
            

            // Realizar consulta para obtener datos del cliente
            $cedulaCliente = $_POST["cedula"];
            $consultaCliente = "SELECT * FROM clientes WHERE Cedula = '$cedulaCliente'";

            // Verificar si la consulta se realizó con éxito
            $resultadoCliente = mysqli_query($con, $consultaCliente);
            if (!$resultadoCliente) {
                die("Error en la consulta: " . mysqli_error($con));
            }

            // Verificar si se encontraron resultados
            if (mysqli_num_rows($resultadoCliente) > 0) {
                $rowCliente = mysqli_fetch_assoc($resultadoCliente);

                // Asignar valores a las variables
                $cedula = $rowCliente['Cedula'];
                $nombre = $rowCliente['Nombre'];
                $direccion = $rowCliente['Direccion'];
                $ciudad = $rowCliente['Ciudad'];
                $telefono = $rowCliente['Telefono'];
                $email = $rowCliente['Email'];
            } else {
                echo "<script>alert('No se encontró el cliente..');</script>";
            }
        }
    } elseif (isset($_POST["registrarVenta"])) {
        // Verificar si se proporcionaron datos para la venta
        if (!empty($_POST["factura"]) && !empty($_POST["fecha"]) && !empty($_POST["valor"]) && !empty($_POST["detalle"])) {
            // Obtener los datos del formulario
            $factura = $_POST["factura"];
            $fecha = $_POST["fecha"];
            $valor = $_POST["valor"];
            $detalle = $_POST["detalle"];
            $cedula = $_POST["cedula"];
            

            //  lógica para registrar la venta en la base de datos


            $sqlVenta = "INSERT INTO ventas (Nfactura_Vta, Fecha_Vta, Valor_Vta, Detalle_Vta, Cedula_Cli) 
                         VALUES ('$factura', '$fecha', '$valor', '$detalle', '$cedula')";
            $resultadoVenta = mysqli_query($con, $sqlVenta);

            // Verificar si la venta se registró con éxito
            if ($resultadoVenta) {
                echo "<script>alert('Venta registrada con éxito.');</script>";
            } else {
                echo "<script>alert('Error al registrar la venta:.');</script>". mysqli_error($con);
            }
        }
    }
}
// // Cerrar la conexión después de usarla
            mysqli_close($con);

?>