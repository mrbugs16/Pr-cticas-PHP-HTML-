<?php

include 'tables1.php';

$categorias = array_map(function ($producto) {
    return $producto['tipo'];
}, $productos);


$categorias = array_unique($categorias);


$tipoFiltro = "";
if (isset($_GET['tipo'])) {
    $tipoFiltro = $_GET['tipo'];

    $productos = array_filter($productos, function ($producto) use ($tipoFiltro) {
        return $producto['tipo'] == $tipoFiltro;
    });
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Tablas PHP</title>
    <style>
        body {
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
        }

        td,
        th {
            padding: 12px 15px;
        }

        tr {
            border-bottom: 1px solid #1645c9;
        }

        tbody tr:nth-child(even) {
            background-color: #d0cfcf;
        }
    </style>
</head>

<body>
    <h1>Productos Tecnológicos</h1>
    <div>
        <ul>
            <?php foreach ($categorias as $categoria) { ?>
                <li>
                    <!-- ❌ Antes (nombre incorrecto) -->
                    <!-- <a href="tablas1_css_get.php?tipo=<?= $categoria ?>"> -->

                    <!-- ✅ Después (nombre correcto) -->
                    <a href="<?= $_SERVER['PHP_SELF'] ?>?tipo=<?= $categoria ?>">
                        <?= $categoria ?>
                    </a>
                </li>
            <?php } ?>
        </ul>
    </div>
    <table style="border-collapse: collapse;">
        <tr style="background-color: #1645c9; color: #ffffff; text-align: left; font-weight: bold;">
            <th>Tipo</th>
            <th>Nombre</th>
            <th>Marca</th>
            <th>Modelo</th>
            <th>Precio</th>
            <th>Descuento</th>
            <th>Precio final</th>
        </tr>
        <tbody>
            <?php foreach ($productos as $key => $producto) { ?>
                <tr>
                    <td>
                        <?= $producto['tipo']; ?>
                    </td>
                    <td>
                        <?= $producto['nombre']; ?>
                    </td>
                    <td>
                        <?= $producto['marca']; ?>
                    </td>
                    <td>
                        <?= $producto['modelo']; ?>
                    </td>
                    <td>
                        <?= '$ ' . number_format($producto['precio'], 2) . ' MXN'; ?>
                    </td>
                    <td>
                        <?= '% ' . $producto['descuento']; ?>
                    </td>
                    <td>
                        <?= '$ ' . number_format($producto['precio'] * (1.0 - $producto['descuento'] / 100.0), 2) . ' MXN'; ?>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>

</html>