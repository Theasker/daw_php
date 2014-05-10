function enviarFormulario() {
    // Se cambia el botón de Enviar y se deshabilita
    //  hasta que llegue la respuesta
    xajax.$('enviar').disabled=true;
    xajax.$('enviar').value="Un momento...";
    
    // Capturamos los datos del formulario
    var nombre = document.getElementById("nombre").value;
    var pass1 = document.getElementById("password1").value;
    var pass2 = document.getElementById("password2").value;
    var email = document.getElementById("email").value;
    
    // Aquí se hace la llamada a la función registrada de PHP
    //xajax_validarFormulario (xajax.getFormValues("datos"));
    var datos = [nombre, pass1, pass2, email];
    xajax.request()
    return false;
}

