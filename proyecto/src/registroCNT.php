<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: registro.php');
    exit();
}

if (!isset($_POST['nombre']) || !preg_match(pattern: "/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+)$/",
                                 subject: $_POST['nombre'])){
                            echo "El nombre no es valido. Solo se permiten letras y espacios.";
                            exit();
                                 }

if (!isset($_POST["correo"]) || !filter_var(value: $_POST["correo"], filter: FILTER_VALIDATE_EMAIL)) {
    echo "El correo no es válido.";
    exit();
}

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

try {
    $cnx = new PDO(
        dsn: "mysql:host=lamp_db;dbname=arqweb;charset=utf8mb4", 
        username: "ougalde",
        password: "37863"  
    );
    $cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    
    $passwordHash = password_hash($password, PASSWORD_BCRYPT);

    $statement = $cnx->prepare(  
        query: "INSERT INTO usuarios (nombre, email, usuario, password, suscripcion)
                VALUES (?, ?, ?, ?, ?)" 
    );

    $parametros = [
        $nombre,
        $email,
        $usuario,    
        $passwordHash,
        $suscripcion
    ];

    $statement->execute($parametros);
    $_SESSION['id_usuario'] = $cnx->lastInsertId();
    $_SESSION['nombre']     = $nombre;
    $_SESSION['usuario']    = $usuario;

    header('Location: pruebaSesiones.php');
    exit();

} catch (Exception $e) {
    echo "Error al procesar el registro: " . $e->getMessage();
    die();  
}
