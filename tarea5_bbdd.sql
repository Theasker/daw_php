-- Creamos la base de datos
CREATE DATABASE IF NOT EXISTS dwes_usuarios DEFAULT CHARACTER SET = utf8 DEFAULT COLLATE utf8_general_ci;
USE dwes_usuarios;

DROP TABLE IF EXISTS dwes_usuarios.usuario;

-- Creamos la tabla usuario
CREATE TABLE IF NOT EXISTS dwes_usuarios.usuarios (
usuario VARCHAR( 12 ) NOT NULL,
pass VARCHAR( 32 ) NOT NULL,
nombre VARCHAR( 30 ) NOT NULL,
apellido VARCHAR( 50 ) NOT NULL,
email VARCHAR( 30 ) NOT NULL,
dni VARCHAR( 10 ) NOT NULL,
direccion VARCHAR( 50 ) NULL,
cp VARCHAR( 5 ) NULL, 
localidad VARCHAR( 30 ) NOT NULL,
provincia VARCHAR( 30 ) NOT NULL, 
PRIMARY KEY ( usuario ),
INDEX ( usuario ),
UNIQUE ( usuario )
) ENGINE = INNODB;
 
CREATE USER usuarios IDENTIFIED BY usuarios.;
 
GRANT ALL ON dwes_usuarios.* TO usuarios;

DELETE FROM dwes_usuarios.usuarios;
-- Insertamos datos en la tabla
INSERT INTO dwes_usuarios.usuarios 
VALUES ('usuario1','pass1','nom1','ape1','nom1@nom1.com','11111111A','dir1','00001','localidad1','provincia1');
INSERT INTO usuarios 
VALUES ('usuario2','pass2','nom2','ape2','nom2@nom2.com','22222222A','dir2','00002','localidad2','provincia2');
INSERT INTO usuarios 
VALUES ('usuario3','pass3','nom3','ape3','nom3@nom3.com','33333333A','dir3','00003','localidad3','provincia3');

SELECT * FROM usuarios;
