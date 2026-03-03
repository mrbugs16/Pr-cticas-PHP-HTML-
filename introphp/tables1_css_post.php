<?php

include __DIR__ . '/tables1.php';

$categorias = array_map(function ($producto) {
    return $producto['tipo'];
}, $productos);

$categorias = array_unique($categorias);

// FILTRO POR CATEGORIA
$tipoFiltro = "";
if (isset($_GET['tipo'])) {
    $tipoFiltro = $_GET['tipo'];
    $productos = array_filter($productos, function ($producto) use ($tipoFiltro) {
        return $producto['tipo'] == $tipoFiltro;
    });
}

// FILTRO DE BUSQUEDA
$busqueda = "";
if (isset($_GET['buscar']) && $_GET['buscar'] !== "") {
    $busqueda = $_GET['buscar'];
    $productos = array_filter($productos, function ($producto) use ($busqueda) {
        // BUSCAR NOMBRE, MARCA, MODELO, ETC
        return stripos($producto['nombre'], $busqueda) !== false ||
            stripos($producto['marca'], $busqueda) !== false ||
            stripos($producto['modelo'], $busqueda) !== false ||
            stripos($producto['tipo'], $busqueda) !== false;
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

        /* Estilos para el buscador */
        .buscador {
            margin: 20px 0;
            display: flex;
            gap: 10px;
            align-items: center;
        }

        .buscador input[type="text"] {
            padding: 10px 15px;
            font-size: 16px;
            border: 2px solid #1645c9;
            border-radius: 5px;
            width: 300px;
            outline: none;
        }

        .buscador input[type="text"]:focus {
            border-color: #0d2f8a;
            box-shadow: 0 0 5px rgba(22, 69, 201, 0.3);
        }

        .buscador button {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #1645c9;
            color: #ffffff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .buscador button:hover {
            background-color: #0d2f8a;
        }

        .buscador a {
            padding: 10px 20px;
            font-size: 14px;
            color: #1645c9;
            text-decoration: none;
        }

        .buscador a:hover {
            text-decoration: underline;
        }

        .sin-resultados {
            padding: 20px;
            color: #cc0000;
            font-size: 18px;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <h1>Productos Tecnológicos</h1>

    <!-- Buscador -->
    <div class="buscador">
        <form method="GET" action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>"
            style="display: flex; gap: 10px; align-items: center;">
            <input type="text" name="buscar" placeholder="Buscar producto..."
                value="<?= htmlspecialchars($busqueda) ?>">
            <!-- Si hay un filtro de tipo activo, mantenerlo al buscar -->
            <?php if ($tipoFiltro !== "") { ?>
                <input type="hidden" name="tipo" value="<?= htmlspecialchars($tipoFiltro) ?>">
            <?php } ?>
            <button type="submit">🔍 Buscar</button>
            <!-- Botón para limpiar búsqueda -->
            <?php if ($busqueda !== "" || $tipoFiltro !== "") { ?>
                <a href="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>">✖ Limpiar filtros</a>
            <?php } ?>
        </form>
    </div>

    <!-- Índice de categorías -->
    <div>
        <ul>
            <?php foreach ($categorias as $categoria) { ?>
                <li>
                    <a href="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>?tipo=<?= htmlspecialchars($categoria) ?>">
                        <?= htmlspecialchars($categoria) ?>
                    </a>
                </li>
            <?php } ?>
        </ul>
    </div>

    <!-- Tabla de productos -->
    <table style="border-collapse: collapse;">
        <thead>
            <tr style="background-color: #1645c9; color: #ffffff; text-align: left; font-weight: bold;">
                <th>Tipo</th>
                <th>Nombre</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Precio</th>
                <th>Descuento</th>
                <th>Precio final</th>
            </tr>
        </thead>
        <tbody>
            <?php if (count($productos) > 0) { ?>
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
            <?php } else { ?>
                <tr>
                    <td colspan="7" class="sin-resultados">
                        No se encontraron productos que coincidan con "
                        <?= htmlspecialchars($busqueda) ?>"
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>

</html>