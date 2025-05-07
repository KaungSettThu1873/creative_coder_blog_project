<x-layouts>

    <div class="mt-5 ">
        <div class="row">
            <div class="col-2 offset-1">
                <x-side-bar />
            </div>
            <div class="col-7 offset-1">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                          <th scope="col">Title</th>
                          <th scope="col">Intro</th>
                          <th scope="col">Slug</th>
                          <th scope="col">Category</th>
                          <th scope="col"  colspan="2">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($blogs as $blog)
                        <tr>
                            <td>{{($blogs->currentPage() - 1) * $blogs->perPage() + $loop->iteration }}</td>
                            <td>{{$blog->title}}</td>
                            <td>{{$blog->intro}}</td>
                            <td>{{$blog->slug}}</td>
                            <td>{{$blog->category->name}}</td>
                            <td class="d-flex">
                              <form action="{{route('admin.blog.edit',$blog->slug)}}">
                                  @csrf
                                  @method('PATCH')
                                  <button class="btn btn-warning ms-1">Edit</button>
                              </form>

                              <form action="{{route('admin.blog.destroy',$blog->slug)}}">
                                  @csrf
                                  @method('DELETE')
                                  <button class="btn btn-danger ms-1">Delete</button>
                              </form>
                          </tr>
                        @endforeach

                      </tbody>
                  </table>

                    {{$blogs->links()}}

            </div>
        </div>
    </div>

</x-layouts>
