<?php

/**
 * Clase donde están las acciones de la base de datos
 *
 * @author theasker
 */
class tarea5_bbddClass {

  public $conexion;
  private $sql;

  function __construct() {
    $DBHost = "theasker.infenlaces.com";
    $DBUser = "usuarios";
    $DBPass = "usuarios";
    $DBdb = "dwes_usuarios";
    @ $this->conexion = new mysqli($DBHost, $DBUser, $DBPass, $DBdb);
    if (mysqli_connect_errno()) {
      echo "Fallo en la conexión MySQL: " . mysqli_connect_error();
      exit();
    } else {
      echo "conectado correctamente a la base de datos.";
    }
  }
  // eliminamos la tabla usuarios
  function borrarTabla() {
    $this->sql = <<<FIN
DROP TABLE IF EXISTS dwes_usuarios.usuario;
FIN;
    $resultado = $this->conexion->query($this->sql);
    if ($resultado) {
      print "<p>Se ha eliminado la tabla.</p>";
    }
  }
  // creación de la tabla
  function crearTabla() {
    $this->sql = <<<FIN
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
FIN;
    $resultado = $this->conexion->query($this->sql);
    if ($resultado) {
      print "<p>Se ha creado la tabla.</p>";
    }
  }
  
  // insertamos unos datos de ejemplo para la tabla usuarios
  function insertarDatosEjemplo(){
    $this->sql = <<<FIN
INSERT INTO dwes_usuarios.usuarios
VALUES ("usuario1","pass1","nom1","ape1","nom1@nom1.com","11111111A","dir1","00001","localidad1","provincia1");
FIN;
    echo $this->sql;
    $resultado = $this->conexion->query($this->sql);
    if ($resultado) {
      print "<p>Se han insertado los datos de prueba tabla.</p>";
    }else echo "<p>No se han insertados datos ($resultado)</p>";
  }
  
  function insertarDatos($user,$pass,$nom,$ape,$email,$dni,$dir,$cp,$local,$prov){
    $this->sql = "INSERT INTO dwes_usuarios.usuarios VALUES ";
    $this->sql = $this->sql."(\"$user\",\"$pass\",\"$nom\",\"$ape\",\"$email\",\"$dni\",\"$dir\",\"$cp\",\"$local\",\"$prov\")";
    echo $this->sql;
    $resultado = $this->conexion->query($this->sql);
    if ($resultado) {
      print "<p>Se han insertado los datos de prueba tabla.</p>";
    }else echo "<p>No se han insertados datos ($resultado)</p>";
  }

  function __destruct() {
    if (isset($this->conexion))
      $this->conexion->close();
    echo "<br />desconectado de la base de datos.";
  }

}
