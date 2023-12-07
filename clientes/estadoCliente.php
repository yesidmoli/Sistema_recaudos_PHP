<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include("../ventas/insertarVentas.php");

$con = connection();

$cedulaCliente = isset($_POST["cedula"]) ? $_POST["cedula"] : "";

// Consulta para obtener todas las ventas, pagos y saldo del cliente
$sql = "SELECT 
            ventas.Nfactura_Vta, ventas.Detalle_Vta, ventas.Valor_Vta, 
            pagos.Num_pago, pagos.Fecha_pago, pagos.Valor_pago,
            (ventas.Valor_Vta - COALESCE(SUM(pagos.Valor_pago), 0)) AS saldo
        FROM clientes
        LEFT JOIN ventas ON clientes.Cedula = ventas.Cedula_Cli
        LEFT JOIN pagos ON ventas.Nfactura_Vta = pagos.NFactura_Vta
        WHERE clientes.Cedula = '$cedulaCliente'
        GROUP BY ventas.Nfactura_Vta, pagos.Num_pago
        ORDER BY ventas.Nfactura_Vta, pagos.Num_pago";

$query = mysqli_query($con, $sql);

// Inicializa variables
$totalVentas = 0;
$totalPagos = 0;
$saldo = 0;
$totalSaldo = 0;


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Metadatos y enlaces a estilos -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Ingresa datos a base usuarios">
    <meta name="keywords" content="html, css, bases de datos, php" />
    <meta name="author" content="Laura Ortiz" />
    <meta name="copyright" content="aprendices" />
    <link rel="stylesheet" href="../css/styleMonitoreos.css?v=<?php echo time(); ?>">
    <title>Monitoreo clientes</title>
</head>
<body>

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
        <section>
        <h1>ESTADO DE CUENTA DE CLIENTE</h1>
        <div class="contenedor">
            <div class="ventas">
            
            <!-- Contenido HTML y formulario -->
                <form action="" method="POST">
                    <!-- Campos para ingresar la cédula y obtener datos del cliente -->
                    <div class="cedula-img">
                    Cedula cliente:
                        <input type="number" id="cedula" name="cedula" value="<?= $cedula ?>" placeholder="Cedula del cliente">
                        <button id="btn-buscar" type="submit" name="buscarCliente">Nueva Consulta</button><br><br>
                    </div>
                    <!-- Campos del formulario con los datos del cliente -->
                    <div>
                        Nombre:
                        <input type="text" name="nombre" value="<?= $nombre ?>" placeholder="Nombre del cliente" readonly>
                    </div>
                    <div>
                        Direccion:
                        <input type="text" name="direccion" value="<?= $direccion ?>" placeholder="Direccion del cliente"><br>
                        Telefono:
                        <input type="text" name="telefono" value="<?= $telefono ?>" placeholder="Telefono del cliente"><br>
                    </div>
                    <div>
                        Ciudad:
                        <input type="text" name="ciudad" value="<?= $ciudad ?>" placeholder="Ciudad">
                        Email:
                        <input type="text" name="email" value="<?= $email ?>" placeholder="Correo electronico del cliente"><br><br>
                    </div>
                    <center><h2>Detalles Movimientos</h2></center>
                    <div class="users-table">
                    
                            <table>
                            
                                <thead>
                                    <tr>
                                        <th>Ventas</th>
                                        <th>Pagos</th>
                                        <th>Saldo</th>
                                    </tr>
                                </thead>
                                <tbody>
                                     <!-- recorremos los datos que se se obtienen al hacer la consulta a la BD -->
                                        <?php while($row = mysqli_fetch_array($query)): 
                                            // Suma el valor de las ventas, pagos y saldo
                                            $totalVentas += $row['Valor_Vta'];
                                            $totalPagos += $row["Valor_pago"];
                                            $saldo = $row['saldo'];
                                            $totalSaldo = $totalVentas - $totalPagos;
                                            ?>
                                            <tr>
                                                <!-- presentamos los datos en la tabla -->
                                                <th><?= "N Factura:  " .  $row['Nfactura_Vta'] . " Detalle: " . $row['Detalle_Vta'] . " Valor: " . $row['Valor_Vta']?></th>
                                                <th><?= "N Pago: " . $row["Num_pago"]." Fecha:  ". $row['Fecha_pago'] . "  Valor: " .$row['Valor_pago']  ?></th>
                                                <th><?= $saldo ?></th>
                                                
                                            </tr>
                                            <?php endwhile; ?>
                                            
                                    
                                        <tr>
                                            <th><input class="input-table" type="text" name="total-ventas" placeholder="$" value=" $  <?= " " . $totalVentas ?>"  readonly ></th>
                                            <th><input  class="input-table"  type="text" name="total-pagos"  placeholder="$" value="$ <?= " " . $totalPagos ?>"  readonly  ></th>
                                            <th><input  class="input-table-saldo"  type="text" name="total-saldo" value=" $<?= " ". $totalSaldo ?>" placeholder="$"  readonly></th>
                                        </tr>
                                       
                                        
                                </tbody>
                            </table>
                        </div>
                </form>
            </div>
        </div>
        </section>
    </main>

</body>
</html>