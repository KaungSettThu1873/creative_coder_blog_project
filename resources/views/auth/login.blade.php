<x-layouts>

    <div class="col-7 offset-5">
        <div class="card m-3 col-4">
            <div class="card-header">
                <h5 class="text-center">Login</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('login.login') }}" method="POST">
                    @csrf
                    <div class="mb-2">
                        <label class="d-block">Email</label>
                        <input type="email" name="email" class="form-control" value="{{ old('email') }}" />
                        <x-error error="email" />
                    </div>
                    <div class="mb-2">
                        <label class="d-block">Password</label>
                        <input type="password" name="password" class="form-control" value="{{ old('password') }}" />
                        <x-error error="password" />
                    </div>
                    <div class="text-end">
                    <button type="submit" class="btn btn-primary ">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-layouts>
