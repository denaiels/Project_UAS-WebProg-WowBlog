<div class="container">
  <nav class="navbar navbar-expand navbar-light bg-light">
      <div class="container-fluid">
          <a class="navbar-brand" href="/">
              <img src="/assets/logo.jpg" alt="logo WowBlog" width="75">
              WowBlog
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <form action="/search" method="get" class="d-flex">
              <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Search</button>
              </form>
          </div>

          @if (Auth::user())
              <div class="btn-group">
                  <button type="button" class="btn-outline-secondary">
                  {{ $user->name }}
                  </button>
              </div>
              <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <a href="/logout"><button type="button" class="btn btn-primary">Logout</button></a>
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