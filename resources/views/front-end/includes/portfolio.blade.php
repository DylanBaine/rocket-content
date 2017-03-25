@foreach($portfolio as $portfolio)

	<div class="half-height flex-center col-md-12 col-xs-12">
		<div>
			<h1 class="text-center portfolio-header" style="font-size: 222%;">{{$portfolio->title}}</h1>	
			<small><a href="{{$portfolio->link}}" target="_blank">{{$portfolio->link}}</a></small>
		</div>
		
	</div>
	

	<figure id="portfolio-image" class="col-md-10 col-md-offset-1 col-xs-12">
			<img src="portfolios/images/{{$portfolio->image}}" alt="{{$portfolio->title}}" class="col-md-10 col-md-offset-1 col-xs-10 col-xs-offset-1">		
	</figure>


	<article id="portfolio-article">

		<div class="col-md-12 col-xs-12 flex-center half-height about-me-text text-center" style="padding: 20px;">
			<div>{!! $portfolio->body!!}</div>				
		</div>

	</article>


@endforeach