<?php

echo "El usuario ingresado es  <br/>";
echo htmlspecialchars($_REQUEST['usuario']);
echo "<br/>";
echo "El password ingresado es <br/>";
echo htmlspecialchars($_REQUEST['contra']);


$conexion = mysqli_connect("localhost", "root", "", "p3-act2") 
    or die("No se pudo conectar a la Base de Datos");


$usuario = mysqli_real_escape_string($conexion, $_REQUEST['usuario']);
$contra = mysqli_real_escape_string($conexion, $_REQUEST['contra']);


$query = "INSERT INTO tusuarios (usuario, contra) VALUES ('$usuario', '$contra')";


if (mysqli_query($conexion, $query)) {
    echo "Registro insertado con éxito";
} else {
    echo "Problemas en el insert: " . mysqli_error($conexion);
}

mysqli_close($conexion);

header('Location: Index_proin.html');
    
?>

