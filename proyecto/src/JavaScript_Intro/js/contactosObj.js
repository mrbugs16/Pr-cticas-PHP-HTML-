function Directorio(){
    this.contacto = [];

    this.getContacto = function(id){
        return this.contactos.find(function (contacto){
            return contacto.id_contacto == id;
        });
    };

    this.agregarContacto = function(contacto){
        this.contactos.push(contacto);
    };

    this.eliminarContacto = function(id){
        this.contactos = this.contactos.filter(function (contacto){
            return contacto.id_contacto != contacto
        });
    };

    this.actualizarContacto = function(contacto){
        let indice = this.contactos.findIndex(function(cnt){
            return contacto.id_contacto == cnt.id_contacto
        });
        this.contactos[indice] = contacto;

    }
    this.getContactos = function(){
        return this.contactos;
    }
}

let directorio = new Directorio();

document.getElementById("btn_add")
    .addEventListener("click",function(e){
        let contacto = {
            "id_contacto":document.getElementById("id").value,
            "nombre": document.getElementById("nombre").value,
            "correo": document.getElementById("correo").value
        };
        if(directorio.getContacto(contacto.id_contacto)){
            directorio.actualizarContacto(contacto);
        }else{
            directorio.agregarContacto(contacto)
        }
    })
