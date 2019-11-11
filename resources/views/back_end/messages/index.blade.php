@extends('back_end.layouts.app')



@section('title')
    {{ $pageTitle }}
@endsection





@section('content')


@component('back_end.layouts.header')

  @slot('nav_title')
     {{$pageTitle }}
  @endslot
  

@endcomponent
   

@component('back_end.shared.table' , ['pageTitle'=> $pageTitle , 'pagesDes'=>$pagesDes])

                @slot('addbutton')
                 
                    @endslot


                    <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                        <tr><th>
                          ID
                        </th>
                        <th>
                          Name
                        </th>
                         <th>
                          Email
                        </th>
                      
                        <th class="text-right">
                          Control
                        </th>
                        
                      </tr></thead>
                      <tbody>
                          
                          @foreach( $rows as $row )

                            <tr>
                              <td>{{ $row->id }}</td>
                              <td> {{ $row->name }} </td>
                              <td> {{ $row->email }} </td>
                              <td class="td-actions text-right">
                                   @include('back_end.shared.buttons.edit' ) 
                                   @include('back_end.shared.buttons.delete') 
                                   
                               </td>
                            </tr>

                          @endforeach


                      </tbody>
                    </table>
                     <div class="text-center">
                      {{ $rows->links() }}
                    </div>
                  </div>



@endcomponent

          


@endsection




