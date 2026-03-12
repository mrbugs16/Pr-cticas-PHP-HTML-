<?php

//Antes de utilizar el arreglo $_SESSION, se debe iniciar la sesion, para eso se utiliza la funcion session_start(), que inicia una sesion o reanuda la sesion actual, si ya existe una sesion iniciada, entonces se reanuda esa sesion, si no existe una sesion iniciada, entonces se inicia una nueva sesion, y se crea un nuevo id de sesion para el usuario, que es un identificador unico que se utiliza para identificar al usuario en el servidor, y se almacena en una cookie en el navegador del usuario, para que el servidor pueda identificar al usuario en las siguientes solicitudes que haga el usuario al servidor
session_start();

$_SESSION[""] = [];

header("Location: login.php");
exit; //Termina el script, para que no se ejecute el resto del codigo
