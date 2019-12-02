<!DOCTYPE html>
<html lang="en">


<head>
	<meta charset="UTF-8">
	<title>Danh sách sản phẩm</title>
	@include('layout.link')
	<base href="{{asset('')}}">
</head>
<body>

	@include('layout.header')

<!-- start show more product -->
<div class="showMore">
	<div class="container">
		<div class="row">
		<div class="products">
		<?php $i=0; ?>		

		<?php foreach ($product as  $val): ?>

			
			<?php foreach ($val as $value):  $value=(array)$value;?>
				
			
		<?php if($i==8) break; ?>	
			<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
			 <div class="product">
			 	<a href="pages/singleProduct/<?php echo $value['id_category'] ?>/<?php echo $value['id'] ?>"><img width="100%" src="/uploads/product/<?php echo $value['image'] ?>" alt="Lỗi"></a>
			 	<a href="pages/singleProduct/<?php echo $value['id_category'] ?>/<?php echo $value['id'] ?>"><div class="name"><?php echo $value['name'] ?></div></a>

			 	<?php if($value['price_sales']){ ?>

			 	<div class="prices">
			 	<div class="span-group">
			 		<span class="price"><?php echo number_format($value['price_origin'],0,".", "."); ?> ₫</span>
			 		<span class="priceSale"><?php echo number_format($value['price_sales'],0,".", "."); ?> ₫</span>
			 	</div>
			 	</div>
			 	<?php }else{ ?>
			 		<div class="price"><?php echo number_format($value['price_origin'],0,".", "."); ?> ₫</div>	
			 	<?php } ?>	
			 	<div class="note"><?php echo $value['promotion'] ?></div>
			 	<div class="addToCart"><button class="btn btn-danger" value="<?php echo $value['id'] ?>">Thêm vào giỏ hàng</button></div>
			 	<div><input class="id" type="text" hidden="{{$value['id']}}">{{$value['id']}}</div>		
			 </div>		
			</div> <!-- end 1sp -->
		<?php $i++; ?>	
		<?php endforeach ?>
		<?php endforeach ?> 
		</div>
      </div>
      <input type="hidden" id="slsp" value="8" >
      <div class="row">
		<div class="viewMore">
			<b class="btn btn-danger">Xem thêm </b>
		</div>
	</div>
	</div>

</div> <!-- end showMore -->

	@include('layout.footer')

<script>




	$(document).ready(function(){
		$('.viewMore').click(function() {
			var id_category='<?php echo $products[0]['id_category']; ?>';
					//lấy số lượng sản phẩm hiện tại
					var sl = $('#slsp').val();
					sl=parseInt(sl);
					$('#slsp').val(sl+8);
					$.ajax({
						url: 'pages/loadmore',
						type: 'POST',
						data: {idCartegory:id_category,offset:sl,_token: "{{ csrf_token() }}"},
					})
					.done(function() {
					})
					.fail(function() {
					})
					.always(function(data) {
						// x = data.indexOf(">");
						// data = data.slice(x+1, data.length);
						data = JSON.parse(data);
						if (data.status =='NULL') {
							$('.viewMore').html('<b class="endProduct" >Đã hết sản phẩm</b>');
						}else{
						$('.products').append(data.data);
						}
					});
				});
	     });
</script>
</body>
</html>