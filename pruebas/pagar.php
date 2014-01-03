<?php
    // Recuperamos la información de la sesión
    session_start();
    unset($_SESSION['cesta']);
 
    die("Gracias por su compra.<br />Quiere <a href='productos.php'>comenzar de nuevo</a>?");
    $total = 0;
    foreach($_SESSION['cesta'] as $codigo => $producto) {
        echo "<p><span class='codigo'>$codigo</span>";
        echo "<span class='nombre'>${producto['nombre']}</span>";
        echo "<span class='precio'>${producto['precio']}</span></p>";
        $total += $producto['precio'];
    }
?>
      <hr />
      <p><span class='pagar'>Precio total: <?php print $total; ?> €</span></p>