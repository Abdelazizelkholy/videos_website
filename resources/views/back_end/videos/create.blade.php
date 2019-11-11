@extends('back_end.layouts.app')










@section('title')

	 {{ $pageTitle }}

@endsection




@section('content')


@component('back_end.layouts.header')

	@slot('nav_title')
		{{ $pageTitle }}

	@endslot
	

@endcomponent


@component('back_end.shared.create' , ['pageTitle'=>$pageTitle , 'pagesDes'=>$pagesDes ])
                  <form action=" {{ route($routeName.'.store') }} " method="POST" enctype= "multipart/form-data" >

                        @include('back_end.'.$folderName.'.form')

                    <button type="submit" class="btn btn-primary pull-right">Create {{ $moduleName }}</button>
                    <div class="clearfix"></div>
                  </form>

	
@endcomponent




@endsection




