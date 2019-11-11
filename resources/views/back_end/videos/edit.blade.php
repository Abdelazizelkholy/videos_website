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

		           
                  <form action=" {{ route($routeName.'.update' , $row) }} " method="POST" 
                  enctype= "multipart/form-data" >

                      {{ method_field('put') }}

                        @include('back_end.'.$folderName.'.form')
                      

                    <button type="submit" class="btn btn-primary pull-right">Update {{ $moduleName }} </button>
                    <div class="clearfix"></div>
                  </form>
               

                  @slot('md4')

                  @php

                  $url = getYoutubeId($row->youtube)

                  @endphp

                  @if($url)
                  <iframe width="250"  src="https://www.youtube.com/embed/{{ $url }}" 
                   style="margin-bottom: 20px;" frameborder="0" allowfullscreen> 	
                  </iframe>

                  @endif

                  <img src="{{ url('uploads/'. $row->image) }}" width="250px;" >

                  @endslot


@endcomponent



    @component('back_end.shared.edit' , ['pageTitle' => "Comments" , 'pagesDes' => "here we can Control comments"])
      
      @include('back_end.comments.index')
        
        
        @slot('md4')

            @include('back_end.comments.create')
       
        @endslot

    @endcomponent

@endsection




