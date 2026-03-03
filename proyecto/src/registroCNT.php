<?php
session_start();

// Verificar que el formulario fue enviado por POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: registro.php');
    exit();
}

// Validación de datos
if (!isset($_POST['nombre']) || !preg_match(pattern: "/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+)$/",
                                 subject: $_POST['nombre'])){
                            echo "El nombre no es valido. Solo se permiten letras y espacios.";
                            exit();
                                 }

if (!isset($_POST["correo"]) || !filter_var(value: $_POST["correo"], filter: FILTER_VALIDATE_EMAIL)) {
    echo "El correo no es válido.";
    exit();
}

//validacion de contraseña, poner por lo menos 8 caracteres, una mayuscula, una minuscula, un numero y un caracter especial






$nombre     = trim($_POST['nombre']   ?? '');
$email      = trim($_POST['email']    ?? '');
$usuario    = trim($_POST['usuario']  ?? '');
$password   = $_POST['password']      ?? '';
$suscripcion = isset($_POST['suscripcion']) ? 1 : 0;

if (empty($nombre) || empty($email) || empty($usuario) || empty($password)) {
    echo "Error: Todos los campos son obligatorios.";
    die();
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Error: El formato del email no es válido.";
    die();
}

// Conexión a la base de datos utilizando PDO
try {
    $cnx = new PDO(
        dsn: "mysql:host=lamp_db;dbname=arqweb;charset=utf8mb4",  // ✅ separadores con ";"
        username: "ougalde",
        password: "37863"  // ✅ contraseña corregida
    );
    $cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Hash seguro de la contraseña
    $passwordHash = password_hash($password, PASSWORD_BCRYPT);

    // Guardar los datos en la base de datos
    $statement = $cnx->prepare(  // ✅ $ agregado
        query: "INSERT INTO usuarios (nombre, email, usuario, password, suscripcion)
                VALUES (?, ?, ?, ?, ?)"  // ✅ sin id_usuario (AUTO_INCREMENT), campo usuario agregado
    );

    $parametros = [
        $nombre,
        $email,
        $usuario,     // ✅ campo agregado
        $passwordHash,
        $suscripcion
    ];

    $statement->execute($parametros);

    // Guardar datos del usuario en sesión
    $_SESSION['id_usuario'] = $cnx->lastInsertId();
    $_SESSION['nombre']     = $nombre;
    $_SESSION['usuario']    = $usuario;

    // Redirigir a página de bienvenida ✅
    header('Location: pruebaSesiones.php');
    exit();

} catch (Exception $e) {
    echo "Error al procesar el registro: " . $e->getMessage();
    die();  // ✅ die() agregado
}
