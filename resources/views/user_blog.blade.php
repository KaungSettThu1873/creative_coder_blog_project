<x-layouts>

    <x-slot name="title">
        <title> {{$blogs[0]['user']['name']}} </title>
    </x-slot>

  @foreach ($blogs as $blog)
  <article>
    <h1> {{ $blog->title }}</h1>
    <p> Published at - {{ $blog->date }} </p>
    <p> {{ $blog->body }} </p>
    <a href="/">Back</a>
</article>
  @endforeach

</x-layouts>
