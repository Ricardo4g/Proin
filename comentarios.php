<?php
ob_start();


echo "El usuario ingresado es  <br/>";
echo htmlspecialchars($_REQUEST['Nombre']);
echo "<br/>";
echo "El password ingresado es <br/>";
echo htmlspecialchars($_REQUEST['correo']);


$conexion = mysqli_connect("localhost", "root", "", "p3-act2") 
    or die("No se pudo conectar a la Base de Datos");


$Nombre = mysqli_real_escape_string($conexion, $_REQUEST['Nombre']);
$correo = mysqli_real_escape_string($conexion, $_REQUEST['correo']);
$telefono = mysqli_real_escape_string($conexion, $_REQUEST['telefono']);
$comentario = mysqli_real_escape_string($conexion, $_REQUEST['comentario']);


$query = "INSERT INTO tcontacto (Nombre, correo, telefono, comentario) VALUES ('$Nombre', '$correo', '$telefono', '$comentario')";


if (mysqli_query($conexion, $query)) {
    echo "Registro insertado con éxito";
} else {
    echo "Problemas en el insert: " . mysqli_error($conexion);
}

mysqli_close($conexion);

header('Location: Index_proin.html');
    
?>