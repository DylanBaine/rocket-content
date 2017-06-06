<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">	
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Pencil Rocket Dev</title>


	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="https://www.dylanbaine.com/css/app.css">

	<style>
		*{
			padding: 0px;
		}
		body::-webkit-scrollbar { 
    		display: none;

		}
		.body::-webkit-scrollbar {
			display:  block;
		}
		header{
			width: 100vw;
		}
		p{
			padding:20px;
		}
		.keep-scrolling-cont{
			position: fixed;
			z-index: 99999999;
			width: 100vw;
			text-align: center;
			font-size:  1.5em;
		}
		.keep-scrolling{
			transform: rotate(90deg);

		}
		.keep-scrolling-up{
			transform: rotate(-90deg);
		}
		
	</style>
</head>
<body style="height: 450vh; background-image: url('http://free4kwallpaper.com/wp-content/uploads/2016/01/Deep-Space-4K-Wallpaper.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat;">		

	<div class="keep-scrolling-cont">
		<h1><span class="keep-scrolling-up glyphicon glyphicon-chevron-right"></span>Scroll<small>to take an adventure</small><span class="keep-scrolling glyphicon glyphicon-chevron-right"></span></h1>
	</div>

	<header class="full-height flex-center hero" style=" position: fixed; width: 100vw; z-index: 999;">
		<div>
			<div class="bg-l col-xs-6 full-height flex-center" style="position: absolute; top: 0; left: 0;background-color: orange;"><h1 style="margin-right: 50px;">PENCIL</h1></div>
			<img class="rocket" style="position: relative; z-index: 999; transition: margin .5s; width: 200px;" src="{{asset('images/PencilRocket.png')}}" alt="rocket!">
			<div class="bg-r col-xs-6 col-xs-offset-6 full-height flex-center" style="position: absolute; top: 0; left: 0;background-color: orange;"><h1 style="margin-left: 50px;">ROCKET</h1></div>				
		</div>
	</header>

	


	<div class="body text-center" style="background-color: rgba(255, 255, 255, .5); color: black; margin-top: 300vh; position: fixed; transition: all 2s; height: 100vh; overflow-y: scroll; z-index: 999;">

		<section>
			
			<header class="half-height flex-center" style="background-color: orange; color: white;">
				<div>
					<h3>Thank you for visiting!</h3>				
				</div>			
			</header>
			<article class="half-height flex-center">
				
				<div>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa, dolores. Dolorem veniam sunt voluptate qui alias dolor, saepe, minus totam itaque rerum eligendi fuga. Consectetur earum quam nesciunt iste, reprehenderit.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Esse delectus, temporibus rem sint quas quasi ipsum nisi? Nihil officia sed, aliquid, doloremque voluptas perferendis magnam excepturi praesentium reiciendis eius sint!</p>
				</div>


			</article>

		</section>

		<section>
			
			<header class="half-height flex-center" style="background-color: orange; color: white;">
				<div>
					<h3>About</h3>				
				</div>			
			</header>
			<article class="half-height flex-center">
				
				<div>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa, dolores. Dolorem veniam sunt voluptate qui alias dolor, saepe, minus totam itaque rerum eligendi fuga. Consectetur earum quam nesciunt iste, reprehenderit.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Esse delectus, temporibus rem sint quas quasi ipsum nisi? Nihil officia sed, aliquid, doloremque voluptas perferendis magnam excepturi praesentium reiciendis eius sint!</p>
				</div>


			</article>

		</section>

		<section>
			
			<header class="half-height flex-center" style="background-color: orange; color: white;">
				<div>
					<h3>Portfolio</h3>				
				</div>			
			</header>
			<article class="flex-center">
				
				<div class="col-xs-12" style="padding: 0;">
					<div class="col-md-4 flex-center half-height" style="background-color: red;">
					item one
					</div>
					<div class="col-md-4 flex-center half-height" style="background-color: salmon;">
					item two
					</div>
					<div class="col-md-4 flex-center half-height" style="background-color: purple;">
					item three
					</div>
					<div class="col-md-4 flex-center half-height" style="background-color: green;">
					item four
					</div>
					<div class="col-md-4 flex-center half-height" style="background-color: purple;">
					item five
					</div>
				</div>


			</article>
			
		</section>	
	
		<footer class="half-height flex-center" style="background-color: black; color: white;">

			<div class="text-center">
				<h3>Thanks for checking this out!</h3> Wanna go back to my portfolio? <a href="/">Click Me!</a>
			</div>
		
		</footer>

	</div>

	<img class="spinner" src="{{asset('images/PencilRocket.png')}}" style="width: 20px; position: fixed; top: 85vh; left: 90vw; z-index: 99999;">

	

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script>
		$(document).scroll(function(){
			bgLeftScroll = $(document).scrollTop();
			bgRightScroll = $(document).scrollTop() + $(window).width() / 2;

			$('.bg-l').css({
				'margin-left' : '-' + bgLeftScroll + 'px'
			});
			$('.bg-r').css({
				'margin-left' : bgRightScroll + 'px'
			});
			$('.rocket').css({
				'transform' : 'rotate(-' + bgLeftScroll / 100 + 'deg)',
				'width' : Math.pow(bgLeftScroll / 10000, -1 ) + 'px',
			});
			$('.spinner').css({
				'transform' : 'rotate(' + bgLeftScroll / 5 + 'deg)'
			})


			if(bgLeftScroll < $(window).height() / 19){
				$('.rocket').css({
					'width' : '200px'
				});				
			}

			if(bgLeftScroll > $(window).height() * 3){
				$('.rocket').css({
					'margin-top' : '-600vh',
					'margin-left' : '-100vw',
					'width' : '50px;'
				});
				$('.body').css({
					"margin-top" : '0px'
				});
				$('.spinner').css({
					'transform' : 'rotate(355deg)',
					'transition' : 'all .3s'
				});
			}
			if(bgLeftScroll < $(window).height() * 3){
				$('.rocket').css({
					'margin-top' : '0',
					'margin-left' : '0'
				});
				$('.body').css({
					"margin-top" : '200vh'
				});
			}


		});
	</script>
</body>
</html>