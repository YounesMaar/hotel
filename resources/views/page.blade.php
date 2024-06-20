@extends('layouts.app2')

@section('title')
welcome | Laravel Employes App 
@endsection

<style>
  #myVideo {
    position: fixed;
    right: 0;
    bottom: 0;
    min-width: 100%;
    min-height: 100%;
}
 </style>
@section('content')
<div class="container">
<video autoplay muted loop id="myVideo">
    <source src="{{asset('WhatsApp Video 2024-03-20 at 11.12.38.mp4')}}" type="video/mp4">
    Your browser does not support HTML5 video.
</video>
    <div class="row justify-content-center">
        <div class="row my-5">
            <div class="col-md-6 mx-auto">
                <div class="card">
                  <div class="card-header bg-light">
                      <h3 class="p-2">welcome back</h3>
                  </div>
                  <div class="card-header">
                    
                      
                      <a href="{{ url('home') }}" class="btn btn-outline-primary">Home</a>
                      
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection