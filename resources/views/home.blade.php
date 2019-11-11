@extends('layouts.app')

@section('content')
<!--
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div> -->

    <div class="section section-buttons">
        <div class="container">
            <div class="title">
                    <h2>Latest videos</h2>

                    @if(request()->has('search')  && request()->get('search') != '')

                    You are search on  <b> {{ request()->get('search')  }} </b> | 
                    <a href=" {{ route('home') }} "> Reset </a>

                @endif

            </div>




            @include('front_end.shared.video_row')


        </div>
    </div>





@endsection
