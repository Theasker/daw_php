<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 6</title>
    <style type="text/css">
        body {margin:0px;}
        div{
        	float:left;
        }
        #contenedor {position:absolute; width:100%;height:100%;}
        #rojo {background-color: red; width:50%; height:50%;}
        #verde {background-color: green; width:50%; height:50%;}
        #amarillo {background-color: yellow; width:50%; height:50%;}
        #azul {background-color: blue; width:50%; height:50%; }
    </style>
    <script type="text/javascript">
        function informacion(elEvento) {
            var evento = elEvento || window.event;
            var coordenadaX = evento.clientX;
            var coordenadaY = evento.clientY;
            var dimensiones = tamanoVentanaNavegador();
            var tamanoX = dimensiones[0];
            var tamanoY = dimensiones[1];

            var posicionHorizontal = "";
            var posicionVertical = "";

            if (coordenadaX > tamanoX / 2) {
                posicionHorizontal = "derecha";
            } else {
                posicionHorizontal = "izquierda";
            }

            if (coordenadaY > tamanoY / 2) {
                posicionVertical = "abajo";
            } else {
                posicionVertical = "arriba";
            }
            if (posicionHorizontal == "izquierda" && posicionVertical == "arriba") {
                alert("rojo");
            } else if (posicionHorizontal == "derecha" && posicionVertical == "arriba") {
                alert("verde");
            } else if (posicionHorizontal == "izquierda" && posicionVertical == "abajo") {
                alert("amarillo");
            } else {
                alert("azul");
            }
        }
        function tamanoVentanaNavegador() {
            // Adaptada de http://www.howtocreate.co.uk/tutorials/javascript/browserwindow
            var dimensiones = [];

            if (typeof(window.innerWidth) == 'number') {
                // No es IE
                dimensiones = [window.innerWidth, window.innerHeight];
            } else if (document.documentElement && (document.documentElement.clientWidth || document.documentElement.clientHeight)) {
                //IE 6 en modo estandar (no quirks)
                dimensiones = [document.documentElement.clientWidth, document.documentElement.clientHeight];
            } else if (document.body && (document.body.clientWidth || document.body.clientHeight)) {
                //IE en modo quirks
                dimensiones = [document.body.clientWidth, document.body.clientHeight];
            }

            return dimensiones;
        }

        document.onclick = informacion;
    </script>
</head>
<body>
    <div id="contenedor">
        <div id="rojo"></div>
        <div id="verde"></div>
        <div id="amarillo"></div>
        <div id="azul"></div>
    </div>
</body>
</html>

<!-- Para definir los cuadros mediante css tenemos varias opciones:
     - Contenedor con positon absolute o fixed y anchura y altura el 100%.  Los div internos static (el atributo position no se hereda), pero los ponemos a float para poder tener dos por fila. Al tener la referencia "padre", coge la altura con el 50%. 
     - Observa que pasa si los defines sin contenedor, por ejemplo poniendo el position en absolute para todos. ¿Sabrías explicarlo?
     - Si los dejamos como static, para que cojan el 50% de alto habría que definir en el css tanto la altura del html como la del body con 100%.
-->