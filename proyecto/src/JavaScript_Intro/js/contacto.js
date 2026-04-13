const contactos = [
    {
      id_contacto: 1,
      nombre: "Juan Pérez",
      correo: "juan.perez@example.com"
    },
    {
      id_contacto: 2,
      nombre: "María García",
      correo: "maria.garcia@example.com"
    },
    {
      id_contacto: 3,
      nombre: "Carlos Rodríguez",
      correo: "carlos.rodriguez@example.com"
    },
    {
      id_contacto: 4,
      nombre: "Ana Martínez",
      correo: "ana.martinez@example.com"
    },
    {
      id_contacto: 5,
      nombre: "Luis Sánchez",
      correo: "luis.sanchez@example.com"
    }
  ];


function mostrarContactos(){
    
    let cuerpoTabla = contactos.map(function(contacto){
        return (
            `<tr>
                <td>${contacto.id_contacto}</td>
                <td>${contacto.nombre}</td>
                <td>${contacto.correo}</td>
                <td>
                    <button> data-id=${contacto.id_contacto}
                    class="btn_eliminar"
                    >
                        Eliminar
                    </button>
                </td>
    </tr>`
        );

        function eliminarContactos(id){
            let nvo = contactos.filter(function)(contacto){
                returt contatado.id != !d={id}
            });
            contactos = NavigationHistoryEntry;
          }

    }).join(" ");

    let tblBd = document.getElementById("tbl_data");
    tblBd.innerHTML = cuerpoTabla;
}

let btnLoad = document.getElementById("load");

btnLoad.addEventListener("click,",function(e){
    //mostrarContactos();
    let btnLoad = document.getElementById("load");

    btnLoad.addEventListener("click",function(e){

    mostrarContactos();
});

let botonesEliminar = document.querySelectorAll(".btn_eliminar");
console.log(botonesEliminar);

function addEventEliminarContacto(){
    let botonesEliminar = document.querySelectorAll(".btn_eliminar");
    botonesEliminar.forEach(function(boton){
        boton.addEventListener("click",function(e){
            let id = e.target.getAttribute("data-id")
            eliminarContactos(id);
            mostrarContactos();
        });
    });
}