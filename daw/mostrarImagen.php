<?php

function consulta($sql) {
  try {
    $opc = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
    $dsn = "mysql:host=theasker.infenlaces.com;dbname=theasker_varios";
    $usuario = 'Theasker';
    $contrasena = 'Theasker';
    $basedatos = new PDO($dsn, $usuario, $contrasena, $opc);
    $resultado = null;
    if (isset($basedatos)) {
      $resultado = $basedatos->query($sql);
      return $resultado;
    }
  } catch (PDOException $ex) {
    echo $ex->getCode() . ": " . $ex->getMessage();
  }
}

var_dump($_REQUEST);
$sql = "select imagen from timagenes where id_imagenes = ".$_REQUEST['cod'];
echo $sql;
$registro = consulta($sql);

$reg = $registro->fetch();

//Header("Content-type: image/jpeg");
var_dump($reg);
echo $reg['imagen'];
?>