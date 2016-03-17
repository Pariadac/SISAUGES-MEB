-- Database: "SISAUGES-MEB"

-- DROP DATABASE "SISAUGES-MEB";

--CREATE DATABASE "SISAUGES-MEB"
  --WITH OWNER = postgres
       --ENCODING = 'UTF8'
       --TABLESPACE = pg_default
       --LC_COLLATE = 'Spanish_Venezuela.1252'
       --LC_CTYPE = 'Spanish_Venezuela.1252'
       --CONNECTION LIMIT = -1;

CREATE TABLE IF NOT EXISTS PERSONA
(
	id_persona serial not null,
	cedula varchar not null,
	nombre varchar(30),
	apellido varchar(30),
	email varchar(30) not null,
	telefono varchar(11),
	constraint pk_persona 
		primary key (id_persona),
	constraint cedula_unica
		unique (cedula)
);

--drop table persona;


--CREATE TYPE STATUS AS ENUM 
--(
--	'No iniciado',
--	'Iniciado',
--	'En progreso',
--	'Culminado'
--);

--CREATE TYPE PERMISOS AS ENUM
--(	'Publico',
--	'Privado',
--	'Mixto'
--);

CREATE TABLE IF NOT EXISTS SECTOR_ACTIVIDAD
(
	id_sector_ac serial,
	descripcion_sector varchar(20),
	constraint pk_setor_actividad
		primary key (id_sector_ac)
);

--drop table sector_actividad;


CREATE TABLE IF NOT EXISTS ACTIVIDAD
(
	id_actividad serial,
	nombre_actividad varchar(30) not null,
	status_actividad STATUS not null,
	permiso_actividad PERMISOS not null,
	id_sector_ac integer,
	constraint pk_actividad
		primary key (id_actividad),
	constraint fk_sector_actividad
		foreign key (id_sector_ac) references sector_actividad(id_sector_ac)
);

--drop table actividad;



CREATE TABLE IF NOT EXISTS TESISTA
(
	id_tesista serial,
	carrera_tesista varchar(25),
	semestre_tesista varchar (5),
	id_actividad integer,
	constraint pk_tesista
		primary key (id_tesista),
	constraint fk_actividad_tesista
		foreign key (id_actividad) references actividad(id_actividad)
)INHERITS(PERSONA);

--drop table tesista

CREATE TABLE IF NOT EXISTS REPRESENTANTE
(
	id_representante serial,
	constraint pk_representante 
		primary key (id_representante)
)INHERITS(PERSONA);
	
--drop table representante;

CREATE TABLE IF NOT EXISTS REPRESENTANTE_ACTIVIDAD
(
	id_actividad integer,
	id_representante integer,
	constraint pk_ra
		primary key (id_actividad, id_representante),
	constraint fk_ar
		foreign key (id_actividad) references actividad(id_actividad),
	constraint fk_ra
		foreign key (id_representante) references representante(id_representante)
	
);

--drop table representante_actividad

CREATE TABLE IF NOT EXISTS INSTITUCION
(
	id_institucion serial,
	nombre_institucion varchar(100) not null,
	direccion_institucion varchar(100),
	correo_institucional varchar(30) not null,
	telefono_institucion varchar(12),
	constraint pk_institicion
		primary key (id_institucion)
);

--drop table institucion;

CREATE TABLE IF NOT EXISTS DEPARTAMENTO
(
	id_departamento serial,
	descripcion_departamento varchar(30),
	constraint pk_departamento
		primary key (id_departamento)
);

--DROP TABLE DEPARTAMENTO;

CREATE TABLE IF NOT EXISTS INSTITUCION_DEPARTAMENTO_REPRESENTANTE
(
	id_institucion integer,
	id_departamento integer,
	id_representante integer,
	constraint pk_IDR
		primary key (id_departamento, id_institucion, id_representante),
	constraint fk_institucion
		foreign key (id_institucion) references institucion (id_institucion),
	constraint fk_departamento
		foreign key (id_departamento) references departamento (id_departamento),
	constraint fk_representante
		foreign key (id_representante) references representante (id_representante)
);

