
<h1> Algunos de nuestros productos </h1>

<?php while($product = $productos->fetch_object()): ?>

<div class="product">
  <?php if($product->imagen != null) : ?>
    <img src="<?=base_url?>uploads/images/<?=$product->imagen?>"/>
  <?php else: ?>
    <img src="<?=base_url?>assets/img/logo.jpg"/>
  <?php endif; ?>
    <h2><?=$product->nombre?></h2>
    <p><?=$product->precio?></p>
    <a class="button" href="#">Comprar</a>
</div>

<?php endwhile; ?>
