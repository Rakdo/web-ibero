@extends('layouts.master')

@section('content')
<div class="px-4 pt-5 my-5 text-center border-bottom">
  <h1 class="display-4 fw-bold">App for tasks </h1>
  <div class="col-lg-6 mx-auto">
    <p class="lead mb-4">This is a school project in order to learn laravel and it uses, feel free to use it as you please :D</p>
    <div class="d-grid gap-2 d-sm-flex justify-content-sm-center mb-5">
      <a href="{{route('register') }}"><button type="button" class="btn btn-primary btn-lg px-4 me-sm-3">Sign up</button></a>
      <a  href="{{route('login') }}"><button type="button" class="btn btn-outline-secondary btn-lg px-4">Login</button></a>
    </div>
  </div>
  <div class="overflow-hidden" style="max-height: 30vh;">
    <div class="container px-5">
      <img src="https://images.pexels.com/photos/167682/pexels-photo-167682.jpeg?cs=srgb&dl=pexels-lumn-167682.jpg&fm=jpg" class="img-fluid border rounded-3 shadow-lg mb-4" alt="Example image" width="2000" height="2000" loading="lazy">
    </div>
  </div>
</div>
@endsection