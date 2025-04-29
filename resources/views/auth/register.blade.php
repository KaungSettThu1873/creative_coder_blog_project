<x-layouts>

        <div class="col-7 offset-5">
            <div class="card m-3 col-4">
                <div class="card-header">
                    <h5 class="text-center">Register</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('register.store') }}" method="POST">
                        @csrf
                        <div class="mb-2">
                            <label class="d-block">Name</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}" />
                            @error('email')
                            <small class="text-danger" >{{$message}}</small>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <label class="d-block">Email</label>
                            <input type="email" name="email" class="form-control" value="{{ old('email') }}" />
                            @error('email')
                            <small class="text-danger" >{{$message}}</small>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <label class="d-block">Password</label>
                            <input type="password" name="password" class="form-control" value="{{ old('password') }}" />
                            @error('email')
                            <small class="text-danger" >{{$message}}</small>
                            @enderror
                        </div>
                        <div class="text-end">
                        <button type="submit" class="btn btn-primary ">Register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

</x-layouts>
