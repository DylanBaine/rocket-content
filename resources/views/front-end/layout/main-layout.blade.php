<!DOCTYPE html>
<html lang="en">
<head>
	
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Dylan Baine</title>

    <link rel="icon"
        type="image/png" 
        href="images/profile-pic-1490137706.jpg">
    <!--og and twitter tags-->
    <meta property="og:title" content="Dylan Baine. Web Developer">
    <meta property="og:type" content="website"> 
    <meta property="og:image" content="images/profile-pic-1490137706.jpg"> 
    <meta property="og:url" content="https://dylanbaine.frb.io">  

    <meta name="twitter:title" content="Dylan Baine. Web Developer.">
    <meta name="twitter:image" content="images/profile-pic-1490137706.jpg">


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