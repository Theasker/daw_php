<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<!-- Desarrollo Web en Entorno Servidor -->
<!-- Tema 5 : Programación orientada a objetos en PHP -->
<!-- Ejemplo Tienda Web: productos.php -->
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <title>Ejemplo Tema 5: Listado de Productos con Plantillas</title>
  <link href="tienda.css" rel="stylesheet" type="text/css">
</head>

<body class="pagproductos">

<div id="caracteristicas">
  <div id="encabezado">
    <h2>{$ordenador->getnombrecorto()}</h2>
    <p>Código: {$ordenador->getcodigo()}</p>
  </div>
 
    <h3>Caracteristicas:</h3>
    <p id="productos">Procesador: {$ordenador->getprocesador()}</p>
    <p id="productos">RAM: {$ordenador->getram()}</p>
    <p id="productos">Disco Duro: {$ordenador->getdisco()}</p>
    <p id="productos">Tarjeta Gráfica: {$ordenador->getgrafica()}</p>
    <p id="productos">Unidad óptica: {$ordenador->getdisco()}</p>
    <p id="productos">Sistema operativo: {$ordenador->getso()}</p>
    <p id="productos">Otros: {$ordenador->getotros()}</p>
    <p id="productos">PVP: {$ordenador->getpvp()}</p>
    
    <h3>Descripción:</h3>
    <p id="productos">{$ordenador->getdescripcion()}</p>
    
    <br class="divisor" />
    <a  id="productos" href="productos.php">Volver</a>
 
</div>
</body>
</html>