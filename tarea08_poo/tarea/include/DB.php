<?php
require_once('Producto.php');
require_once('OrdenadorClass.php');
class DB {

  protected static function ejecutaConsulta($sql) {
    try {
      $opc = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
      $dsn = "mysql:host=theasker.infenlaces.com;dbname=theasker_tarea5";
      $usuario = 'tarea5';
      $contrasena = 'theasker';
      $dwes = new PDO($dsn, $usuario, $contrasena, $opc);
      $resultado = null;
      if (isset($dwes))
        $resultado = $dwes->query($sql);
      return $resultado;
    } catch (PDOException $ex) {
      echo $ex->getCode() . ": " . $ex->getMessage();
    }
  }

  public static function obtieneProductos() {
    $sql = "SELECT cod,nombre_corto,nombre,descripcion,PVP FROM producto;";
    $resultado = self::ejecutaConsulta($sql);
    $productos = array();
    if ($resultado) {
      // Añadimos un elemento por cada producto obtenido
      $row = $resultado->fetch();
      while ($row != null) {
        $productos[] = new Producto($row);
        $row = $resultado->fetch();
      }
    }
    return $productos;
  }

  public static function obtieneProducto($codigo) {
    $sql = "SELECT cod, nombre_corto, nombre, PVP, descripcion FROM producto";
    $sql .= " WHERE cod='" . $codigo . "'";
    $resultado = self::ejecutaConsulta($sql);
    $producto = null;
    if (isset($resultado)) {
      $row = $resultado->fetch();
      $producto = new Producto($row);
    }
    return $producto;
  }
  
  public static function obtieneOrdenadores() {
    $sql = <<<PC
SELECT producto.cod,nombre_corto,nombre,PVP,procesador,RAM,disco,grafica,unidadoptica,SO,otros,descripcion
FROM theasker_tarea5.ordenador
INNER JOIN theasker_tarea5.producto
ON theasker_tarea5.ordenador.cod = theasker_tarea5.producto.cod;
PC;
    $resultado = self::ejecutaConsulta($sql);
    $ordenatas = array();
    if ($resultado){
      // Añadimos un elemento del array por cada ordenador encontrado
      $row = $resultado->fetch();
      while ($row != null){
        $ordenatas[] = new OrdenadorClass($row);
        $row = $resultado->fetch();
      }
    }
    return $ordenatas;
  }
  
  public static function obtieneOrdenador($codigo) {
    $sql = <<<SQL
SELECT producto.cod,nombre_corto,nombre,PVP,procesador,RAM,disco,grafica,unidadoptica,SO,otros,descripcion
FROM theasker_tarea5.ordenador
INNER JOIN theasker_tarea5.producto
ON theasker_tarea5.ordenador.cod = theasker_tarea5.producto.cod
WHERE producto.cod = 
SQL;
    $sql .= "'".$codigo."';";
    $resultado = self::ejecutaConsulta($sql);
    $ordenata = null;
    if (isset($resultado)){
      $row = $resultado->fetch();
      $ordenata = new OrdenadorClass($row);
    }
    return $ordenata;
  }

  public static function verificaCliente($nombre, $contrasena) {
    $sql = "SELECT usuario FROM usuarios ";
    $sql .= "WHERE usuario='$nombre' ";
    $sql .= "AND contrasena='" . md5($contrasena) . "';";
    $resultado = self::ejecutaConsulta($sql);
    $verificado = false;
    if (isset($resultado)) {
      $fila = $resultado->fetch();
      if ($fila !== false)
        $verificado = true;
    }
    return $verificado;
  }
}
?>
