<x-layouts>

    <x-slot name="title">
        <title>{{$blog->title}}</title>
    </x-slot>

    <article>
        <h1> {{ $blog->title }}</h1>
        <p> Published at - {{ $blog->date }} </p>
        <p> {{ $blog->body }} </p>
        <a href="/">Back</a>
    </article>

</x-layouts>
