<?php

$conn = new mysqli("localhost", "root", "", "p3-act2");


if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}


$usuario = $_POST['usuario'];


$stmt = $conn->prepare("SELECT usuario FROM tusuarios WHERE usuario = ?");
$stmt->bind_param("s", $usuario);
$stmt->execute();
$stmt->store_result();


if ($stmt->num_rows > 0) {
    $stmt->bind_result( $usuario);
    header("Location: Index_proin.html");



} else {
    echo "Usuario no encontrado.";  
  
 }
 

$stmt->close();
$conn->close();

?>