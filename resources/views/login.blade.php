@extends('layout')
@section('title', 'LOGIN')
@section('navbar_heading', 'LOGIN PAGE')
@section('content')
<!-- Login Form -->
<div class="container mt-4">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">LOGIN</div>
          <div class="card-body">
              @if(session()->has('error'))
                <div>{{ session('error') }}</div>
              @endif
              @if(session()->has('success'))
                <div>{{ session('success') }}</div>
              @endif
              <form method="POST" action="{{ route('login.post') }}">
                @csrf
                <div class="form-group">
                    <label for="loginUsername">Username</label>
                    <input id="loginUsername" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus>
                        @error('email')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                  </div>
                  <div class="form-group">
                    <label for="loginPassword">{{ __('Password') }}</label>
                    <input id="loginPassword" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="current-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary">Login</button>
                    <a class="nav-link" href="{{ route("signup") }}">SignUp</a>
                  </div>
              </form>
          </div>
      </div>
    </div>
  </div>
</div>
@endsection
