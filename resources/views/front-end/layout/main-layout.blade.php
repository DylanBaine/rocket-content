<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<title>Dylan Baine</title>

	<link rel="stylesheet" href="{!! asset('css/app.css') !!}">


</head>
<body>
	<div class="container-fluid">
		


		@if(Auth::user())
			@include('back-end.includes.cms-nav')
		@endif

		@yield('content')
	</div>
	<script src="js/app.js" ></script>
	<script src="js/scripts.js"></script>
</body>
</html>