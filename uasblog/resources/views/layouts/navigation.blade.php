<div class="container">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="navbar-brand" href="/">
                        <img src="/assets/logo.jpg" alt="logo WowBlog" width="75">
                        WowBlog
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Categories
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @foreach ($categories as $category)
                            <a class="dropdown-item" href="{{ '/category/'.$category->id }}">{{ $category->name }}</a>
                        @endforeach
                    </div>
                </li>
            </ul>
            

            @if (Auth::user())
                @if ($user->role == 'admin')
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="/adminmenu">Admin</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/usermenu">User</a>
                        </li>
                    </ul>
                @else
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="/updateprofile">Profil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/blogmenu">Blog</a>
                        </li>
                    </ul>
                @endif
            @endif


            @if (Auth::user())
                <div class="btn-group">
                    <button type="button" class="btn-outline-secondary">
                    {{ $user->name }}
                    </button>
                </div>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <a href="/logout"><button type="button" class="btn btn-info">Logout</button></a>
                </div>
                </div>
              
            @else
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <a href="/login"><button class="btn btn-primary me-md-2" type="button">Login</button></a>
                    <a href="/register"><button class="btn btn-primary" type="button">Register</button></a>
                </div>
            @endif

        </div>
    </nav>
</div>