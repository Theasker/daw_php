{foreach from=$productos item=producto}
  <p><form id='{$producto->getcodigo()}' action='productos.php' method='post'>
    <input type='hidden' name='cod' value='{$producto->getcodigo()}'/>
    <input type='submit' name='enviar' value='Añadir'/>
    {*Recorremos todos los ordenaores para ver si coincide el código *}
    {* Creamos la variable "encontrado" 
      que usabmos para buscar si está el ordenador en los productos *}
    {assign var="encontrado" value=0}
    {foreach from=$ordenadores item=ordenador}
      {if $producto->getcodigo() == $ordenador->getcodigo()}       
        {assign var="encontrado" value=1}
      {/if}
    {/foreach}
    {if $encontrado == 1}
      <a href="detallesproducto.php?cod={$producto->getcodigo()}"> 
        {$producto->getnombrecorto()}: {$producto->getPVP()} euros.</a></form></p>
      {else}
        {$producto->getnombrecorto()}: {$producto->getPVP()} euros.</form></p>
{/if}

{/foreach}
