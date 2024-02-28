<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    @include('content_css')
</head>
<body>
    {{-- Header --}}
    <header>
    {{-- Navbar --}}
        <nav class="navbar">
            {{-- Main container --}}
            <div class="nav-container">
                    {{-- brand logo --}}
                    <div class="nav-bar-logo">
                        <a class="navbar-brand" href="{{route('landing') }}">
                            <img src="{{ asset('shopme-logo.png') }}" alt="Shopme! Logo" style="max-height: 60px; border-radius:100%">
                        </a>
                    </div>
                    {{-- navigation links --}}
                    <div class="nav-links">
                        <ul>
                            @if(!auth()->check()){
                                <li class="nav-item"><a class="nav-link" href="{{ route("landing") }}">Home</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ route("signup") }}">SignUp</a></li>
                                <li><a class="nav-link" href="{{ route("login") }}">LOGIN</a></li>
                            }
                            @endif
                                {{-- <li><a class="nav-link" href="{{ route("logout") }}">LOGOUT</a></li> --}}
                        </ul>
                    </div>     
                    {{-- Dashboard Title --}}
                    <div class="nav-title">
                        <h1>Admin Dashboard</h1>                
                    </div>
                    {{-- Manage role button --}}
                    @if(strtolower(auth()->user()->userType)=="admin"||strtolower(auth()->user()->userType)=="manager")
                    <div>
                        <a class="nav-link" href="{{ route("manage-role") }}">Manage Roles & Permissions</a>
                    </div>
                    @endif
                    {{-- Admin Details --}}
                    <div class="nav-admin-details">
                    <img src="{{asset('/app/'.auth()->user()->image)}}" alt="Admin Image" style="width:100px;height:100px; border-radius:100%;">
                    {{-- Admin details popup --}}
                    <div class="admin-details-popup" >
                        <img src="{{asset('/app/'.auth()->user()->image)}}" alt="Admin Image" style="width:150px;height:180px; border-radius:100%; margin-left:15px;">
                        Welcome,<h4 style="color:black;">{{auth()->user()->name}}</h4>
                        <hr>
                        <a href="{{ route('logout') }}">Logout</a>
                    </div>
           </div>
        </nav>
    </header>
    {{-- aside Left --}}
    <aside>
        <div>
            <h1>{{Auth::user()->userType}} Permissions!</h1>
            <hr style="border:2px solid none">
            <br>
            {{-- show assigned permissions --}}
            <ul>
                @forEach($assigned_permissions as $permission_assigned)
                <a class="permission_links" href="#"><li style="margin-left:15px;font-size:large; font-weight:700;">
                       {{$permission_assigned->permissions->permission_name}}
                    </li>
                </a>
                    <br>
                @endforeach
            </ul>
        </div>
    </aside>
    {{-- Content Section --}}
    <div class="content">
        <h2 style="text-align:center">Available Users</h2>
        <div class="details-div" style="margin-top:50px; align-items:center" >
            <table id="userdetails">
                <thead>
                    <th>IMAGE</th>
                    <th>ROLE ASSIGNED</th>
                    <th>NAME</th>
                    <th>EMAIL</th>
                    <th>GENDER</th>
                    <th>MOBILE</th>
                    <th>AGE</th>
                    <th>Status</th>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td><img src="{{asset('/app/'.$user->image)}}" alt="Admin Image" style="width:100px;height:100px; border-radius:100%;"></td>
                        <td>{{$user->userType}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->gender}}</td>
                        <td>{{$user->mobile}}</td>
                        <td>{{$user->dob}}</td>
                        <td style="color: {{ $user->id === $authenticatedUserId ? 'green' : 'red' }}; font-size:18px; font-weight:700;">
                            {{ $user->id === $authenticatedUserId ? 'Logged In' : 'Not Logged In' }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <br>
        <div style="text-align:center;">
            <a href="{{route('signup')}}"><button style="width:100px">Add-Users</button></a>
        </div>
        <div class="details-div1" id="deltails-div2" style="display: none;">
            <h2 class="title_permission"></h2>
        </div>
    </div>
    <footer>
        <p>&copy; ShopMe</p>
    </footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    @include('content_js')
    </body>
</html>
