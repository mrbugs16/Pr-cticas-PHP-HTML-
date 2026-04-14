console.log("Archivo home.js cargado");

const nombres = ["Juan", "Maria", "Pedro", "Ana", "Luis"];
const personas = [
    {
        nombre: "Juan",
        edad: 20,
        email: "juan@gmail.com"
    },
    {
        nombre: "Maria",
        edad: 25,
        email: "maria@gmail.com"
    }
];

function informacionPersona(nombre, edad, email) {
    return `Nombre: ${nombre} Edad: ${edad} Email: ${email}`;
}

function renderTablaPersonas() {
    const tblBody = document.getElementById("tbl_datos");
    if (!tblBody) {
        return;
    }

    const renglones = personas.map(function (persona) {
        return `<tr>
            <td>${persona.nombre}</td>
            <td>${persona.edad}</td>
            <td>${persona.email}</td>
        </tr>`;
    }).join("");

    tblBody.innerHTML = renglones;
}

function imprimirDatosConsola() {
    nombres.forEach(function (nombre, index) {
        console.log(index, nombre);
    });

    personas.forEach(function (persona) {
        console.log(informacionPersona(persona.nombre, persona.edad, persona.email));
    });

    const frutas = ["manzana", "pera", "fresas", "mango"];
    const frutasHtml = frutas.map(function (comida) {
        return `<li>${comida}</li>`;
    }).join(" ");
    console.log(frutasHtml);
}

renderTablaPersonas();
imprimirDatosConsola();
