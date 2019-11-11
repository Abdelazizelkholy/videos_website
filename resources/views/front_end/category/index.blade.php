@extends('layouts.app')

@section('title' , $cat->name)

@section('content')


    <div class="section section-buttons">
        <div class="container">
            <div class="title">
                    <h1> {{ $cat->name }} </h1>

            </div>

           @include('front_end.shared.video_row')

        </div>
    </div>





@endsection
