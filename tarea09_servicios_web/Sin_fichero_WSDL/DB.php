<?php

require_once('Producto.php');

class DB {

  /**
   * Ejecuta una consulta de una sentencia sql pasada como parámetro
   */
  protected static function ejecutaConsulta($sql) {
    try {
      $opc = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
      $dsn = "mysql:host=theasker.infenlaces.com;dbname=theasker_varios";
      $usuario = 'Theasker';
      $contrasena = 'Theasker';
      $dwes = new PDO($dsn, $usuario, $contrasena, $opc);
      $resultado = null;
      if (isset($dwes)) {
        $resultado = $dwes->query($sql);
      }
      return $resultado;
    } catch (PDOException $ex) {
      echo $ex->getCode() . ": " . $ex->getMessage();
    }
  }
  
  /**
   * Obtiene un objeto producto con todos los campos de un producto dado.
   */
  public static function obtieneProducto($codigo) {
    $sql = "SELECT cod, nombre_corto, nombre, PVP, descripcion, familia";
    $sql .= " FROM producto WHERE cod='" . $codigo . "'";
    $resultado = self::ejecutaConsulta($sql);
    $producto = null;
    if (isset($resultado)) {
      $row = $resultado->fetch();
      $producto = new Producto($row);
    }
    return $producto;
  }
  
  /**
   * Devuelve un array con los códigos de todas las familias
   */
  public static function obtieneFamilias(){
    $sql = "SELECT cod FROM familia";
    $resultado = self::ejecutaConsulta($sql);
    $familias = array();
    if ($resultado){
      $row = $resultado->fetch();
      while ($row != null){
        $familias[] = $row['cod'];
        $row = $resultado->fetch();
      }
    }
    return $familias;
  }
  
  /**
   * Devuelve un array con los códigos de los productos de una familia
   */
  public static function obtieneProductosFamilia($familia){
    $sql = "SELECT cod FROM producto WHERE familia = '".$familia."'";
    $resultado = self::ejecutaConsulta($sql);
    $codigosProd = array();
    if ($resultado){
      $row = $resultado->fetch();
      while ($row != null) {
        $codigosProd[] = $row['cod'];
        $row = $resultado->fetch();
      }
      return $codigosProd;
    }
  }
  
  /**
   * Devuelve el número de unidades que existen en una tienda de un producto
   */
  public static function obtieneStock($codigo, $tienda){
    $sql = "SELECT unidades FROM stock";
    $sql .= " WHERE producto = '".$codigo."' AND tienda = ".$tienda;
    $resultado = self::ejecutaConsulta($sql);
    $unidades = null;
    if ($resultado){
      $row = $resultado->fetch();
      $unidades = $row['unidades'];
    }
    return $unidades;
  }
  
}
?>
