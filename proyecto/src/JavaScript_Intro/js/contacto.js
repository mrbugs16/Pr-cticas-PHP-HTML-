// Datos en memoria (arreglo de objetos). Cada contacto: id_contacto, nombre, edad, correo.
let contactos = [
    {
        id_contacto: 1,
        nombre: "Juan Perez",
        edad: 28,
        correo: "juan.perez@example.com"
    },
    {
        id_contacto: 2,
        nombre: "Maria Garcia",
        edad: 34,
        correo: "maria.garcia@example.com"
    },
    {
        id_contacto: 3,
        nombre: "Carlos Rodriguez",
        edad: 41,
        correo: "carlos.rodriguez@example.com"
    },
    {
        id_contacto: 4,
        nombre: "Ana Martinez",
        edad: 22,
        correo: "ana.martinez@example.com"
    },
    {
        id_contacto: 5,
        nombre: "Luis Sanchez",
        edad: 36,
        correo: "luis.sanchez@example.com"
    }
];

// Quita de la lista el contacto cuyo id coincide (filter devuelve un arreglo nuevo).
function eliminarContacto(id) {
    contactos = contactos.filter(function (contacto) {
        return contacto.id_contacto !== id;
    });
}

// Despues de pintar la tabla, cada boton "Eliminar" necesita su click (los botones son nuevos cada vez).
function addEventEliminarContacto() {
    const botonesEliminar = document.querySelectorAll(".btn_eliminar");
    botonesEliminar.forEach(function (boton) {
        boton.addEventListener("click", function (e) {
            const id = Number(e.currentTarget.getAttribute("data-id"));
            eliminarContacto(id);
            mostrarContactos();
        });
    });
}

// Recorre contactos con map, arma filas HTML como string y las inserta en #tbl_data.
function mostrarContactos() {
    const cuerpoTabla = contactos.map(function (contacto) {
        const correoTexto = contacto.correo ? contacto.correo : "—";
        return `<tr>
            <td>${contacto.id_contacto}</td>
            <td>${contacto.nombre}</td>
            <td>${contacto.edad}</td>
            <td>${correoTexto}</td>
            <td>
                <button type="button" data-id="${contacto.id_contacto}" class="btn_eliminar">
                    Eliminar
                </button>
            </td>
        </tr>`;
    }).join("");

    const tblBd = document.getElementById("tbl_data");
    if (!tblBd) {
        return;
    }
    tblBd.innerHTML = cuerpoTabla;
    addEventEliminarContacto();
}

// Lee los inputs del formulario por id, valida, evita ID duplicado, hace push al arreglo y refresca la tabla.
function agregarContactoDesdeFormulario() {
    const inputId = document.getElementById("idcontacto");
    const inputNombre = document.getElementById("nombre");
    const inputEdad = document.getElementById("edad");

    if (!inputId || !inputNombre || !inputEdad) {
        return;
    }

    const id = Number(inputId.value);
    const nombre = inputNombre.value.trim();
    const edad = Number(inputEdad.value);

    // Validacion basica antes de agregar (trim en nombre, numeros validos).
    if (!nombre || Number.isNaN(id) || id < 1 || Number.isNaN(edad) || edad < 0) {
        alert("Completa ID, nombre y edad con valores validos.");
        return;
    }

    // No permitir dos contactos con el mismo id_contacto.
    const existeId = contactos.some(function (c) {
        return c.id_contacto === id;
    });
    if (existeId) {
        alert("Ya existe un contacto con ese ID.");
        return;
    }

    // Nuevo elemento al final del arreglo; correo vacio porque el formulario no lo pide.
    contactos.push({
        id_contacto: id,
        nombre: nombre,
        edad: edad,
        correo: ""
    });

    // Limpia el formulario para poder cargar otro contacto.
    inputId.value = "";
    inputNombre.value = "";
    inputEdad.value = "";

    mostrarContactos();
}

// Boton "Mostrar Contactos": dispara el render de la tabla con los datos actuales.
const btnLoad = document.getElementById("load");
if (btnLoad) {
    btnLoad.addEventListener("click", function () {
        mostrarContactos();
    });
}

// Boton "Agregar a la lista": ejecuta la misma funcion que usa el submit del formulario.
const btnAgregar = document.getElementById("btn_agregar");
if (btnAgregar) {
    btnAgregar.addEventListener("click", function () {
        agregarContactoDesdeFormulario();
    });
}


