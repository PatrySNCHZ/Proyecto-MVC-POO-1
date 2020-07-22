<h1> Gestión de productos</h1>

<a href="<?=base_url?>producto/crear" class="button button-small">
    Crear producto
</a>

<?php if(isset($_SESSION['producto']) && $_SESSION['producto'] == "complete"): ?>
<strong class="alert alert-green"> El producto se ha creado correctamente.</strong>
<?php elseif(isset($_SESSION['producto']) && $_SESSION['producto'] != "complete"): ?>
<strong class="alert alert-red"> El producto no se ha creado.</strong>
<?php endif; ?>
<?php Utils::deleteSession('producto'); ?>


<table border ="1">
    <tr>
        <th> Producto </th>
        <th> Precio </th>
        <th> Stock </th>
        <th> Acciones </th>
    </tr>
 
    
<?php while($pro = $productos->fetch_object()): ?>
    <tr>
        <td> <?=$pro->nombre;?> </td>
        <td> <?=$pro->precio;?> </td>
        <td> <?=$pro->stock;?> </td>
        <td> 
             <a class="button button-gestion" href="<?=base_url?>producto/editar&id=<?=$pro->id?>"> Editar </a>
             <a class="button button-gestion button-red" href="<?=base_url?>producto/eliminar&id=<?=$pro->id?>"> Eliminar </a>
        </td>
    </tr>
    
<?php endwhile; ?>
</table>