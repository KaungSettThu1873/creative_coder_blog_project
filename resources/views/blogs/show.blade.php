<x-layouts>
    <!-- singloe blog section -->
    <div class="container">
      <div class="row">
        <div class="col-md-6 mx-auto text-center">
          <img
            src="https://creativecoder.s3.ap-southeast-1.amazonaws.com/blogs/GOLwpsybfhxH0DW8O6tRvpm4jCR6MZvDtGOFgjq0.jpg"
            class="card-img-top"
            alt="..."
          />
          <h3 class="my-3">{{$blog->title}}</h3>
          <div class="d-flex justify-content-between" >
                <a href="/user/{{$blog->author->name}}" class="text-decoration-none">Author name - {{$blog->author->name}}</a>
                <a class="text-decoration-none"> Posted - {{$blog->created_at->diffForHumans()}}</a>
          </div>
          <p class="lh-md">
                {{$blog->body}}
          </p>
        </div>
      </div>
    </div>

    <!-- subscribe new blogs -->
        <x-subscribe />
    <!-- blog you may like -->
        <x-blog-you-may-like :randomBlogs="$randomBlogs" />



</x-layouts>
