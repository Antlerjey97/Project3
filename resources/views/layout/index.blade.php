<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="_token" content="{{ csrf_token() }}">
@include('layout.link')
	<title>Trang web mua bán online</title>
</head>

<body>
@include('layout.header')
@include('layout.slidebanner')
@yield('content')

@include('layout.footer')
</body>

@yield('script')
<script>

</script>
</html>