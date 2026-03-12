<?php include "db_cnx.php"; ?>
<html>
<head>
    <title>Lista de Usuarios</title>
</head>
<body>
    <h2>Usuarios registrados</h2>

    <table border="1">
        <tr>
            <th>Nombre</th>
            <th>Correo</th>
            <th>Usuario</th>
        </tr>
        <?php
        $consulta = $cnx->query("SELECT nombre, email, usuario FROM usuarios");

        // fetchAll regresa TODO el resultado como arreglo asociativo
        $filas = $consulta->fetchAll(PDO::FETCH_ASSOC);

        foreach ($filas as $fila) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($fila['nombre'])  . "</td>";
            echo "<td>" . htmlspecialchars($fila['email'])   . "</td>";
            echo "<td>" . htmlspecialchars($fila['usuario']) . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>
