<?php

//Defino dos variables con mi nombre y apellidos

$nom = "Mauricio";
$ape = "Segura Ariño";


//Visualizo el texto con echo y print, por ejemplo en mi caso (deben de aparecer las comillas del ejemplo
// mi nombre es "manolo" y mi apellido es "romero"
//1)con echo pasando varios argumentos (separadados por coma)
echo'Mi ', 'nombre ', 'es ', '"Mauricio Segura"<br />';

//2)con print
print("Mi nombre es $nom $ape<br />");

//Explica en el fichero diferencias entre echo y print y semejanzas.
//Por qué puedo pasar los argumentos sin usar paréntesis
//Puedo hacerlo con printf

/* Sintaxis heredoc, */
//Asigna a una variable llamada informe un texto de cinco líneas,
//la etiqueta de finalización es FIN
$informe = <<<FIN
Tarea3 <br />
de <br />
Desarrollo <br />
de <br />
Aplicaciones <br />
Web<br />
FIN;

//Posteriormente visualizas el texto
// El contenido de 'informe' es
// aquí aparecer el contenido del infoorme
// respetando el número de 5 líneas asignadas previamente";
//Tener cuidado con que la etiqueta no lleve en esa línea ningún otro carácter (espacios en blanco o tabulacones)

echo "<br />El contenido de 'informe' es $informe";

//Probando variables
//Crea una variable y asígnale un valor
$variable = "7";
//utilizo una variable temporal para no modificar el tipo de la original
//y poder ir cambiando de tipo.
$temp = $variable; 

//visualiza el valor de la variable y el tipo que eś
echo "<br />El varlor de la variable es \"$variable\", y su tipo es " . gettype($variable) . "<br />";

//Cambia a los siguientes tipos (boolean, float, string y null y visualizar su valor)
if (settype($temp, "boolean")) {
  echo '<br />la variable $variable es ahora de tipo ' . gettype($temp) . ' y su valor es ' . $temp;
} else {
  echo '<br />la variable $variable no ha podido cambiarse de tipo boolean';
}
$temp = $variable;
if (settype($temp, "float")) {
  echo '<br />la variable $variable es ahora de tipo ' . gettype($temp) . ' y su valor es ' . $temp;
} else {
  echo '<br />la variable $variable no ha podido cambiarse de tipo float';
}
$temp = $variable;
if (settype($temp, "string")) {
  echo '<br />la variable $variable es ahora de tipo ' . gettype($temp) . ' y su valor es ' . $temp;
} else {
  echo '<br />la variable $variable no ha podido cambiarse de tipo string';
}
$temp = $variable;
if (settype($temp, "null")) {
  echo '<br />la variable $variable es ahora de tipo ' . gettype($temp) . ' y su valor es ' . $temp;
} else {
  echo '<br />la variable $variable no ha podido cambiarse de tipo null';
}
//Prueba a ver el valor y tipo de una variable no definida previamente
echo "<br />El varlor de la variable es \"$sindefinir\", y su tipo es " . gettype($sindefinir) . "<br />";
// Da error "Undefined variable" y el valor es NULL
?>