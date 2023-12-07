<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Menu de Opciones">
    <meta name="keywords" content="html, css, bases de datos, php">
    <meta name="author" content="Yesid"/>
    <meta name="copyright" content="Yesid">
    <link rel="stylesheet" href="css/styleInicio.css?v=<?php echo time(); ?>">
    <link rel="shortcut icon" href="img/acceso.png" type="image/x-icon">
    <title>Modulo de pagos</title>
    
</head>
<body>
    <header>
        <img src="img/logo2.png" alt="logo">
       
    </header>
    <main>
        <h1>Sistema de Ventas y Recaudos</h1>

        <!-- creamos una seccion mostrar el menu de opciones para el vendedor -->
        <section>
        
            <div>
               
                <a href="clientes/clientes.php"><img src="img/cliente.png" alt="img"></a>
                
                <a class="btn btn-clientes" href="clientes/clientes.php">CLIENTES</a>
            </div>
            <div>
                <a href="../ventas/ventas.php" ><img src="img/carrito-de-compras.png" alt="img"></a>
                
                <a href="ventas/ventas.php" class="btn btn-ventas">VENTAS</a>
            </div>
            <div>
                <a href="pagos/pagos.php" ><img src="img/metodo-de-pago.png" alt="img"></a>
                
                <a href="pagos/pagos.php" class="btn btn-pagos" >PAGOS</a>
            </div>
            <div>
                <a href="clientes/estadoCliente.php"><img src="img/proyecto.png" alt="img"></a>
                <a href="clientes/estadoCliente.php" class="btn btn-gestion">GESTIÓN</a>
            </div>
        
    </section>
    </main>

</body>
</html>