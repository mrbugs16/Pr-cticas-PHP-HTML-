<?php

session_start();
//Revisar si existe la variable
if(!isset($_SESSION["usuario"])){
    header("Location: login.php");
    exit; //Termina el script, para que no se ejecute el resto del codigo
}

echo "<h1>Mis tareas</h1>";

?> 
<a href="logout.php">Cerrar sesión</a>

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
        <a href="logout.php"><div class="col-2 btn btn-danger">Cerrar sesión</a>
    </nav>
        
    <section class="row justify-content-center">

        <form method="POST" class="col-12 col-md-6" action="tareasCNT.php"> id="frm_reg">

<div class="mb-3">
    <label class="form-label" for="titulo">Título de la tarea</label>
    <input class="form-control" id="titulo" name="titulo" placeholder="Ingrese el título de la tarea">
</div>
            
<div class="mb-3">
</div>

<div class="mb-3">
    <label for="usuario" class="form-label">Usuario</label>
    <input class="form-control" id="usuario" name="usuario" placeholder="Ingrese su usuario">
</div>

<div class="mb-3">
    <label for="password" class="form-label">Contraseña</label>
    <input class="form-control" id="password" name="password" type="password" placeholder="Ingrese su password">
</div>

<div class="mb-3">
    <label for="confirma" class="form-label">Confirmar Contraseña</label>
    <input class="form-control" id="confirma" name="confirma" type="password" placeholder="Confirme su contraseña">
</div>

<div class="form-check mb-3">
    <input class="form-check-input" type="checkbox" value="1" name="suscrito" id="suscrito">
    <label class="form-check-label" for="suscrito">Deseo recibir correos relacionados</label>
</div>

<button type="submit" class="btn btn-success">Registrar</button>

        </form>


<section>

    </main>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
</body>

</html>