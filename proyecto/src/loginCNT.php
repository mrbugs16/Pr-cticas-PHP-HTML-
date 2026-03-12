<?php
include_once "db_cnx.php"; //un include es como si copiara y pegara el codigo 
                           // del archivo incluido, es decir, 
                           // es como si el codigo de db_cnx.php estuviera aqui mismo

//cnx es la variable que se creo en db_cnx.php, por lo que ya tenemos la conexion a la base de datos                       

$statement = $cnx->prepare("SELECT  usuario,
                                    password
                            FROM    usuarios
                            WHERE   usuario = ?");

$statement->execute([
    $_POST["user"], 
]);

$row = $statement->fetch(PDO::FETCH_ASSOC); //Solo se recupera un registro, si se recupera mas de uno, se ignoran los demas, 
                                            //ya que busco por una llave unica, que es el usuario
//Si no existe el usuario enviado en $POST["user"], entonces $row sera false, por lo que se valida eso primero
if($row == false){
    session_start();
    $_SESSION["errmsg"] = "Las creedenciales no son validas";
    header("Location: login.php");
    exit; //Termina el script, para que no se ejecute el resto del codigo
}

$es_valido = password_verify($_POST["password"], $row["password"]);

//Si no es valido, se redirige al login con un mensaje de error, para eso se utiliza una variable de sesion, que es un mecanismo para almacenar datos en el servidor y asociarlos a un usuario especifico, en este caso se almacena el mensaje de error en la variable de sesion "errmsg", y luego se redirige al login.php, donde se muestra el mensaje de error si existe la variable de sesion "errmsg"
if(!$es_valido){
    session_start();
    $_SESSION["errmsg"] = "Las creedenciales no son validas";
    header("Location: login.php");
    exit; //Termina el script, para que no se ejecute el resto del codigo
}

//Si es valido, se inicia una sesion para el usuario, y se redirige a la pagina de tareas.php, donde se muestra la lista de usuarios registrados
session_start();
$_SESSION["user"] = $row["usuario"]; //Se almacena el nombre de usuario en la variable de sesion "user", para que se pueda utilizar en otras paginas, por ejemplo para mostrar el nombre de usuario en la pagina de tareas.php
header("Location: tareas.php");
exit; //Termina el script, para que no se ejecute el resto del codigo