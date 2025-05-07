    @props(["blog"])


    <section class="container my-4 text-center" id="subscribe">
        <div class="row">
          <div class="col-md-6 mx-auto">
         @auth
         <form action="{{route('blogs.subscribe_handler',$blog->slug)}}" method="POST">
            @csrf
            @if (auth()->user()->isSubscribed($blog))
            <button type="submit" class="btn btn-danger">Unsubscribe</button>
            @else
            <button type="submit" class="btn btn-success">Subscribe</button>
            @endif
        </form>
         @endauth
          </div>
        </div>
      </section>
