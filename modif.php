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


$consulta = "SELECT * FROM tusuarios WHERE usuario='$usuario'";
$resultado = mysqli_query($conexion, $consulta);

if (mysqli_num_rows($resultado) > 0) {
    
    $query = "UPDATE tusuarios SET contra='$contra' WHERE usuario='$usuario'";
    if (mysqli_query($conexion, $query)) {
        echo "Contraseña actualizada con éxito";
    } else {
        echo "Problemas en el cambio: " . mysqli_error($conexion);
    }
    header('Location: ejemplo.html');

} else {
    echo "El usuario no existe.";
}


mysqli_close($conexion);

?>
