@extends('back-end.layout.main-layout')

@section('content')
<div class="container-fluid">
	<div class="col">
		@include('back-end.includes.messages')

		@include('back-end.includes.portfolio-form')

		@include('back-end.includes.portfolio')		
	</div>        
</div>
@endsection
