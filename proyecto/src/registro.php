<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>

    <main class="container" style="min-height: 100vh; display: flex; flex-direction: column; justify-content: center;">

        <h1 class="text-center my-4">Registro de Usuario</h1>
    
    <section class="row justify-content-center">

        <form method="POST" class="col-12 col-md-6">
<div class="mb-3">
            <label for="user" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="user" name="nombre" id="nombre" placeholder="Ingrese su nombre">
</div>

<div class="mb-3">
    <label for="correo" class="form-label">Correo electrónico</label>
    <input class="form-control" id="correo" name="correo" placeholder="Ingrese su correo electrónico">
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