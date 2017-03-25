@extends('front-end.layout.main-layout')


@section('content')

@include('front-end.includes.contact-form')


<div class=" col-md-12 form-btn contact-button-top text-center">
	<div>
		<div class="white-font">
			<small>Contact Me</small>
		</div>
	</div>
</div>

<div class="form-btn hidden-sm hidden-xs visible-md-1 full-height contact-button-left ">
	<div class="full-height flex-center">
		<div class="white-font">
			<small>Contact Me</small>
		</div>
	</div>
</div>



<header id="master-header">
	@include('front-end.includes.master-header')
</header>



<section id="about-me">
	@include('front-end.includes.about-me')
</section>



<section id="skill-set">
	@include('front-end.includes.skill-set')
</section>


<section id="portfolio text-center">
	<header class="col-md-12 half-height flex-center black-bg">
		<div>
			<h1 class="white-font">Recent Work</h1>
		</div>
	</header>
	@include('front-end.includes.portfolio')
</section>


<footer class="col-md-12 flex-center-hor" style="height: 10vh;">
	<div class="col-md-12 col-xs-12 text-center">
		<div class="col-md-6 col-xs-12">
			&copy; - {{Date('Y')}}
		</div>
		<div class="col-md-6 col-xs-12 text-center">
			<a href="http://facebook.com/dylan.baine.7" target="_blank">Facebook</a> |
			<a href="https://github.com/DylanBaine" target="_blank">GitHub</a>
		</div>
	</div>
</footer>





@endsection