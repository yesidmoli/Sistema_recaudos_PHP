<?php
include("insertarVentas.php");

$con = connection();

$sql = "SELECT ventas.Nfactura_Vta, ventas.Detalle_Vta, clientes.Nombre, clientes.Apellidos
FROM ventas
JOIN clientes ON ventas.Cedula_Cli = clientes.Cedula";
$query = mysqli_query($con, $sql);

$row=mysqli_fetch_array($query);



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
    <link rel="stylesheet" href="../css/styleventas.css?v=<?php echo time(); ?>">
    <title>Ventas Registradas</title>
</head>
<body>
<header>
        <img src="../img/logo2.png" alt="logo">
        <div class="btns-header">
            <a class="btn-inicio" href="../index.php">INICIO</a>
            <a class="btn-cliente" href="../clientes/clientes.php">CLIENTES</a>
            <a class="btn-ventas" href="../ventas/ventas.php">VENTAS</a>
            <a class="btn-pagos" href="../pagos/pagos.php">PAGOS</a>
            <a class="btn-gestion" href="../clientes/estadoCliente2.php">GESTION</a>
            
        </div>
    </header>

    <div class="users-table">
        <h1>Ventas Registrados:</h1>
        <table>
             <thead>
                 <tr>
                     <th><h2>N factura</h2></th>
                     <th><h2>Detalle venta</h2></th>
                     <th><h2>Nombre del cliente</h2></th>
                     <th></th>
                     <th></th>
                     <th></th>
                 </tr>
                 
             </thead>

             <tbody>
                <!-- recorremos los datos que se se obtienen al hacer la consulta a la BD -->
                <?php while($row = mysqli_fetch_array($query)): ?>
                    <tr>
                        <th><?= $row["Nfactura_Vta"] ?></th>
                        <th><?= $row["Detalle_Vta"] ?></th>
                        <th><?= $row["Nombre"] . " " . $row["Apellidos"] ?></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        
                        
                    </tr>
                <?php endwhile; ?>
             </tbody>
        </table>
    </div>
</body>
</html>