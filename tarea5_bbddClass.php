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
      // conectado correctamente a la base de datos
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
  /*function insertarDatosEjemplo(){
    $this->sql = <<<FIN
INSERT INTO dwes_usuarios.usuarios
VALUES ("usuario1","pass1","nom1","ape1","nom1@nom1.com","11111111A","dir1","00001","localidad1","provincia1");
FIN;
    echo $this->sql;
    $resultado = $this->conexion->query($this->sql);
    if ($resultado) {
      print "<p>Se han insertado los datos de prueba tabla.</p>";
    }else echo "<p>No se han insertados datos ($resultado)</p>";
  }*/
  
  function insertarDatos($user,$pass,$nom,$ape,$email,$dni,$dir,$cp,$local,$prov){
    $this->sql = "INSERT INTO dwes_usuarios.usuarios ";
    $this->sql = $this->sql."(`usuario`,`pass`,`nombre`,`apellidos`,`email`,`dni`,`direccion`,`cp`,`localidad`,`provincia`) ";
    $this->sql = $this->sql."VALUES (\"$user\",\"$pass\",\"$nom\",\"$ape\",\"$email\",\"$dni\",\"$dir\",\"$cp\",\"$local\",\"$prov\")";
    $resultado = $this->conexion->query($this->sql);
    if ($resultado) {
      frmAgregado($user,$email);
    }else echo "<p>No se han insertados datos ($resultado)</p>";
  }
  
  // Función que nos muestra todos los usuarios de la base de datos
  function mostrarTodosDatos(){
    $this->sql = "SELECT * FROM usuarios";
    $resultado = $this->conexion->query($this->sql);
    echo $this->conexion->connect_errno;
    var_dump($resultado);
    if($resultado){
      echo "han salido resultados";
      $row = $resultado->fetch_assoc();
      while($row != null){
        var_dump($row);
        $row = $resultado->fetch_assoc();
      }
      var_dump($row);
    }
  }
  
  function buscarUsuario($usuario){
    $this->sql = "SELECT * FROM usuarios WHERE usuario = '$usuario'";
    $resultado = $this->conexion->query($this->sql);
    $row = $resultado->fetch_assoc();
    if($row == null){
      return false; // usuario no registrado
    }else{
      return true; // usuario registrado
    }
  }
  
  function validarUserPass($user,$pass){
    $this->sql = "SELECT * FROM usuarios WHERE usuario = '$user'";
    $resultado = $this->conexion->query($this->sql);
    $row = $resultado->fetch_assoc();
    if($row == null){ // usuario no registrado
      frmNoExiste();
    }else{ // usuario registrado
      $hash = $row['pass'];
      if (validarPass($pass, $hash)){ // contraseña correcta
        frmDatosUsuario($row);
      }else { // contraseña incorrecta
        frmPassIncorrecto();
      }      
    }
  }
  // Cerramos la conexión a la base de datos
  function __destruct() {
    if (isset($this->conexion))
      $this->conexion->close();
  }

}
