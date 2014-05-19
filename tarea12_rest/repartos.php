<?php
/**
 * Desarrollo Web en Entorno Servidor
 * Tema 8 : Aplicaciones web híbridas
 * Ejemplo Rutas de reparto: repartos.php
 */

session_start();

set_include_path("./google-api-php-client/src/" . PATH_SEPARATOR . get_include_path());

require_once 'Google/Client.php';
require_once 'Google/Service/Tasks.php';
require_once 'Google/Service/Calendar.php';
require_once 'libs/xajax_core/xajax.inc.php';

// Creamos el objeto xajax
$xajax = new xajax('ajaxmaps.php');

// Y configuramos la ruta en que se encuentra la carpeta xajax_js
$xajax->configure('javascript URI','./libs/');

// Registramos la función que vamos a llamar desde JavaScript
$xajax->register(XAJAX_FUNCTION,"obtenerCoordenadas");
$xajax->register(XAJAX_FUNCTION,"ordenarReparto");

// Configuración del acceso a oAuth2 para la cuenta de Google
$idCliente='87479210089-fh9c7as1tttg9n6c22crmmtlle06ddmn.apps.googleusercontent.com';
$passCliente ='75GjqUBPbJFwR0dV1z8OB7BS';
$keyDeveloper='AIzaSyANeEzxA1CidjezlspylBSeWPvLjdKpLC8';

//URL Donde google redirigirá la aplicación una vez que se haya autentificado
//En mi caso el mismo fichero php que contiene la aplicación
$urlRedirect = 'http://localhost/www/dwes/php/tarea12_rest/repartos.php';

// Creamos el objeto de la API de Google, primero un objeto de la clase Client
$cliente = new Google_Client;

// Y lo configuramos con los nuestros identificadores
$cliente->setApplicationName("Gestor de repartos");

//Establecemos las credenciales para este cliente
$cliente->setClientId($idCliente);
$cliente->setClientSecret($passCliente);
$cliente->setDeveloperKey($keyDeveloper);

//Este método especificará la url donde queremos que google redirija la aplicación 
//una vez que se haya logeado correctamente el usuario 
//y que se hayan establecido de manera correcta las credenciales correspondiente. 
//En nuestro caso será al mismo fichero.
$cliente->setRedirectUri($urlRedirect);

//Establecemos los permisos que queremos otorgar. 
//En este caso queremos conceder acceso a tasks y a calendar 
//para que el usuario pueda acceder a tareas y calendarios
$cliente->setScopes(array('https://www.googleapis.com/auth/tasks','https://www.googleapis.com/auth/calendar'));

// Comprobamos o solicitamos la autorización de acceso
/************************************************
  If we're logging out we just need to clear our
  local access token in this case
 ************************************************/
if (isset($_REQUEST['logout'])) {
  unset($_SESSION['access_token']);
}
 
/************************************************
  If we have a code back from the OAuth 2.0 flow,
  we need to exchange that with the authenticate()
  function. We store the resultant access token
  bundle in the session, and redirect to ourself.
 ************************************************/
if (isset($_GET['code'])) {
  $cliente->authenticate($_GET['code']);
  $_SESSION['access_token'] = $cliente->getAccessToken();
  header('Location: ' . filter_var($urlRedirect, FILTER_SANITIZE_URL));
}
 
/************************************************
  If we have an access token, we can make
  requests, else we generate an authentication URL.
 ************************************************/
if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
  $cliente->setAccessToken($_SESSION['access_token']);
 
} else {
  $authUrl = $cliente->createAuthUrl();
  header('Location: ' . filter_var( $authUrl, FILTER_SANITIZE_URL));
 
}