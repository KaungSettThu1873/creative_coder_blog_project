<x-layouts>

    <x-slot name="title">
        <title>All blogs</title>
    </x-slot>

    @foreach ($blogs as $blog)
        <h1><a href="blogs/{{ $blog->slug }} ">{{ $blog->title }} </a></h1>
        <p> Published at - {{ $blog->created_at}}</p>
        <p> <a href="/user/{{$blog->user_id}}"> Author name - {{ $blog->user->name}} </a></p>
        <h3><a href="/categories/{{ $blog->category->slug }} ">{{ $blog->category->name }} </a></h3>
        <p> {{ $blog->intro }}</p>
        <p class="text-style">{{ $blog->body }}</p>
        <hr/>
    @endforeach



</x-layouts>
