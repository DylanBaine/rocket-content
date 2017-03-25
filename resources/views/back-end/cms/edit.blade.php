@extends('back-end.layout.main-layout')

@section('content')


	<div class="containter-fluid">


		<div class="col">

			@include('back-end.includes.master-header-form')

			@include('back-end.includes.about-me-form')

			@include('back-end.includes.skill-set-form')
		</div>
	</div>

@endsection