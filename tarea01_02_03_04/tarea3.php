<!DOCTYPE HTML>
<html>
<head>
  <meta charset="UTF-8">
  <title>Tarea 2 de Desarrollo Web Entorno Servidor</title>
  <link rel="stylesheet" type="text/css" media="screen" href="css/estilos.css" />
</head>
<body>
  <div class="contenedor">
    <center>
      <h1>Tarea 2 - Desarrollo Web Entorno Servidor
	<p>Fechas</p><hr></h1></center>
    <div class="contenido">
<?php
// Lo primero antes de nada establecemos la zona horaria.
date_default_timezone_set('Europe/Madrid');
// Visualiza el contenido de la funcion time() y explica su valor.
echo "<b>time()</b> = ".time()."<hr />"; /* Devuelve el instante actual contado en segundos desde
 * la Época Unix (1 de Enero de 1970 00:00:00 GMT).
 */

//Obtén la fecha actual y visualiza su valor con formato dia-mes-año en número
echo "<b>Hoy es</b> ".date("d")."-".date("m")."-".date("Y")."<hr />";
 
//Obtener los días, luego meses y luego años transcurridos desde el 1/1/1970 
//(round() o floor() para redondear
echo "Los <b>días</b> transcurridos desde el 1/1/1970 son ".round((time()/86400))."<hr />";
echo "Los <b>meses</b> transcurridos desde el 1/1/1970 "
. "(asumiendo que un mes tiene 30 días) son ".round((time()/2592000))."<hr />";
echo "Los <b>años</b> transcurridos desde el 1/1/1970 "
. "(asumiendo que cada año tiene 365 días) son ".round((time()/31536000))."<hr />";

// Obtén la fecha actual con formato por ejemplo
// Lunes, día 25 de enero de 2013
function mes2text($nummes) {
  switch ($nummes) {
    case 1: $mes = "Enero";
      break;
    case 2: $mes = "Febrero";
      break;
    case 3: $mes = "Marzo";
      break;
    case 4: $mes = "Abril";
      break;
    case 5: $mes = "Mayo";
      break;
    case 6: $mes = "Junio";
      break;
    case 7: $mes = "Julio";
      break;
    case 8: $mes = "Agosto";
      break;
    case 9: $mes = "Septiembre";
      break;
    case 10: $mes = "Octubre";
      break;
    case 11: $mes = "Noviembre";
      break;
    case 12: $mes = "Diciembre";
      break;
  }
  return $mes;
}

function dia2text($numdia) {
  switch ($numdia) {
    case 1: $dia_semana = "Lunes";
      break;
    case 2: $dia_semana = "Martes";
      break;
    case 3: $dia_semana = "Miércoles";
      break;
    case 4: $dia_semana = "Jueves";
      break;
    case 5: $dia_semana = "Viernes";
      break;
    case 6: $dia_semana = "Sábado";
      break;
    case 7: $dia_semana = "Domingo";
      break;
  }
  return $dia_semana;
}

echo "<b>Hoy es </b> ".dia2text(date("N")).", "
        .date("j")." de ".  mes2text(date("m"))." de "
        .date("Y")."<hr />";
 
// Asigna a una variable la fecha de tu cumpleaños
// Realiza una operación y obtén tu edad en años, meses y días (valor entero).
// tienes 23 años, 10 meses y 4 días
$midia = 19;
$mimes = 10;
$mianio = 1972;
echo "El día de mi nacimiento es $midia de ".mes2text($mimes)." de $mianio<br />";
//$fecha = time() - strtotime('1972-10-19');
$fecha = time() - strtotime("$mianio-$mimes-$midia");
$edad = round((($fecha / 3600) / 24) / 365);
echo '<p>Mi edad es '.$edad.' años</p><hr />';

