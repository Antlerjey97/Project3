<link rel="stylesheet" href="/lib/home/css/bootstrap.min.css">
<script type="text/javascript" src='/lib/home/js/jquery.min.js'></script>
<script type="text/javascript" src='/lib/home/js/jquery.easing.1.3.js'></script>
<script type="text/javascript" src='/lib/home/js/bootstrap.min.js'></script>
<link rel="stylesheet" href="/lib/home/font/css/fontawesome-all.css">
<link rel="stylesheet" href="/lib/home/menu.css">
<link rel="stylesheet" href="/lib/home/home.css">
<link rel="stylesheet" href="/lib/home/slideBanner.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script type="text/javascript" src='/lib/home/addToCart.js'></script>
<script type="text/javascript" src='/lib/home/up.js'></script>
<base href="{{asset('')}}">


<script>document.addEventListener("DOMContentLoaded",function(){

		// console.log(JSON.parse(localStorage.getItem("cart")));
	
$('body').on('click','.giohang',function(){
				console.log('helo');
		console.log(JSON.parse(localStorage.cart));
		           $.ajax({
						url: 'pages/cart', 
					    type: 'POST',  
					    data: { 
					    	dl:JSON.parse(localStorage.cart),_token: '{{ csrf_token() }}' 
					    }
					     
					});
});

});
</script>