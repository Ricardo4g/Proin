<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuarios</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #ddd;
        }
        h1 {
            text-align: center;
            color: #333;
        }

        a:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h1>Lista de Usuarios</h1>
    <table>
        <thead>
            <tr>
                <th>Usuario</th>
                <th>Contraseña</th>
            </tr>
        </thead>
        <tbody>
        <?php
        
        $conn = new mysqli('localhost', 'root', '', 'p3-act2');
        if ($conn->connect_error) {
            die("Conexión fallida: " . $conn->connect_error);
        }

        
        $sql = "SELECT usuario, contra FROM tusuarios ORDER BY usuario ASC";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
        
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['usuario']) . "</td>";
                echo "<td>" . htmlspecialchars($row['contra']) . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='2'>No hay usuarios registrados.</td></tr>";
        }

        $conn->close();
        ?>
        </tbody>
    </table>
    <a href="Index.html">Volver al Inicio</a>
</body>
</html>

  
