<?php
function validaciones(){
  validarEmail();
  echo "comprobación booleana".true || false;
}


function validarEmail() {
  // Guardamos en $correo la validación de email
  //if (filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL))
  if(filter_var($_REQUEST['email'], FILTER_VALIDATE_EMAIL)){
    return true;
  }else{
    return false;
  }
    
}
?>
