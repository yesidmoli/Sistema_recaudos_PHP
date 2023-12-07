<?php
// include("conexion.php");
// $con = connection();

// $cedula=$_GET['Cedula'];

// $sql="SELECT * FROM clientes WHERE id='$cedula'";

// $query=mysqli_query($con, $sql);

// $row=mysqli_fetch_array($query);

?>
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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Ingresa datos a base usuarios">
    <meta name="keywords" content="html, css, bases de datos, php" />
    <meta name="author" content="Laura Ortiz" />
    <meta name="copyright" content="aprendices" />
    <link rel="stylesheet" href="css/styleventas.css?v=<?php echo time(); ?>">
    <title>Modulo de ventas</title>
</head>

<body>
    
    <header>
        <img src="img/logo2.png" alt="logo">
        <div class="btns-header">
            <a class="btn-inicio" href="index.html">INICIO</a>
            <a class="btn-cliente" href="clientes.php">CLIENTES</a>
            <a class="btn-ventas" href="ventas.php">VENTAS</a>
            <a class="btn-pagos" href="pagos.html">PAGOS</a>
            <a class="btn-gestion" href="estadoCliente.html">GESTION</a>
            
        </div>
    </header>
    <div class="contenedor">
        <div class="ventas">
            <h1>Modulo de ventas</h1>

            <form action="" method="POST">
                Factura:
                <input type="number" id="factura" name="factura" placeholder="Factura">
                Fecha:  
                <input type="date" name="fecha" placeholder="Fecha">
                Valor venta:    
                <input type="number" name="valor" placeholder="Valor de la venta">
                <br>
                Detalles de venta:   
                <input type="text" id="detalles" name="detalle" placeholder="detalles de la venta">

                <div class="container">
                    <div class="cont-cedula">
                    Cedula:
                    <input type="number" id="cedula" name="cedula" value="<?= $cedula ?>" placeholder="Cedula del cliente"><br>
                    <button type="submit" name="buscarCliente">Buscar Cliente</button>
                    
                </div>
                    <div class="sec1">
                    Nombre:
                    <input type="text" name="nombre" value="<?= $nombre ?>" placeholder="Nombre del cliente" readonly>
                    Direccion:  
                    <input type="text" name="direccion" value="<?= $direccion ?>" placeholder="Direccion del cliente" readonly>
</div>

                    <div>
                    
                    
                    Ciudad: 
                    <input type="text" name="ciudad" value="<?= $ciudad ?>" placeholder="Ciudad" readonly>
                    telefono:
                    <input type="text" name="telefono" value="<?= $telefono ?>" placeholder="Telefono del cliente" readonly>
                    </div>
                   
                    </div>
                    <div class="sec2">
                    Email:
                    <input type="text" name="email" value="<?= $email ?>" placeholder="Correo electronico del cliente" readonly>
                    <div id="btn">
                    <button type="submit">Nueva venta</button>
                </div>
                    </div>

                    
                </div>
            </form>
            
        </div>
    </div>
    <div class="users-table">
        <h2>Ventas Registrados:</h2>
        <table>
             <thead>
                 <tr>
                     <th><h2>N factura</h2></th>
                     <th><h3>Detalle venta</h3></th>
                     <th><h3>Nombre del cliente</h3></th>
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
                        <th><button id="estado">ESTADO</button></th>
                        <th><button id="pagos2">PAGOS</button></th>
                        
                    </tr>
                <?php endwhile; ?>
             </tbody>
        </table>
    </div>
</body>

</html>