--DROP TABLE INSTITUCION_DEPARTAMENTO_REPRESENTANTE;


CREATE TABLE IF NOT EXISTS NIVEL_DE_USUARIO
(
	id_nivel_de_usuario serial,
	descripcion_nivel_usuario varchar(15),
	constraint pk_nivel_de_usuario 
		primary key (id_nivel_de_usuario)
);

--drop table nivel_de_usuario;

CREATE TABLE IF NOT EXISTS USUARIO
(
	id_usuario serial,
	username varchar(20),
	password varchar(60),
	id_nivel_de_usuario integer,
	remember_token varchar(100),
	constraint pk_usuario
		primary key (id_usuario)
)INHERITS(PERSONA);

--drop table usuario;

CREATE TABLE IF NOT EXISTS USUARIOS_NIVELES
(
	id_usuario integer,
	id_nivel_de_usuario integer,
	FOREIGN KEY (id_nivel_de_usuario) references nivel_de_usuario (id_nivel_de_usuario),
	FOREIGN KEY (id_usuario) references usuario (id_usuario)
);

--drop table usuarios_niveles;

CREATE TABLE IF NOT EXISTS MUESTRA
(
  id_muestra serial NOT NULL,
  codigo_muestra varchar(200),
  nombre_original_muestra character varying(200),
  ruta_img_muestra character varying(200),
  tipo_muestra character varying(200),
  descripcion_muestra character varying(200),
  fecha_recepcion date,
  fecha_analisis date,
  CONSTRAINT pk_muestra PRIMARY KEY (id_muestra)
);

--drop table muestra

CREATE TABLE IF NOT EXISTS TECNICA_ESTUDIO
(
	id_tecnica_estudio serial,
	descripcion_tecnica_estudio varchar(30),
	constraint pk_tecnica_estudio 
		primary key (id_tecnica_estudio)
);

--drop table tecnica_estudio

CREATE TABLE IF NOT EXISTS MUESTRA_TECNICA_ESTUDIO
(
	id_tecnica_estudio integer,
	id_muestra integer,
	constraint pk_tecnica_estudio_muestra 
		primary key (id_tecnica_estudio,id_muestra),
	constraint fk_tecnica_estudio_MTE
		foreign key (id_tecnica_estudio) references tecnica_estudio(id_tecnica_estudio),
	constraint fk_muestra_MTE
		foreign key (id_muestra) references muestra (id_muestra)
);

--drop table muestra_tecnica_estudio

CREATE TABLE IF NOT EXISTS MUESTRA_ACTIVIDAD
(

	id_actividad integer,
	id_muestra integer,
	ruta_muestra varchar(60),
	constraint pk_actividad_muestra 
		primary key (id_actividad,id_muestra),
	constraint fk_actividad
		foreign key (id_actividad) references actividad(id_actividad),
	constraint fk_muestra
		foreign key (id_muestra) references muestra (id_muestra)
);

--drop table muestra_actividad;

CREATE TABLE IF NOT EXISTS LABORATORIO
(
	id_laboratorio serial,
	nombre_laboratorio varchar(20),
	ubicacion_laboratorio varchar(50),
	telefono_laboratorio varchar(13),
	constraint pk_laboratorio
		primary key (id_laboratorio)
);

--drop table laboratorio

CREATE TABLE IF NOT EXISTS MUESTRA_LABORATORIO
(
	id_muestra integer,
	id_laboratorio integer,
	constraint pk_laboratorio_muestra 
		primary key (id_muestra,id_laboratorio),
	constraint fk_muestra
		foreign key (id_muestra) references muestra(id_muestra),
	constraint fk_laboratorio
		foreign key (id_laboratorio) references laboratorio (id_laboratorio)
);

--DROP TABLE MUESTRA_LABORATORIO




--insert into representante(cedula, nombre, apellido, correo_electronico, telefono) values(18491779,'ely','colmenarez','elyjcolmenarez@gmail.com','02124430191');
--select * from persona
