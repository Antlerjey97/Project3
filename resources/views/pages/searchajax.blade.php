<ul>
<?php foreach ($data as $value): 	 $value=(array)$value;?>
<li>
  <a href="pages/singleProduct/<?php echo $value['id_category'] ?>/<?php echo $value['id'] ?>">
	<div class="image"><img src="/uploads/product/<?php echo $value['image'] ?>" alt=""></div>
	<div class="name"><?php echo $value['name'] ?></div>
	<?php if ($value['price_sales']) {?>
		<div class="price"><?php echo number_format($value['price_sales'], 0, ".", "."); ?> ₫</div>
 	<?php } else {?>
 		<div class="price"><?php echo number_format($value['price_origin'], 0, ".", "."); ?> ₫</div>
 	<?php }?>
  </a>
</li>
<?php endforeach?>
</ul>