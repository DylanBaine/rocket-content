@extends('layouts.app')

@section('content')

@component('mail::message')
	{!! $email->content !!}
@endcomponent

@stop