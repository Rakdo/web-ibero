@extends('layouts.master')

@section('content')
<div class="container landingdiv">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="cardstyle">
                <div class=""><h1>{{ __('Login') }}</h1></div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6" style="margin-bottom: 2%;">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row" style="margin-bottom: 2%">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                       

                        <div class="form-group row mb-0">
                            <div class="col-md-6 " style="text-align: right;">
                                 <a href="{{route('register') }}" class="btn  buttonsregister" style="margin-right: 4%"> 
                                    {{ __('Sign up ') }}<ion-icon name="add-outline" style="transform: translate(0%, 14%);"></ion-icon>
                                </a></div>
                                 <div class="col-md-6 ">
                                <button type="submit" class="btn  buttonslogin" style="margin-left: 4%">
                                    {{ __('Login ') }} <ion-icon name="arrow-forward-outline" style="transform: translate(0%, 14%);"></ion-icon>
                                </button></div>
                                

                              
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
