@extends('back_end.layouts.app')










@section('title')

	 {{$pageTitle }}

@endsection




@section('content')


@component('back_end.layouts.header')

	@slot('nav_title')
		 {{$pageTitle }}
	@endslot
	

@endcomponent


	
@component('back_end.shared.edit' , ['pageTitle' => $pageTitle , 'pagesDes'=>$pagesDes])

		           
                 

                        @include('back_end.'.$folderName.'.form')
                      


@endcomponent




@endsection




