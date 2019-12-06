// // document.addEventListener("DOMContentLoaded",function(){
// // 	$('body').on('click','.addToCart',function () {
// // 		var	id=parseInt($(this).children(":first").val());
// // 		var quantity = parseInt($('.quantity').html());
// // 		$.ajax({
// // 			url: '/project2/Home/addToCart',
// // 			type: 'POST',
// // 			data: {id: id,sl:1}
// // 		})
// // 		.done(function() {

// // 		})
// // 		.fail(function() {

// // 		})
// // 		.always(function(data) {
// // 			// x = data.indexOf(">");
// // 			// data = data.slice(x+1, data.length);
// // 			data = JSON.parse(data);
// // 			if (data=='expired'){
// // 				$('.expired').addClass('hThi');
// // 				 setTimeout(function(){
// // 				$('.expired').removeClass('hThi');
// // 				 }, 800);
// // 				$('.close').click(function() {
// // 				$('.expired').removeClass('hThi');
// // 				});
// // 			}else if(data=='limit'){
// // 				$('.limit').addClass('hThi');
// // 				 setTimeout(function(){
// // 				$('.limit').removeClass('hThi');
// // 				 }, 800);
// // 				$('.close').click(function() {
// // 				$('.limit').removeClass('hThi');
// // 				});
// // 			}else if (data =='done') {
// // 				$('.quantity').html(quantity+1);
// // 				$('.messageAddToCart').addClass('hThi');
// // 				 setTimeout(function(){
// // 				$('.messageAddToCart').removeClass('hThi');
// // 				 }, 800);
// // 				$('.close').click(function() {
// // 				$('.messageAddToCart').removeClass('hThi');
// // 				}); 
// // 			}
// // 		});
// // 	})
// // },false);

document.addEventListener("DOMContentLoaded",function(){

		// console.log(JSON.parse(localStorage.getItem("cart")));
	
	$('body').on('click','.addToCart',function () {
		var sl=1;
		var name      =	$(this).prev().prev().prev().find('.name').text();
		var pricesale = $(this).prev().prev().find('.priceSale').text();
		var price     = $(this).prev().prev().find('.price').text();	
		var dl 		  = $(this).prev().prev().next().next().find('.price').text();
		var	id 		  =	parseInt($(this).children(":first").val());
		var prices     = $(this).prev().prev().prev().find('.priceSale').text();	
		
		console.log(prices);
			var item ={ ID: id,Product: name,  Price: price, priceSale:pricesale, sl: sl };
			if(localStorage.getItem("cart")){
				cart =JSON.parse((localStorage.cart));		
				for(var i = 0 in cart) {
		            if(cart[i].ID ===id) {		         
		                    cart[i].sl += sl;  // replace existing Qty
		                 	localStorage.cart = JSON.stringify(cart);
		                 	return;}}
			                cart.push(item);
			           	    localStorage.cart = JSON.stringify(cart);
				} else {
				 		var cart = [];
						data=localStorage .setItem('cart',cart);
							var item = { ID: id ,Product: name,  Price: price , priceSale:pricesale, sl: sl }; 
							cart.push(item);
							 localStorage.cart = JSON.stringify(cart);
					}

					

    

	});


});
