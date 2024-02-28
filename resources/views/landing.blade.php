@extends('layout')
@section('title', 'HomePage')
@section('content')
    <header class="mt-4 mb-4">
        <div class="row">
            <div class="col text-left">
                <a href="{{route('landing') }}"><img src="{{ asset('shopme-logo.png') }}" alt="Logo" style="max-height: 200px; border-radius:100%"></a>
            </div>
            <div class="col text-center">
                <h1>Shopme.com</h1>
                <h2>Want to Shop?Stop!</h2>
            </div>
            <div class="col text-right">
                <p>shopme-support@gmail.com</p>
            </div>
        </div>
    </header>

    <div class="text-center">
        <div class="jumbotron">
            <h2>Welcome to our Website!</h2>
            <p>What would you like to do?</p>
            <div class="row">
                <div class="col-md-6">
                    <button id="loginButton" class="btn btn-primary btn-lg btn-block" onclick="handleButtonClick('login')">Login</button>
                </div>
                <div class="col-md-6">
                    <button id="signupButton" class="btn btn-success btn-lg btn-block" onclick="handleButtonClick('signup')">Signup</button>
                </div>
            </div>
        </div>
    </div>
@endsection
