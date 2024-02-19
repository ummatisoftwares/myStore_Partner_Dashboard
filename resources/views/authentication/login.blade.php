@extends('layouts.authentication.master')
@section('title', 'Login-bs-tt-validation')

@section('css')
@endsection

@section('style')
@endsection

@section('content')
<div class="container-fluid">
   <div class="row">
      <div class="col-xl-7"><img class="bg-img-cover bg-center" src="{{asset('assets/images/login/2.jpg')}}" alt="looginpage"></div>
      <div class="col-xl-5 p-0">
         <div class="login-card">
            <div>
               <div><a class="logo text-start"><img class="img-fluid for-light" src="{{asset('assets/images/logo/login.png')}}" alt="looginpage"><img class="img-fluid for-dark" src="{{asset('assets/images/logo/logo_dark.png')}}" alt="looginpage"></a></div>
               <div class="login-main">
                  <form class="theme-form needs-validation" action="{{ route('authenticate') }}" method="post">
                     @csrf
                     <h4>Sign in to account</h4>
                     <p>Enter your email & password to login</p>

                     @if (session('message'))
                        <div class="alert alert-success dark alert-dismissible fade show" role="alert">
                            <strong>Success!</strong> {{ session('message') }}
                            <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close" data-bs-original-title="" title=""></button>
                        </div>
                     @endif

                     @if (session('errorMessage'))
                        <div class="alert alert-danger dark alert-dismissible fade show" role="alert">
                            <strong>Error!</strong> {{ session('errorMessage') }}
                            <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close" data-bs-original-title="" title=""></button>
                        </div>
                     @endif

                     <div class="form-group">
                        <label class="col-form-label">Email Address</label>
                        <input class="form-control @error('email') is-invalid @enderror" type="email" id="email" name="email" value="{{ old('email') }}" placeholder="Test@gmail.com">
                        <!-- <div class="invalid-tooltip">Please enter proper email.</div> -->
                        @if ($errors->has('email'))
                            <span class="invalid-tooltip">{{ $errors->first('email') }}</span>
                        @endif
                     </div>
                     <div class="form-group">
                        <label class="col-form-label">Password</label>
                        <input class="form-control @error('password') is-invalid @enderror" id="password" name="password" type="password" placeholder="*********">
                        @if ($errors->has('password'))
                            <span class="invalid-tooltip">{{ $errors->first('password') }}</span>
                        @endif
                        <div class="show-hide"><span class="show">                         </span></div>
                     </div>
                     <div class="form-group mb-0">
                        <!-- <div class="checkbox p-0">
                           <input id="checkbox1" type="checkbox">
                           <label class="text-muted" for="checkbox1">Remember password</label>
                        </div> -->
                        <button class="btn btn-primary btn-block" type="submit" value="Login">Sign in</button>
                     </div>
                     <p class="mt-4 mb-0">Don't have account?<a class="ms-2" href="{{ route('register') }}">Create Account</a></p>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection

@section('script')
@endsection
