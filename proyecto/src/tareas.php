<?php

session_start();
//Revisar si existe la variable
// if (!isset($_SESSION["user"])) {
//     header("Location: login.php");
//     exit; //Termina el script, para que no se ejecute el resto del codigo
// }

// Bypass temporal de login para poder ver el despliegue en localhost
if (!isset($_SESSION["user"]) || trim((string)$_SESSION["user"]) === "") {
    $_SESSION["user"] = "santiago";
}

include_once "db_cnx.php";

$statement = $cnx->prepare(
    "SELECT  t.id_tarea,
            t.fecha_creacion,
            t.descripcion,
            t.fechafinalizada,
            t.fecha_vencimiento
     FROM   tareas t
     INNER JOIN usuarios u ON u.id_usuario = t.id_usuario
     WHERE  u.usuario = ?
     ORDER BY t.fecha_creacion DESC"
);
$statement->execute([$_SESSION["user"]]);
$tareas = $statement->fetchAll(PDO::FETCH_ASSOC);

?> 
<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>

    <main class="container" style="min-height: 100vh">

    <nav class="row">
        <h1 class="col"> Tareas </h1>
        <div class="col-4 text-end">
            <span class="me-2">Usuario: <?php echo htmlspecialchars((string)$_SESSION["user"]); ?></span>
            <a class="btn btn-danger" href="logout.php">Cerrar sesión</a>
        </div>
    </nav>
        
    <section class="row justify-content-center">

        <form method="POST" class="col-12 col-md-6" action="tareasCNT.php" id="frm_tareas">

<div class="mb-3">
    <label class="form-label" for="descripcion">Descripción</label>
    <textarea class="form-control" id="descripcion" name="descripcion" rows="3" placeholder="Ingrese la descripción de la tarea" required></textarea>
</div>
            
<div class="mb-3">
    <label class="form-label" for="fecha_vencimiento">Fecha de vencimiento (opcional)</label>
    <input class="form-control" id="fecha_vencimiento" name="fecha_vencimiento" type="date">
</div>

<button type="submit" class="btn btn-success">Agregar tarea</button>

        </form>

        <section class="col-12 mt-4">
            <h2 class="h4">Mis tareas registradas</h2>
            <div class="table-responsive">
                <table class="table table-striped table-bordered align-middle">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Fecha creación</th>
                            <th>Descripción</th>
                            <th>Vencimiento</th>
                            <th>Finalizada</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (count($tareas) === 0): ?>
                            <tr>
                                <td colspan="5">No hay tareas aún.</td>
                            </tr>
                        <?php else: ?>
                            <?php foreach ($tareas as $t): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($t["id_tarea"]); ?></td>
                                    <td><?php echo htmlspecialchars($t["fecha_creacion"]); ?></td>
                                    <td><?php echo nl2br(htmlspecialchars($t["descripcion"])); ?></td>
                                    <td><?php echo htmlspecialchars($t["fecha_vencimiento"] ?? ""); ?></td>
                                    <td><?php echo htmlspecialchars($t["fechafinalizada"] ?? ""); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </section>

    </main>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
</body>

</html>