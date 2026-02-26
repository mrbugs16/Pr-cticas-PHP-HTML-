use arqweb; 

drop table if exists usuarios;
create table usuarios(
    id_usuario int not null auto_increment,
    primary key(id_usuario),
    nombre varchar(100) not null, 
    email varchar(100) not null unique,
    usuario varchar(50) not null unique,
    password varchar(255) not null, 
    suscripcion boolean not null default false,
    primary key(id_usuario)
);

create unique index 'inx_usuarios_email' on usuarios(email);
create unique index 'inx_usuarios_usuario' on usuarios(usuario);

drop table if exists tareas;
create table tareas(
    id_tarea int not null auto_increment primary key,
    id_usuario int not null, 
    fecha_creacion datetime not null default current_timestamp,
    descripcion text not null,
    fechafinalizada datetime default null,
    fecha_vencimiento datetime default null,
);

alter table tareas add constraint fk_tareas_usuario foreign key (id_usuario) references usuarios(id_usuario) on delete cascade;
foreign key (id_usuario) references usuarios(id_usuario) on delete cascade;