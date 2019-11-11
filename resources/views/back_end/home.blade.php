@extends('back_end.layouts.app')

@section('title')

	Home Page

@endsection


@push('css')

	
@endpush


@section('content')

<!--
@component('back_end.layouts.header' , ['nav_title'=>'Home page'])

	

@endcomponent
-->
@component('back_end.layouts.header')

	@slot('nav_title')
		Home Page
	@endslot
	

@endcomponent


@include('back_end.home_section.statics')
@include('back_end.home_section.lastest_comment')









@endsection



  @push('js')

 
  @endpush


