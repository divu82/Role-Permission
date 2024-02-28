<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShopMe.com</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    @include('website_css');
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{ route('landing') }}">
            <img src="{{ asset('shopme-logo.png') }}" alt="Logo" style="max-height: 100px;border-radius: 50%;">
        </a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route("landing") }}">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route("logout") }}">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="jumbotron text-center">
    <div>
        <h1>Permissions!</h1>
        <hr style="border:2px solid none">
        <br>
        <ul>
            @foreach($assigned_permissions as $permission_assigned)
                <a class="permission_links" href="#">
                    <li style="margin-left:15px;font-size:large; font-weight:700;">
                        {{ $permission_assigned->permissions->permission_name ?? 'Permission Not Found' }}
                    </li>
                </a>
                <br>
            @endforeach
        </ul>
    </div>
    <div>
        <h1 class="display-4">Welcome, {{ Auth::user()->name }}!</h1>
        <p class="lead">Let's Start Listing Journey Begin!</p>
    </div>
</div>
<div class="container">
    <div class="row featurette">
        <div class="col-md-7">
            <h2 class="featurette-heading">Product 1:<span class="text-muted">Product 1-Name</span></h2>
            <p class="lead">Product 1- Description</p>
            <button class="btn btn-primary mr-2">Add to Product</button>
            <button class="btn btn-success">Edit product</button>
        </div>
        <div class="col-md-5">
            <img class="featurette-image img-fluid mx-auto" src="https://via.placeholder.com/500" alt="Generic placeholder image">
        </div>
    </div>
    <hr class="featurette-divider">
    <div class="row featurette">
        <div class="col-md-7 order-md-2">
            <h2 class="featurette-heading">Product 2: <span class="text-muted">Product 2-Name</span></h2>
            <p class="lead">Product 2-Description</p>
            <button class="btn btn-primary mr-2">Add to Product</button>
            <button class="btn btn-success">Edit product</button>
        </div>
        <div class="col-md-5 order-md-1">
            <img class="featurette-image img-fluid mx-auto" src="https://via.placeholder.com/500" alt="Generic placeholder image">
        </div>
    </div>
    <hr class="featurette-divider">
    <div class="row featurette">
        <div class="col-md-7">
            <h2 class="featurette-heading">Product 3:<span class="text-muted">Product 3-Name</span></h2>
            <p class="lead">Product 3-Description</p>
            <button class="btn btn-primary mr-2">Add to Product</button>
            <button class="btn btn-success">Edit product</button>
        </div>
        <div class="col-md-5">
            <img class="featurette-image img-fluid mx-auto" src="https://via.placeholder.com/500" alt="Generic placeholder image">
        </div>
    </div>
    <hr class="featurette-divider">
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
