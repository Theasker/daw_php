<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title></title>
  </head>
  <body>
    <?php
    $cadena_json = '{"negro":1,"rojo":2,"verde":3,"azul":4}';
    $objeto_php = json_decode($cadena_json);
    var_dump($objeto_php);
    
    $arr = array('negro' => 1, 'rojo' => 2, 'verde' => 3, 'azul' => 4); 
    $cadena_json = json_encode($arr);
    $temp = json_encode($objeto_php);
    var_dump($cadena_json);
    var_dump($temp);
    
    ?>
  </body>
</html>
