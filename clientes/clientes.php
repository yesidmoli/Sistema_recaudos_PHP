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
    <title>Creacion de clientes</title>
    
</head>
<body>
    <!-- menus de opciones y el logo -->
    <header>
        <img src="../img/logo2.png" alt="logo">
        <div class="btns-header">
            <a class="btn-inicio" href="../index.php">INICIO</a>
            <a class="btn-cliente" href="clientes.php">CLIENTES</a>
            <a class="btn-ventas" href="../ventas/ventas.php">VENTAS</a>
            <a class="btn-pagos" href="../pagos/pagos.php">PAGOS</a>
            <a class="btn-gestion" href="../clientes/estadoCliente.php">GESTION</a>
            
        </div>
    </header>
    <main>
        <section>
            <!-- modulo para formulario del registro de los clientes, se crearon los campos para diligenciar -->
        <h1>MODULO DE CLIENTES</h1>
        <div class="perfil"><img class="perfil-img" src="../img/avatar.png" alt="perfil"></div>
        <form action="insertar.php" method="POST">
           
            
            <div class="cedula-img">
                Cedula
                <input type="text" name="cedula" placeholder="Digite la cedula">
              
            </div>
            <div>
                Nombres
                <input type="text" name="nombre" placeholder="Nombres"> 
            </div>
            
            <div>
                Apellidos
                <input type="text" name="apellidos" placeholder="Apellidos"> 
            </div>
            
            <div>
                Direccion
                <input type="text" name="direccion" placeholder="Direccion">
                <label for="">Telefono</label>
    
                <input type="text" name="telefono" placeholder="telefono">
            </div>
           
            <div>
                Ciudad
                <input type="text" name="ciudad" placeholder="ciudad">
                <label for="">Email</label>
                
                <input type="text" name="email" placeholder="Email">
            </div>
            <div>
                Contacto
                <input type="text" name="contacto" placeholder="Contacto">
                <label for="">TelefonoC</label>
                
                <input type="text" name="telefonoc" placeholder="Telefono C">

            </div>
            

            <center><button class="nuevo-cliente" type="submit">Nuevo Cliente</button></center>
        </form>
    </section>
    </main>
    <div class="btn-end">
        <a class="btn-registro" href="registroClientes.php">Clientes Registrados</a>
    </div>
    

</body>
</html>