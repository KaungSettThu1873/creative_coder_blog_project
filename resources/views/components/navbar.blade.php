<nav class="navbar navbar-dark bg-dark">
    {{-- @dd(auth()->check()) --}}
    <div class="container">
      <a class="navbar-brand" href="{{route('blog.index')}}">Creative Coder</a>
      <div class="d-flex">
        <a href="{{route('blog.index')}}" class="nav-link">Home</a>
        <a href="#blogs" class="nav-link">Blogs</a>
        <a href="#subscribe" class="nav-link">Subscribe</a>
        @can('isAdmin')
        <a href="{{route('admin.index')}}" class="nav-link" >Dashboard</a>
        @endcan
        @auth
        <img
        src="{{asset('images/'.auth()->user()->avatar)}}"
        class=" rounded-circle"
        width="50"
        height="50"
        alt="..."
      />
      <a class="nav-link">{{auth()->user()->name}}</a>

        <form action="{{route('register.logout')}}" method="POST">
            @csrf
            <button type="submit"  class="nav-link btn btn-link ">Logout</button>
        </form>
        @else
        <a href="{{route('register.index')}}" class="nav-link">Register</a>
        <a href="{{route('login.index')}}" class="nav-link">Login</a>
        @endauth
      </div>
    </div>
  </nav>
