<?php
phpinfo();
require_once './xajax-0.6-beta1/xajax_core/xajax.inc.php';
$xajax = new xajax();
$xajax->printJavascript();
$xajax->configure('javascript URI', '.');
$xajax->configure('debug',true);