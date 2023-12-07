<?php

// hacemos conexion con la bd
include("../conexion.php");
$con = connection();

// capturamos los datos que se ingresan desde el formulario
$Cedula = $_POST['cedula'];
$Nombre = $_POST['nombre'];
$Apellidos = $_POST['apellidos'];
$Direccion = $_POST['direccion'];
$Ciudad = $_POST['ciudad'];
$Telefono = $_POST['telefono'];
$Email = $_POST['email'];
$Contacto = $_POST['contacto'];
$Telefonoc = $_POST['telefonoc'];

// hacemos una consulta, para insertar los datos
$sql = "INSERT INTO clientes VALUES ('$Cedula', '$Nombre', '$Apellidos', '$Direccion', '$Ciudad','$Telefono', '$Email', '$Contacto', '$Telefonoc')";
$query = mysqli_query($con, $sql);

// Si fue exitoso, nos redirecciona al index
if ($query){
    Header("Location: ../clientes/clientes.php");
} else {

}
?>