<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
      body{
        background-color: beige;
      }
      .bg-light{
        background-color: #e1c88c!important;
      }
      .navbar-light .navbar-nav .nav-link {
        font-size: larger;
        font-weight: 700;
        color: rgb(0, 0, 0);
        margin: 13px;
      margin-bottom: 0px;
      margin-top: 0px;
    margin-right: 8px;
}
</style>
</head>
<body>
  @if (!request()->is('/'))
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    @if(Auth::check())  
    <div class="container">
        <a class="navbar-brand" href="{{route('landing') }}">
          <img src="{{ asset('shopme-logo.png') }}" alt="Logo" style="max-height: 60px; border-radius:100%">
      </a>
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="{{ route("landing") }}">Home</a>
        </li>
          <li class="nav-item">
              <a class="nav-link" href="{{ route("signup") }}">SignUp</a>
          </li>
          <li>
            <a class="nav-link" href="{{ route("login") }}">LOGIN</a>
          </li>
          <li>
            <a class="nav-link" href="{{ route("logout") }}">LOGOUT</a>
          </li>
        </ul>
      @endif
          <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
              <h1 class="navbar-heading">@yield('navbar_heading')</h1>
          </div>
          @if(Auth::check())
          <div class="navbar-right" id="navbarSupportedContent">
            <a class="nav-right" href="#">shopme-support@gmail.com</a>
          </div>
          @endif
      </div>
  </nav>

  @endif
<div class="container mt-4">
    @yield('content')
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
  function handleButtonClick(route) {
    $.ajax({
      url: route === 'login' ? "{{ route('login') }}" : "{{ route('signup') }}",
      method: 'GET', 
      success: function(response) {
        window.location.href = route === 'login' ? "{{ route('login') }}" : "{{ route('signup') }}";
      },
      error: function(xhr, status, error) {
        console.error(error);
      }
    });
  }
  function validation(value){
    switch (value){
      case 1: 
            var name = $('#signupName').val();
            const regex = /^[A-Za-z]+(?: [A-Za-z]+)?$/;
              if (name.trim() === '') {
                  $('#nameError').text('Name is required');
              }
              else if(!regex.test(name)){
                $('#nameError').text('Enter Valid Name');
              }
              else {
                  $('#nameError').text('');
              }
      break;
      case 4: 
      var mobile = $('#signupmobile').val();
            const mobileRegex = /^(?:\+?91|0)?[6789]\d{9}$/;
              if (mobile.trim() === '') {
                  $('#mobileError').text('Mobile Number is required');
              }
              else if(!mobileRegex.test(mobile)){
                $('#mobileError').text('Enter a Valid Mobile Number');
              }
              else {
                  $('#mobileError').text('');
              }
      break;
      case 5:
            var email = $('#signupEmail').val();
              var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
              if (!emailPattern.test(email)) {
                  $('#emailError').text('Enter a valid email address');
                  return false;
              } else {
                  $('#emailError').text('');
                  return true;
              }
      break;
    }
  }
  function callseeder(){
    console.log("seeder function call ho gya");
    $.ajax({
      url:"{{ route('seeder') }}",
      method: 'GET', 
      success: function (response){
        response=='TRUE'?"{{ route('home') }}":"{{ route('signup') }}"
      },
        error: function (error) {
            console.error(error);
        }
    });
}
</script>
</body>
</html>
