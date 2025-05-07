{{-- <x-layouts>

    <x-slot name="title">
        <title>All blogs</title>
    </x-slot>

    @foreach ($blogs as $blog)
        <h1><a href="blogs/{{ $blog->slug }} ">{{ $blog->title }} </a></h1>
        <p> Published at - {{ $blog->created_at->diffForHumans()}}</p>
        <p> <a href="/user/{{$blog->author->name}}"> Author name - {{ $blog->author->name}} </a></p>
        <h3><a href="/categories/{{ $blog->category->id }} ">{{ $blog->category->name }} </a></h3>
        <p> {{ $blog->intro }}</p>
        <p class="text-style">{{ $blog->body }}</p>
        <hr/>
    @endforeach



</x-layouts> --}}

<x-layouts>
  @if(session('success'))
  <div class="alert alert-success text-center" role="alert">
    {{session('success')}}
  </div>
  {{-- @elseif (session('fail'))
  <div class="alert-success">

  </div> --}}
  @endif
    <x-hero />
    <x-blog-section
    :blogs="$blogs"
    :categories="$categories"
    :currentCategory="$currentCategory ?? null"
    />

</x-layouts>
