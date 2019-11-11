@extends('layouts.app')

@section('title' , 'Home Page')

@section('content')


@include('front_end.homepage_section.home_image')
@include('front_end.homepage_section.videos')
@include('front_end.homepage_section.statics')
@include('front_end.homepage_section.contactus')




  @endsection