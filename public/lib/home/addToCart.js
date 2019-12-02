// document.addEventListener("DOMContentLoaded",function(){
// 	$('body').on('click','.addToCart',function () {
// 		var	id=parseInt($(this).children(":first").val());
// 		var quantity = parseInt($('.quantity').html());
// 		$.ajax({
// 			url: '/project2/Home/addToCart',
// 			type: 'POST',
// 			data: {id: id,sl:1}
// 		})
// 		.done(function() {

// 		})
// 		.fail(function() {

// 		})
// 		.always(function(data) {
// 			// x = data.indexOf(">");
// 			// data = data.slice(x+1, data.length);
// 			data = JSON.parse(data);
// 			if (data=='expired'){
// 				$('.expired').addClass('hThi');
// 				 setTimeout(function(){
// 				$('.expired').removeClass('hThi');
// 				 }, 800);
// 				$('.close').click(function() {
// 				$('.expired').removeClass('hThi');
// 				});
// 			}else if(data=='limit'){
// 				$('.limit').addClass('hThi');
// 				 setTimeout(function(){
// 				$('.limit').removeClass('hThi');
// 				 }, 800);
// 				$('.close').click(function() {
// 				$('.limit').removeClass('hThi');
// 				});
// 			}else if (data =='done') {
// 				$('.quantity').html(quantity+1);
// 				$('.messageAddToCart').addClass('hThi');
// 				 setTimeout(function(){
// 				$('.messageAddToCart').removeClass('hThi');
// 				 }, 800);
// 				$('.close').click(function() {
// 				$('.messageAddToCart').removeClass('hThi');
// 				}); 
// 			}
// 		});
// 	})
// },false);
// if (localStorage) {
//   LocalStorage is supported
// } else {
//    No support. Fallback here!
// }



document.addEventListener("DOMContentLoaded",function(){
		
		 // $(function () {
   //          if (localStorage.cart)
   //          {
   //              cart = JSON.parse(localStorage.cart);
   //              showCart();
   //          }
   //      });     
	 	
	$('body').on('click','.addToCart',function () {

		var sl=1;
		var name      =	$(this).prev().prev().prev().find('.name').text();
		var pricesale = $(this).prev().prev().find('.priceSale').text();
		var price     = $(this).prev().prev().find('.price').text();	
		var dl 		  = $(this).prev().prev().next().next().find('.price').text();
		var id        = $(this).prev().find(".note").text();

			var item ={ Product: name,  Price: price, sl: sl };
			if(localStorage.getItem("cart")){
				cart =JSON.parse((localStorage.cart));		
				for(var i = 0 in cart) {
						console.log(JSON.parse((localStorage.cart)));
		            if(cart[i].Product == name) {
		                console.log('helo');
		                    cart[i].sl += sl;  // replace existing Qty
		                 	localStorage.cart = JSON.stringify(cart);
		                 	return;}}
			                cart.push(item);
			           	    localStorage.cart = JSON.stringify(cart);

					// var item = { Product: name,  Price: price, sl: sl }; 
					// 	cart.push(item);
				}
			else {
			 		var cart = [];
					data=localStorage .setItem('cart',cart);
						var item = { Product: name,  Price: price, sl: sl }; 
						cart.push(item);
						 localStorage.cart = JSON.stringify(cart);

				}
				

		// var product={
		// 	'name':$(this).prev().prev().prev().find('.name').text(), 
		// 	'price':$(this).prev().prev().find('.price').text(),
		// 	'pricesale':$(this).prev().prev().find('.priceSale').text()}

						
 // if ( window.localStorage)
            // {
                localStorage.cart = JSON.stringify(cart);
            // }
		
// data = JSON.parse(JSON.stringify(product));
// 	console.log(data);
// 	i=i+1;
// localStorage.setItem(i, JSON.stringify(product));

// localStorage.cart=JSON.opesify (data);
 // data.push(price);




	});

});
