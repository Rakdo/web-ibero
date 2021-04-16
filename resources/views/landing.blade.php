@extends('layouts.master')

@section('content')
<div class="px-4 pt-5 my-5 text-center landingdiv">
  <h1 class="display-4 fw-bold">App for tasks </h1>
  <div class="col-lg-6 mx-auto ">
    <p class="lead mb-4">This is a school project in order to learn laravel and its uses, feel free to use it as you please :D</p>
    <div class="d-grid gap-2 d-sm-flex justify-content-sm-center mb-5">
      <a href="{{route('register') }}"><button type="button" class="btn  btn-lg px-4 me-sm-3 buttonsregister">Sign up</button></a>
      <a  href="{{route('login') }}"><button type="button" class="btn btn-outline-secondary btn-lg px-4 buttonslogin">Login</button></a>
    </div>
  </div>
</div>
@endsection