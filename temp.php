<?php
$para      = 'c3205615@drdrb.com';
$titulo = 'El título';
$mensaje = 'Hola';
$cabeceras = 'From: webmaster@example.com' . "\r\n" .
    'Reply-To: webmaster@example.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

$temp = mail($para, $titulo, $mensaje,$cabeceras);
var_dump($temp);
var_dump(mail($para, $titulo, $mensaje,$cabeceras))

?>
