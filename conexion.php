<?php 

// Creamos una funcion para hacer la conexion a la BD
function connection(){
    $host = "localhost";
    $user = "root";
    $pass = "";

    $bd = "sistema_recaudos";

    $connect = mysqli_connect($host, $user, $pass);


    mysqli_select_db($connect, $bd);

    // Verificamos si la conexión fue exitosa
    if (!$connect) {
        die("Error de conexión: " . mysqli_connect_error());
    }

    return $connect;
}
?>
