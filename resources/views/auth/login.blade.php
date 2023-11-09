@extends('auth.main')

@section('login')
    <div class="row justify-content-center mx-1 my-5 bg-white">

        @if (session()->has('berhasil'))
            <div class="row justify-content-center mx-1 ">
                <div class="col-lg-4  rounded-3">
                    <div class="alert alert-primary alert-dismissible fade show" role="alert">
                        <strong>{{ session('berhasil') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            </div>
        @endif


        @if (session()->has('loginerror'))
            <div class="row justify-content-center mx-1 mb-2">
                <div class="col-lg-4  rounded-3">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>{{ session('loginerror') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            </div>
        @endif

        <div class="col-lg-4 border border-2 border-dark rounded-3 bg-white">
            <form action="{{ url('/login') }}" method="POST">
                @csrf
                <h3 class="text-center fw-light">LOGIN</h3>
                <div class="form-floating  my-2">
                    <input type="email" name="email"
                        class="fw-light form-control border-2 border-top-0 border-start-0 border-end-0 border-dark rounded-0 @error('email') is-invalid @enderror"
                        id="email" placeholder="name@example.com" autofocus required value="{{ old('email') }}">
                    <label for="email" class="fw-light">Email address</label>
                    @error('email')
                        <small class="indvalid-feedback text-danger"> -
                            {{ $message }}
                        </small>
                    @enderror
                </div>
                <div class="form-floating ">
                    <input type="password" name="password"
                        class="fw-light form-control border-2 border-top-0 border-start-0 border-end-0 border-dark rounded-0"
                        id="password" placeholder="Password" required>
                    <label for="password" class="fw-light">Password</label>
                </div>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-2">
                    <button type="submit" class="btn btn-sm btn-outline-primary my-2 fw-light">LOGIN</button>
                </div>
                <div class="mb-3 text-center">
                    <h6><a href="/sigin" class="fw-light">SIGN IN</a></h6>
                </div>
            </form>
        </div>
    </div>
@endsection
