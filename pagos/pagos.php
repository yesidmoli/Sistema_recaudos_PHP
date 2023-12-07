<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include("../pagos/insertarPagos.php");

$con = connection();


$cedulaCliente = isset($_POST["cedula"]) ? $_POST["cedula"] : "";
// $valor_venta = $_POST["valorVenta"];

// $sql = "SELECT pagos.Num_pago, pagos.Fecha_pago, pagos.Valor_pago
// FROM pagos
// JOIN ventas ON pagos.NFactura_Vta = ventas.Nfactura_Vta
// JOIN clientes ON ventas.Cedula_Cli = clientes.Cedula
// WHERE clientes.Cedula = '$cedulaCliente'";

// Consulta para obtener los pagos de una factura específica
$sql = "SELECT pagos.Num_pago, pagos.Fecha_pago, pagos.Valor_pago
        FROM pagos
        JOIN ventas ON pagos.NFactura_Vta = ventas.Nfactura_Vta
        JOIN clientes ON ventas.Cedula_Cli = clientes.Cedula
        WHERE clientes.Cedula = '$cedulaCliente' AND ventas.Nfactura_Vta = '$factura'";
$query = mysqli_query($con, $sql);

// Obtener la suma de los pagos
$consultaSumaPagos = "SELECT SUM(Valor_pago) AS total_pagos FROM pagos WHERE Cedula_Cli = '$cedulaCliente'";
$resultadoSumaPagos = mysqli_query($con, $consultaSumaPagos);

if ($resultadoSumaPagos) {
    $rowSumaPagos = mysqli_fetch_assoc($resultadoSumaPagos);
    $totalPagos = $rowSumaPagos['total_pagos'];

    $valor_venta = isset($_POST["valorVenta"]) ? $_POST["valorVenta"] : "";

    // Calcular el saldo
    $saldo = intval($valor_venta) - $totalPagos;
} 
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Ingresa datos pagos">
    <meta name="keywords" content="html, css, bases de datos, php">
    <meta name="author" content="Yesid"/>
    <meta name="copyright" content="Yesid">
    <link rel="stylesheet" href="../css/stylePagos.css?v=<?php echo time(); ?>">
    <link rel="shortcut icon" href="../img/acceso.png" type="image/x-icon">
    <title>Modulo de pagos</title>
    
</head>
<body>
    <!-- header donde estaran el logo y el menu de opciones -->
    <header>
        <img src="../img/logo2.png" alt="logo">
        <div class="btns-header">
            <a class="btn-inicio" href="../index.php">INICIO</a>
            <a class="btn-cliente" href="../clientes/clientes.php">CLIENTES</a>
            <a class="btn-ventas" href="../ventas/ventas.php">VENTAS</a>
            <a class="btn-pagos" href="../pagos/pagos.php">PAGOS</a>
            <a class="btn-gestion" href="../clientes/estadoCliente.php">GESTION</a>
            
        </div>
    </header>
    <main>
        <!-- seccion para el modulo de pagos -->
        <section>
        <h1>MODULO DE PAGOS</h1>

        <!-- creamos un formulario para los datos -->
        <form action="" method="POST">
           
            
            <div class="cedula-img">
                Factura/Venta:
                <input type="text" name="factura" id="factura" placeholder="N Factura" value="<?= $factura ?>">
                <button type="submit" name="buscarFactura" class="btn-buscar-factura">Buscar Factura</button>
              
            </div>
            <div>
                Fecha:
                <input type="text" name="fecha" value="<?= $fecha ?>"  readonly>

                Valor Vta:
                <input type="text" name="valorVenta" value="<?= $valorVenta ?>" readonly>
            </div>
            <!-- <div>
                Nombres
                <input type="text" name="nombre" placeholder="Nombres"> 
            </div> -->

            <div>
                Detalle Venta
                <textarea name="detalle" id="" cols="30" rows="10" value="<?= $detalle ?>" readonly><?php echo $detalle; ?></textarea>
            </div>
           
            <div>
                Cedula
                <input type="text" name="cedula" placeholder="Cedula" id="cedula" value="<?= $cedula ?>" readonly> 
                Nombres
                <input type="text" name="nombre" placeholder="Nombres" value="<?= $nombre ?>" readonly> 
            </div>
           
            
            <div>
                Direccion
                <input type="text" name="direccion" placeholder="Direccion" value="<?= $direccion ?>" readonly>
                Telefono
                <input type="text" name="telefono" placeholder="telefono" value="<?= $telefono ?>" readonly>
            </div>
           
            <div>
                Ciudad
                <input type="text" name="ciudad" placeholder="ciudad" value="<?= $ciudad ?>" readonly>
                Email
                <input type="text" name="email" placeholder="Email" value="<?= $email ?>" readonly>
            </div>
            <center><h3>Detalles Pago</h3></center>
            <button type="submit" name="buscarFactura" class="btn-buscar-factura">Buscar Pago</button>
        
            <div class="users-table">
                <table>
                    <thead>
                        <tr>
                            <th>Recibo</th>
                            <th>Fecha</th>
                            <th>Pago</th>
                        </tr>
                    </thead>
                    <tbody>
                             <!-- recorremos los datos que se se obtienen al hacer la consulta a la BD -->
                            <?php while($row = mysqli_fetch_array($query)): ?>
                                <tr>
                                    <th><?= $row["Num_pago"] ?></th>
                                    <th><?= $row["Fecha_pago"] ?></th>
                                    <th><?= $row["Valor_pago"] ?></th>
                                    
                                </tr>
                            <?php endwhile; ?>

                            
                            </tr>
                    </tbody>
                </table>
            </div>
            <div>
                Total Pagos:
                <input type="text" name="total-pagos"  class="total-saldo" placeholder="$" value="<?= $totalPagos ?>">
                Saldo:
                <input type="text" name="saldo" class="total-saldo" placeholder="$" value="<?= $saldo ?>">
            </div>
            <div>
                No. Recibo Pago:
                <input type="text" name="recibo-pagos"  class="recibo-valor">
                Valor Pago:
                <input type="text" name="valor-pago" class="recibo-valor">
            </div>
            <div class="fecha-prox">
                Fecha Proxima Pago:
                <input type="date" name="fecha-proxima"  >
            </div>
           
            <div class="fecha-prox">
                <button class="nuevo-pago" type="submit" name="nuevoPago">Nuevo Pago</button>
            </div>
          
        </form>
    </section>
    </main>

</body>
</html>