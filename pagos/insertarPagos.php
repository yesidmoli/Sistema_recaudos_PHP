<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// archivo de conexión 
include("../conexion.php");
// Establecer la conexión
$con = connection();

// Inicializar variables
$factura = "";
$fecha = "";
$valorVenta = "";
$detalle = "";
$cedula = "";
$nombre = "";
$direccion = "";
$telefono = "";
$ciudad = "";
$email = "";

// Verificar si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si se hizo clic en el botón "Buscar Factura"
    if (isset($_POST["buscarFactura"])) {
        // Verificar si se proporcionó una factura
        if (!empty($_POST["factura"])) {
            

            // Realizar consulta para obtener datos de la factura 
            $facturaCliente = $_POST["factura"];
            $consultaFactura = "SELECT ventas.*, clientes.Cedula, clientes.Nombre, clientes.Direccion, clientes.Telefono, clientes.Ciudad, clientes.Email
                    FROM ventas
                    JOIN clientes ON ventas.Cedula_Cli = clientes.Cedula
                    WHERE ventas.Nfactura_Vta = '$facturaCliente'";

            // Verificar si la consulta se realizó con éxito
            $resultadoFactura = mysqli_query($con, $consultaFactura);
            if (!$resultadoFactura) {
                die("Error en la consulta: " . mysqli_error($con));
            }

            // Verificar si se encontraron resultados
            if (mysqli_num_rows($resultadoFactura) > 0) {
                $rowFactura = mysqli_fetch_assoc($resultadoFactura);

                // Asignar valores a las variables
                $factura = $rowFactura['Nfactura_Vta'];
                $fecha = $rowFactura['Fecha_Vta'];
                $valorVenta = $rowFactura['Valor_Vta'];
                $detalle = $rowFactura['Detalle_Vta'];
                $cedula = $rowFactura['Cedula'];
                $nombre = $rowFactura['Nombre'];
                $direccion = $rowFactura['Direccion'];
                $telefono = $rowFactura['Telefono'];
                $ciudad = $rowFactura['Ciudad'];
                $email = $rowFactura['Email'];

                
            } else {
                echo "<script>alert('No se encontró el cliente..');</script>";
            }
        }
    } elseif (isset($_POST["nuevoPago"])) {
        // Verificar si se proporcionaron datos para el pago
        if (!empty($_POST["recibo-pagos"]) && !empty($_POST["valor-pago"]) && !empty($_POST["fecha-proxima"])) {

             // Obtener los datos del formulario
            $nPago = $_POST["recibo-pagos"];
            $fechaPago = date("Y-m-d");
            $valorPago = $_POST["valor-pago"];
            $factura = $_POST["factura"];
            $cedula = $_POST["cedula"];
            $fechaProxima = $_POST["fecha-proxima"];
            

            //  lógica para registrar la venta en la base de datos


            $sqlPago = "INSERT INTO pagos (Num_pago, Fecha_pago, Valor_pago, NFactura_Vta, Cedula_Cli, Fecha_Prox_Pago) 
                         VALUES ('$nPago', '$fechaPago', '$valorPago', '$factura', '$cedula', '$fechaProxima')";
            $resultadoPago = mysqli_query($con, $sqlPago);

            // Verificar si la venta se registró con éxito
            if ($resultadoPago) {
                echo "<script>alert('Pago registrado con éxito.');</script>";
            } else {
                echo "<script>alert('Error al registrar el pago:.');</script>". mysqli_error($con);
            }
        }
    }
}
// // Cerrar la conexión después de usarla
            mysqli_close($con);

?>