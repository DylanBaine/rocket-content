@foreach($portfolio as $portfolio)
<article class="col">
	<header class="col-md-12 text-center" style="padding: 20vh 0;">
		<h2>{{$portfolio->title}}</h2>
	</header>
	<section class="col-md-12">
		<figure class="col-md-12">
			<img src="portfolios/images/{{$portfolio->image}}" alt="{{$portfolio->title}}" style="width: 100%;">
		</figure>
		<hr class="col-md-12">
		<div class="col-md-12 text-center" style="padding: 20px;">
			{!! $portfolio->body !!}
		</div>
		<hr class="col-md-12">
		<br>
		<div class="col-md-8 col-md-offset-2 well">

			<a href="/home" class="btn btn-success btn-block">Add New</a>
			<br>
			<a href="/portfolio/{{$portfolio->id}}/edit" class="btn btn-primary btn-block">Edit</a>
			<br>
			<form action="/portfolio/{{$portfolio->id}}" method="POST">

				{{csrf_field()}}

				{{method_field('DELETE')}}

				<input type="submit" value="Delete" class="btn btn-danger btn-block">
			</form>

				<br>
				<small>Created about: {{$portfolio->created_at->diffForHumans() }}</small>
				<br>
				<small>Updated about: {{$portfolio->updated_at->diffForHumans()}}</small>			
		</div>
	</section>
</article>
@endforeach