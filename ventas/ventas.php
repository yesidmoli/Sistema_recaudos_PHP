<?php
include("../ventas/insertarVentas.php");

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
    <title>Modulo de ventas</title>
</head>
<body>
<header>
        <img src="../img/logo2.png" alt="logo">
        <div class="btns-header">
            <a class="btn-inicio" href="../index.php">INICIO</a>
            <a class="btn-cliente" href="../clientes/clientes.php">CLIENTES</a>
            <a class="btn-ventas" href="ventas.php">VENTAS</a>
            <a class="btn-pagos" href="../pagos/pagos.php">PAGOS</a>
            <a class="btn-gestion" href="../clientes/estadoCliente.php">GESTION</a>
            
        </div>
    </header>
    <div class="contenedor">
        <div class="ventas">
        <h1>Modulo de ventas</h1>
    <!-- Contenido HTML y formulario -->
    <form action="" method="POST">
        <!-- Campos para ingresar la cédula y obtener datos del cliente -->
        Cedula:
        <input type="number" id="cedula" name="cedula" value="<?= $cedula ?>" placeholder="Cedula del cliente">
        <button type="submit" name="buscarCliente">Buscar Cliente</button><br><br>

        <!-- Campos del formulario para la venta -->
        Factura:
        <input type="number" id="factura" name="factura" placeholder="Factura">
        Fecha:  
        <input type="date" name="fecha" placeholder="Fecha">
        Valor venta:    
        <input type="number" name="valor" placeholder="Valor de la venta"><br><br>
        Detalles de venta:   
        <input type="text" id="detalles" name="detalle" placeholder="Detalles de la venta">

        <!-- Campos del formulario con los datos del cliente -->
        Nombre:
        <input type="text" name="nombre" value="<?= $nombre ?>" placeholder="Nombre del cliente" readonly>
        
        Direccion:
        <input type="text" name="direccion" value="<?= $direccion ?>" placeholder="Direccion del cliente"><br>

        Ciudad:
        <input type="text" name="ciudad" value="<?= $ciudad ?>" placeholder="Ciudad">

        Telefono:
        <input type="text" name="telefono" value="<?= $telefono ?>" placeholder="Telefono del cliente"><br>

        Email:
        <input type="text" name="email" value="<?= $email ?>" placeholder="Correo electronico del cliente"><br><br>

        <!-- Botón para enviar el formulario y registrar la venta -->
        <center><button type="submit" name="registrarVenta">Nueva venta</button></center>
    </form>
    </div>
</div>

<div class="btn-end">
        <a class="btn-registro" href="registroVentas.php">Ventas Registradas</a>
    </div>
</body>
</html>
