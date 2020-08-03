<h1>Detalle del pedido</h1>


<?php if(isset($pedido)) : ?>
    <?php if(isset($_SESSION['admin'])): ?>
        <h3> Cambiar el estado del pedido </h3>
        <form action="<?=base_url?>pedido/estado" method="POST">
            <input type="hidden" value="<?=$pedido->id?>" name="pedido_id" />
            <select name="estado">
                <option value="Confirmed" <?=$pedido->estado== 'Confirmed' ? 'selected' : '';?>> Pendiente </option>
                <option value="Preparation" <?=$pedido->estado== 'Preparation' ? 'selected' : '';?>> En preparación </option>
                <option value="Ready" <?=$pedido->estado== 'Ready' ? 'selected' : '';?>> Preparado para el envío </option>
                <option value="Sent" <?=$pedido->estado== 'Sent' ? 'selected' : '';?>> Enviado </option>
            </select>
            <input type="submit" value="Cambiar estado"/>
        </form>
        <br/>
    <?php endif; ?>


<h3>Dirección de envío</h3>

Provincia: <?=$pedido->provincia?> <br/>
Localidad: <?=$pedido->localidad?> <br/>
Dirección: <?=$pedido->direccion?> <br/>



<h3> Datos del pedido: </h3>

Estado: <?=Utils::showStatus($pedido->estado) ?> <br/>
Número del pedido: <?=$pedido->id ?> <br/>
Total a pagar:  <?=$pedido->coste ?> €<br/>
Productos:      
<?php endif; ?>

<table>
    
      <tr>
        <th> Imagen </th>
        <th> Nombre </th>
        <th> Precio </th>
        <th> Unidades </th>
    </tr>
    


<?php while($producto = $productos->fetch_object()): ?>


    
<tr>
        <td><?php if ($producto->imagen != null) : ?>
                <img class="img_carrito" src="<?= base_url ?>uploads/images/<?= $producto->imagen?>"  ?>
            <?php else: ?>
                <img class="img_carrito" src="<?= base_url ?>assets/img/logo.jpg"/>
            <?php endif; ?></td>

        <td><a href="<?=base_url?>producto/ver&id=<?=$producto->id?>"><?=$producto->nombre?></a></td>
        <td><?=$producto->precio?></td>
        <td><?=$producto->unidades?></td>
    </tr>
    
 <?php endwhile ?>
</table>
