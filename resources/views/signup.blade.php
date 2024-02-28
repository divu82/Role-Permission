@extends('layout')
@section('title', 'SignUp')
@section('navbar_heading', 'SIGNUP PAGE')
@section('content')
<!-- Signup Form -->
<div class="container mt-4">
    <div>
        <button type="button" class="btn btn-primary" onclick="callseeder()">TEST ME AS ADMIN</button>
      </div>
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">{{ __('SignUp') }}</div>
          <div class="card-body">
              @if(session()->has('error'))
                <div>{{ session('error') }}</div>
              @endif
              @if(session()->has('success'))
                <div>{{ session('success') }}</div>
              @endif
              <form method="POST" action="{{ route('signup.post') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="userType">{{ __('User Type') }}</label>
                    <select id="userType" class="form-control" name="user_type">
                    @foreach($roles as $role)
                    <option value="{{ $role->role_name }}">{{ $role->role_name }}</option>
                    @endforeach
                </div>
                <div></div>
                <div class="form-group">
                    <label for="signupName">Name</label>
                    <input id="signupName" type="text" class="form-control" name="name" oninput="validation(1)">
                    <span id="nameError" role="alert"></span></span>
                </div>
                  <div class="form-group">
                    <label for="signupDOB">{{ __('Date of Birth') }}</label>
                    <input id="signupDOB" type="date" class="form-control @error('dob') is-invalid @enderror" name="dob" value="{{ old('dob') }}" oninput="validation(2)">
                        @error('dob')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                  </div>
                  <div class="form-group gender-section">
                    <div>
                        <label>{{ __('GENDER') }}</label>
                    </div>
                    <div class="select-gender">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="maleGender" value="m">
                            <label class="form-check-label" for="maleGender">{{ __('MALE') }}</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="femaleGender" value="f">
                            <label class="form-check-label" for="femaleGender">{{ __('FEMALE') }}</label>
                        </div>
                    </div>
                    @error('gender')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="signupmobile">{{ __('Mobile') }}</label>
                    <input id="signupmobile" type="text" class="form-control" name="mobile" oninput="validation(4)"  >
                        <span id="mobileError"></span>
                  </div>
                  <div class="form-group">
                    <label for="signupEmail">{{ __('Email') }}</label>
                    <input id="signupEmail" type="email" class="form-control" name="email" oninput="validation(5)" >
                            <span id="emailError"></span>
                  </div>
                  <div class="form-group">
                    <label for="signupPassword">{{ __('Password') }}</label>
                    <input id="signupPassword" type="password" class="form-control @error('password') is-invalid @enderror" name="password" oninput="validation(6)">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                  </div>
                  <div class="form-group">
                    <label for="">Upload Image</label>
                    <input type="file" name="image" class='form-control'>
                </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary">{{ __('Signup') }}</button>
                    <a class="nav-link" href="{{ route("login") }}">LOGIN</a>
                  </div>
              </form>
          </div>
      </div>
    </div>
  </div>
</div>
@endsection
