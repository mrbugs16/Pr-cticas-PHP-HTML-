console.log("Archivo home.js cargado");

//ARREGLOS 
let nombres = ["Juan", "Maria", "Pedro", "Ana", "Luis"];

for(let i = 0; i < nombres.length; i++) {
    alert(nombres[i]);
    console.log(nombres[i]);
}

let personas = [
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

for(let j= 0; j < personas.length; j++) {
    //document.write(personas[j].nombre + "Edad" + personas[j].edad + " - Email: " + personas[j].email + "<br>");
    let nombre = personas[j].nombre;
    let edad = personas[j].edad;
    let email = personas[j].email;
    document.write(informacionPersona(nombre, edad, email));
}

//Generar renglones de la tabla para insertarlos en tbody con id tbl_datos
let renglones = "";
for(let k = 0; k < personas.length; k++) {
    let nombre = personas[k].nombre;
    let edad = personas[k].["edad"];
    let email = personas[k].["email"];
    renglones += 
        `<tr>
            <td>${nombre}</td>
            <td>${edad}</td>
            <td>${email}</td>
        </tr>`;
}
let tblBody = document.getElementById("tbl_datos");
tblBody.innerHTML = renglones;

function informacionPersona(nombre, edad, email) { 
    //return "Nombre: " + nombre + " - Edad: " + edad + " - Email: " + email;
    let info = `Nombre: ${nombre} Edad: ${edad} Email: ${email}`;
    return info;
}

//Formas de iterar (recorrer) un arreglo en javascript
//Utilizando el metodo forEach del objeto array
function prueba(item, index, arr){
    console.log(index);
}
personas.forEach(prueba);