-- Creamos la base de datos
CREATE DATABASE IF NOT EXISTS dwes_usuarios DEFAULT CHARACTER SET = utf8 DEFAULT COLLATE utf8_general_ci;
USE dwes_usuarios;

DROP TABLE IF EXISTS dwes_usuarios.usuario;

-- Creamos la tabla usuario
CREATE TABLE IF NOT EXISTS `usuarios` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(15) NOT NULL,
  `pass` varchar(60) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellido` varchar(40) NOT NULL,
  `email` varchar(50) NOT NULL,
  `dni` varchar(10) NOT NULL,
  `direccion` varchar(50) DEFAULT NULL,
  `cp` varchar(5) DEFAULT NULL,
  `localidad` varchar(30) DEFAULT NULL,
  `provincia` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`idUsuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;
 
CREATE USER usuarios IDENTIFIED BY usuarios.;
 
GRANT ALL ON dwes_usuarios.* TO usuarios;

DELETE FROM dwes_usuarios.usuarios;

SELECT * FROM usuarios;
