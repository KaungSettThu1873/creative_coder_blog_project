<x-layouts>
    <div class="mt-5 ">
        <div class="row mb-3 mt-3">
            <div class="col-2 offset-1">
                <x-side-bar />
            </div>
            <div class="col-7 offset-1 mb-5">
                <div class="card  col-12">
                    <div class="card-header">
                        <h5 class="text-center">Register</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.blog.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <x-input-form name="title"/>
                            <x-input-form name="intro"/>
                            <x-input-form name="slug"/>
                            <x-input-form name="img" type='file'/>
                            <x-textarea-form name='body'/>
                            <select class="form-control mb-2" name="category_id">
                                @foreach ($categories as $category)
                                        <option class="{{old('category_id')}}" value="{{$category->id}}">{{$category->name}}</option>
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
