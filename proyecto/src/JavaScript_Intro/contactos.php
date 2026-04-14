<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JavaScript</title>
</head>
<body>
    <h1>Contactos</h1>

    <!-- Formulario: el JS lee los valores por id (idcontacto, nombre, edad) y los agrega al arreglo contactos -->
    <section style="margin: 15px 0; max-width: 420px;">
        <h2>Agregar contacto</h2>
        <!-- method get + action # solo para practica; el envio real lo intercepta JS (submit) -->
        <form id="form_contacto" action="#" method="get">
            <div style="margin-bottom: 8px;">
                <label for="idcontacto">ID contacto</label><br>
                <!-- id unico para que getElementById en contacto.js encuentre el campo -->
                <input type="number" id="idcontacto" name="idcontacto" min="1" required>
            </div>
            <div style="margin-bottom: 8px;">
                <label for="nombre">Nombre</label><br>
                <input type="text" id="nombre" name="nombre" required>
            </div>
            <div style="margin-bottom: 8px;">
                <label for="edad">Edad</label><br>
                <input type="number" id="edad" name="edad" min="0" max="150" required>
            </div>
            <!-- type="button" evita enviar el formulario al hacer clic; igual se puede enviar con Enter (submit) -->
            <button type="button" id="btn_agregar">Agregar a la lista</button>
        </form>
    </section>

    <!-- Al hacer clic, contacto.js pinta en la tabla el arreglo contactos -->
    <div style="margin:15px 0;">
        <button id="load" type="button">Mostrar Contactos</button>
    </div>

    <!-- tbody vacio: las filas se generan en JS con innerHTML (mostrarContactos) -->
    <table border="1">
        <thead>
            <tr>
                <th>ID Contacto</th>
                <th>Nombre</th>
                <th>Edad</th>
                <th>Correo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody id="tbl_data"></tbody>
    </table>

    <!-- Logica del formulario, tabla y botones en js/contacto.js -->
    <script src="js/contacto.js"></script>
</body>
</html>
