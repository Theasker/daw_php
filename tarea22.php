<?php
// Lo primero antes de nada establecemos la zona horaria.
date_default_timezone_set('Europe/Madrid');
// Visualiza el contenido de la funcion time() y explica su valor.
echo "time() = ".time()."<hr />"; /* Devuelve el instante actual contado en segundos desde
 * la Época Unix (1 de Enero de 1970 00:00:00 GMT).
 */

//Obtén la fecha actual y visualiza su valor con formato dia-mes-año en número
echo "Hoy es ".date("d")."-".date("m")."-".date("Y");
 
//Obtener los días, luego meses y luego años transcurridos desde el 1/1/1970 (round() o floor() para redondear


// Obtén la fecha actual con formato por ejemplo
// Lunes, día 25 de enero de 2013
 
//Asigna a una variable la fecha de tu cumpleaños
// Realiza una operación y obtén tu edad en años, meses y días (valor entero).
 
// tienes 23 años, 10 meses y 4 días

//Asigna a una variable una fecha de 30/10/1969
// Obtén su edad en años, en meses y luego en días siempre redondeando

//tienes 23 años
// tienes 286 meses
// tienes 8737 días

//. Usa la función getdate(...) y visualiza con la función print_r(.) el valor que retorna, comenta el resultado
//. Si escribo getdate(1) podrías explicar el contenido del array que nos retorna
//. Obtener la edad de una persona nacida el 1/1/1969 
//Explica el siguiente código observando el resultado que se produce fuente obtenido en parte de http://php.net/manual/es/function.strtotime.php
 
echo "<hr>";
echo strtotime("now"), "<br/>";
echo date('d-m-Y', strtotime("now")), "<br/>";
echo strtotime("27 September 1970"), "<br/>";
echo date('d-m-Y',strtotime("10 September 2000")), "<br/>";
echo strtotime("+1 day"), "<br/>";
echo date('d-m-Y',strtotime("+1 day")), "<br/>";
echo strtotime("+1 week"), "<br/>";
echo date('d-m-Y',strtotime("+1 week")), "<br/>";
echo strtotime("+1 week 2 days 4 hours 2 seconds"), "<br/>";
echo date('d-m-Y',strtotime("+1 week 2 days 4 hours 2 seconds")), "<br/>";
echo strtotime("next Thursday"), "<br/>";
echo date('d-m-Y',strtotime("next Thursday")), "<br/>";
echo strtotime("last Monday"), "<br/>";
echo date('d-m-Y',strtotime("last Monday")), "<br/>";
echo "<hr>";