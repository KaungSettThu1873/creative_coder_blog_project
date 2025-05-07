<x-layouts>
    <!-- singloe blog section -->
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto text-center">
                <img src="https://creativecoder.s3.ap-southeast-1.amazonaws.com/blogs/GOLwpsybfhxH0DW8O6tRvpm4jCR6MZvDtGOFgjq0.jpg"
                    class="card-img-top" alt="..." />
                <h3 class="my-3">{{ $blog->title }}</h3>
                <div class="d-flex justify-content-between">
                    <a href="/user/{{ $blog->author->name }}" class="text-decoration-none">Author name -
                        {{ $blog->author->name }}</a>
                    <a class="text-decoration-none"> Posted - {{ $blog->created_at->diffForHumans() }}</a>
                </div>
                <p class="lh-md">
                    {{ $blog->body }}
                </p>
            </div>
        </div>
    </div>

    <!-- subscribe new blogs -->
    <x-subscribe :blog="$blog"/>
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto ">
      @auth
            <div class="card p-2">
                <form action="{{ route('comment.store', $blog->slug) }}" method="POST">
                    @csrf
                    <label>Comment Box</label>
                    <textarea type="text" class="form-control" row='4' name="body">{{ old('body') }}</textarea>
                    <x-error error='body' />
                    <div class="text-end mt-2">
                        <button type="submit" class="btn btn-primary ">Submit</button>
                    </div>
                </form>
            </div>
      @endauth
                <x-comment-section :comments="$blog->comments()->latest()->paginate(3)" />
            </div>
        </div>
    </div>

    <x-blog-you-may-like :randomBlogs="$randomBlogs" />

</x-layouts>
