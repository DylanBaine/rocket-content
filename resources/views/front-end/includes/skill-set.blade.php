@foreach($skillSet as $skillSet)


		<div class="col-md-6 full-height about-me-image flex-center" style="
			background-image: url(images/{{$skillSet->image}});
			background-position: center;
			background-size: cover;
			background-repeat: no-repeat;
		">
				<h1 class="text-center white-font">{{$skillSet->title}}</h1>		
		</div>

		

		<div class="col-md-6 col-xs-12 flex-center full-height about-me-text">
			<div class="">

				<hr style="width: 90%">
				<div class="text-center"> {!! $skillSet->body !!} </div>
				<hr style="width: 90%">

			</div>
				
		</div>



@endforeach