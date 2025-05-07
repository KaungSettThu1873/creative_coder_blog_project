@props(['comments'])
        @if ($comments->count() == 0)
        <p class="ms-2">   </p>
        @else
        <p class="ms-2">  Comments ({{$comments->count()}}) </p>
        @endif

        @foreach ($comments as $item)
        <div class="card m-2 ">
            <div class="d-flex p-2 align-items-center">
                <img src="{{ asset('images/'.$item->user->avatar) }}" width="30px" height="30px" class="d-inline rounded-circle" />
                <small class="p-2 d-inline">{{ $item->user->name }}</small>
            </div>
            <small class="p-2">{{ $item->created_at->diffForHumans() }}</small>
            <p class="ps-3 pt-2">{{ $item->body }}</p>
        </div>
        @endforeach
        <div>
            {{$comments->links()}}
        </div>
