<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>

    <!-- Contenedor principal centrado -->
    <main class="d-flex justify-content-center align-items-center vh-100">

        <!-- Tarjeta del login -->
        <div class="card p-4" style="width: 400px;">

            <h3 class="text-center mb-4">Iniciar Sesión</h3>

            <!-- Caja azul con los campos -->
            <div class="border border-primary rounded p-3 mb-3">

                <!-- Campo Usuario -->
                <div class="mb-3">
                    <label for="inputUsuario" class="form-label">Usuario</label>
                    <input type="text" class="form-control" id="inputUsuario" placeholder="nombre@example.com">
                </div>

                <!-- Campo Contraseña -->
                <div class="mb-0">
                    <label for="inputPassword" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="inputPassword" placeholder="Contraseña">
                </div>

            </div>

            <!-- Boton Login -->
            <div class="text-center">
                <button type="button" class="btn btn-primary">Login</button>
            </div>

        </div>

    </main>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>