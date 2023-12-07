<?php 
include("../conexion.php");
$con = connection();

$sql = "SELECT * FROM clientes";
$query = mysqli_query($con, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Ingresa datos clientes">
    <meta name="keywords" content="html, css, bases de datos, php">
    <meta name="author" content="Yesid"/>
    <meta name="copyright" content="Yesid">
    <link rel="stylesheet" href="../css/styleClientes.css?v=<?php echo time(); ?>">
    <link rel="shortcut icon" href="../img/acceso.png" type="image/x-icon">
    <title>Clientes registrados</title>
    
</head>
<body>
    <!-- menus de opciones y el logo -->
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
    <div class="users-table"> 
    <h1>Clientes Registrados:</h1>
    
    <table>
        <thead>
            <tr>
                <th><h3>Cedula</h3></th>
                <th><h3>Nombre</h3></th>
                <th><h3>Apellidos</h3></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        

        <tbody>
        <!-- recorremos los datos que se se obtienen al hacer la consulta a la BD -->
        <?php  while($row = mysqli_fetch_array($query)): ?>
                <tr>
                    <th><?=$row["Cedula"]?></th>
                    <th><?=$row["Nombre"]?></th>
                    <th><?=$row["Apellidos"]?></th>
                    <th></th>
                    <th></th>
                    <!-- Botones para que se puedan hacer diferentes acciones sobre los datos presentados -->
                    <th><a  href="../ventas/ventas.php" class="users-table--consult">+ Venta</a></th>
                    <th><a  href="../clientes/estadoCliente.php" class="users-table--edit">Estado</a></th>
                    <th><a  href="../pagos/pagos.php "class="users-table--delete">Pagos</a></th>
                </tr>
                <?php endwhile; ?>
        </tbody>
    </table>
</div>