<x-layouts>
    <div class="mt-5 ">
        <div class="row mb-3 mt-3">
            <div class="col-2 offset-1">
                <x-side-bar />
            </div>
            <div class="col-7 offset-1 mb-5">
                <div class="card  col-12">
                    <div class="card-header">
                        <h5 class="text-center">Edit</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.blog.update',$blog->slug) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <x-input-form name="title" :value="$blog->title"/>
                            <x-input-form name="intro" :value="$blog->intro"/>
                            <x-input-form name="slug" :value="$blog->slug"/>
                            <x-input-form name="img" type='file' :value="$blog->img"/>
                                <img src='{{asset("storage/$blog->img")}}' width="150" height="50" class="m-2" />
                            <x-textarea-form name='body' :value="$blog->body"/>
                            <select class="form-control mb-2" name="category_id">
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id', $blog->category_id) == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                                @endforeach

                            </select>


                            <div class="text-end">
                            <button type="submit" class="btn btn-primary ">Create</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-layouts>
