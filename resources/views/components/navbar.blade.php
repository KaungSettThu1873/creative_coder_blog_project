<nav class="navbar navbar-dark bg-dark">
    {{-- @dd(auth()->check()) --}}
    <div class="container">
      <a class="navbar-brand" href="./index.html">Creative Coder</a>
      <div class="d-flex">
        <a href="#home" class="nav-link">Home</a>
        <a href="#blogs" class="nav-link">Blogs</a>
        <a href="#subscribe" class="nav-link">Subscribe</a>
        @auth
        <form action="{{route('register.logout')}}" method="POST">
            @csrf
            <button type="submit"  class="nav-link btn btn-link">Logout</button>
        </form>
        @else
        <a href="{{route('register.index')}}" class="nav-link">Register</a>
        <a href="{{route('login.index')}}" class="nav-link">Login</a>
        @endauth
      </div>
    </div>
  </nav>
