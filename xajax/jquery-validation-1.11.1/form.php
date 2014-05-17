<?php
/**
 * Desarrollo Web en Entorno Servidor
 * Tema 7 : Aplicaciones web dinámicas: PHP y Javascript
 * Ejemplo Validación formulario con jQuery4PHP y JqValidate: form.php
 */

// Incluimos la lilbrería jQuery4PHP
include_once('../lib/YepSua/Labs/RIA/jQuery4PHP/YsJQueryAutoloader.php');
YsJQueryAutoloader::register();
// Y el plugin de validación
YsJQuery::usePlugin(YsJQueryConstant::PLUGIN_JQVALIDATE);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <title>Ejemplo Tema 7: Validación formulario con jQuery4PHP</title>
  <link rel="stylesheet" href="estilos.css" type="text/css" />
  <!-- Incluímos la librería de JavaScript jQuery -->
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
  <!-- Y también la de validación -->
  <script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.8.1/jquery.validate.min.js"></script>
</head>

<body>
<?php
// Cargamos los mensajes de validación en castellano
echo YsJQueryAssets::loadScripts('../jq4php-showcase/showcase/jquery4php-assets/js/plugins/bassistance/validate/localization/messages_es.js')->execute();
?>
    <div id='form'>
    <form id='datos' action="javascript:void(null);">
    <fieldset >
        <legend>Introducción de datos</legend>
        <div class='campo'>
            <label for='nombre' >Nombre:</label><br />
            <input type='text' name='nombre' id='nombre' maxlength="50" />
        </div>
        <div class='campo'>
            <label for='password1' >Contraseña:</label><br />
            <input type='password' name='password1' id='password1' maxlength="50" />
        </div>
        <div class='campo'>
            <label for='password2' >Repita la contraseña:</label><br />
            <input type='password' name='password2' id='password2' maxlength="50" />
        </div>
        <div class='campo'>
            <label for='email' >Email:</label><br />
            <input type='text' name='email' id='email' maxlength="50" />
        </div>

        <div class='campo'>
            <input type='submit' id='enviar' name='enviar' value='Enviar' />
        </div>
    </fieldset>
    </form>
    </div>
<?php
   echo
   YsJQuery::newInstance()
      ->onClick()
      ->in("#enviar")
      ->execute( 
         YsJQValidate::build()->in('#datos')
           ->_rules(
            array('nombre' => array('required' => true, 'minlength' => 4),
                  'email' => array('required' => true, 'email' => true),
                  'password1' => array('required' => true, 'minlength' => 6, 'equalTo' => '#password2')
                )
           )
      );
?>
</body>
</html>
