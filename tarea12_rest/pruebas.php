<?php

error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED);
session_start();
set_include_path("./google-api-php-client/src/" . PATH_SEPARATOR . get_include_path());

require_once 'Google/Client.php';
require_once 'Google/Service/Tasks.php';
require_once 'Google/Service/Calendar.php';

$idCliente = '531341994899-0l7j3u3u2foa1s7tuh4l457hrrto8bne.apps.googleusercontent.com';
$passCliente = 'm4P6J9XpX_pHv3COCRs-q9vU';
$keyDeveloper = 'AIzaSyBt6s0VxxKwmhsgznlG7TziOSJAEFkmEUY';

$urlRedirect = 'http://localhost/www/dwes/php/tarea12_rest/pruebas.php';

$cliente = new Google_Client;

$cliente->setApplicationName("Pruebas");

$cliente->setClientId($idCliente);
$cliente->setClientSecret($passCliente);
$cliente->setDeveloperKey($keyDeveloper);

$cliente->setRedirectUri($urlRedirect);

$cliente->setScopes(array('https://www.googleapis.com/auth/tasks', 'https://www.googleapis.com/auth/calendar'));

if (isset($_REQUEST['logout'])) {
  unset($_SESSION['access_token']);
}

if (isset($_GET['code'])) {
  $cliente->authenticate($_GET['code']);
  $_SESSION['access_token'] = $cliente->getAccessToken();
  header('Location: ' . filter_var($urlRedirect, FILTER_SANITIZE_URL));
}

if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
  $cliente->setAccessToken($_SESSION['access_token']);
} else {
  $authUrl = $cliente->createAuthUrl();
  header('Location: ' . filter_var($authUrl, FILTER_SANITIZE_URL));
}
$apiTareas= new Google_Service_Tasks($cliente);
$apiCalendario = new Google_Service_Calendar($cliente);

$listapordefecto = $apiTareas->tasklists->listTasklists();
//$tasks = $apiTareas->tasklists();