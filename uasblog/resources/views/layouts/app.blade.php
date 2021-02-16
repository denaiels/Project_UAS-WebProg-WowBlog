<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <title>Wonderful Journey</title>
</head>
<body>
    <div class="jumbotron text-center">
        <h1>Wonderful Journey</h1>
        <h5>Blog of Indonesia Tourism</h5>
    </div>
    <div class="container bg-dark">
        <div class="navbar navbar-expand navbar-dark bg-dark">
            <div class="container-fluid">
                @if(Auth::user())
                    @if(Auth::user()->role=='user')
                        <ul class="navbar-nav ml">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/home') }}">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/profil') }}">Profil</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/myarticle') }}">Blog</a>
                            </li>
                        </ul>
                    @else
                        <ul class="navbar-nav ml">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/home') }}">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/admin') }}">Admin</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/userlist') }}">User</a>
                            </li>
                        </ul>
                    @endif
                    <ul class="navbar-nav mr">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/logout') }}">Logout</a>
                        </li>
                    </ul>
                @else
                    <ul class="navbar-nav ml">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/home') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link dropdown-toggle bg-dark" data-toggle="dropdown">Category</button>
                            <div class="dropdown-menu bg-dark" aria-labelledby="navbarDropdownMenuLink">
                                <a class="nav-link" href="{{ url('/category/1') }}">Infrastructure</a>
                                <a class="nav-link" href="{{ url('/category/2') }}">Lake</a>
                                <a class="nav-link" href="{{ url('/category/3') }}">Mountain</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/aboutus') }}">About Us</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav mr">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/register') }}">Sign Up</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/login') }}">Login</a>
                        </li>
                    </ul>
                @endif
            </div>
        </div>
    </div>
</body>

</html>