//Asigna a una variable una fecha de 30/10/1969
// Obtén su edad en años, en meses y luego en días siempre redondeando
//tienes 23 años
// tienes 286 meses
// tienes 8737 días
$fechanac = '1969-10-30';
$fecha = time() - strtotime($fechanac);
echo "<p>Tu día de nacimiento es <b>30/10/1969</b><p/>";
echo "Tienes ".(round($fecha / 3600 / 24 / 365))." años.<br />";
echo "Tienes ".(round($fecha / 3600 / (24*30) ))." meses.<br />";
echo "Tienes ".(round($fecha / 3600 / 24 ))." días.<br /><hr />";

//. Usa la función getdate(...) y visualiza con la función print_r(.) el valor que retorna, comenta el resultado
print_r(getdate());
echo "<p> La función <b>getdate()</b> convierte una fecha en formato <b>timestamp</b> "
. "en todos los datos necesarios que pueden componer una fecha como puede ser: "
        . "horas, minutos, segundos, día de la semana, semana del año, mes, etc."
. "</p>";
echo "<hr />";

//. Si escribo getdate(1) podrías explicar el contenido del array que nos retorna
print_r(getdate(1));
echo "<p>La función <b>getdate(1)</b> añade un minuto al timestamp de la "
. "\"fecha unix\" del 1/1/1970.</p>";
echo "<hr />";

//. Obtener la edad de una persona nacida el 1/1/1969 
$fechanac = '1969-1-1';
$fecha = time() - strtotime($fechanac);
echo "Las personas nacidas en 1/1/1969 tienen ".(round($fecha / 3600 / 24 / 365))." años.<br /><hr />";

//Explica el siguiente código observando el resultado que se produce 
//fuente obtenido en parte de http://php.net/manual/es/function.strtotime.php

echo "<p>".strtotime("now"),"<br/>";
echo "Es el timestamp del momento actual</p>";

echo "<p>".date('d-m-Y', strtotime("now")), "<br/>";
echo "Formateo de la fecha actual en formato día-mes-año.</p>";

echo strtotime("27 September 1970"), "<br/>";
echo "Es el timestamp o marca de tiempo de la fecha pasada como parámetro.</p>";

echo "<p>".date('d-m-Y',strtotime("10 September 2000")), "<br/>";
echo "Fecha formateada de la marca de tiempo del parámetro pasado a la función strtotime.</p>";

echo "<p>".strtotime("+1 day"), "<br/>";
echo "Se ha sumado un día la fecha de hoy en formato timestamp.</p>";

echo "<p>".date('d-m-Y',strtotime("+1 day")), "<br/>";
echo "Formato día-mes-año de la fecha de hoy más un día.</p>";

echo "<p>".strtotime("+1 week"), "<br/>";
echo "Se ha sumado una semana la fecha de hoy en formato timestamp.</p>";

echo "<p>".date('d-m-Y',strtotime("+1 week")), "<br/>";
echo "Formato día-mes-año de la fecha de hoy más una semana.</p>";

echo "<p>".strtotime("+1 week 2 days 4 hours 2 seconds"), "<br/>";
echo "Se ha sumado una semana, 2 días, 4 horas y 2 segundos a la fecha de hoy en formato timestamp.</p>";

echo "<p>".date('d-m-Y',strtotime("+1 week 2 days 4 hours 2 seconds")), "<br/>";
echo "Formato dia-mes-año de la fecha de hoy más "
. "una semana, 2 días, 4 horas y 2 segundos.</p>";

echo "<p>".strtotime("next Thursday"), "<br/>";
echo "</p>";

echo "<p>".date('d-m-Y',strtotime("next Thursday")), "<br/>";
echo "Fecha del próximo jueves próximo a la fecha actual en formato timestamp.</p>";

echo "<p>".strtotime("last Monday"), "<br/>";
echo "Fecha del lunes anterior a la fecha actual en formato timestamp.</p>";

echo "<p>".date('d-m-Y',strtotime("last Monday")), "<br/>";
echo "Fecha del lunes anterior a la fecha actual en formato dia-mes-año.</p>";

echo "<hr>";
?>
    </div>
  </div>
</body>
</html>