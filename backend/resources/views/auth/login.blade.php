@extends('layouts.error-app')
@push('title')
    Login
@endpush
@section('section')
<main>
    <div class="container">
        <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
                        <div class="d-flex justify-content-center py-4">
                            <a href="{{ route('home') }}" class="logo d-flex align-items-center w-auto">
                                <img src="assets/img/logo.png" alt="">
                                <span class="d-none d-lg-block">NiceAdmin</span>
                            </a>
                        </div><!-- End Logo -->
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="pt-4 pb-2">
                                    <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                                    <p class="text-center small">Enter your username & password to login</p>
                                </div>
                                <form action="{{ route('login') }}" method="POST" class="row g-3 needs-validation">
                                    @csrf
                                    <div class="col-12">
                                        <label for="yourUsername" class="form-label">Email</label>
                                        <input type="email" value="{{ old('email') }}" name="email" class="form-control" id="yourUsername"
                                            required>
                                        @error('email')
                                        <small class=" error fw-lighter text-danger text-lg mx-3">*{{ $message }}*</small>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <label for="yourPassword" class="form-label">Password</label>
                                        <input type="password" value="{{ old('password') }}" name="password" class="form-control" id="yourPassword" placeholder="********"
                                            required>
                                        @error('password')
                                        <small class=" error fw-lighter text-danger text-lg mx-3">*{{ $message }}*</small>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember"
                                                id="rememberMe">
                                            <label class="form-check-label" for="rememberMe">Remember me</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-primary w-100" type="submit">Login</button>
                                    </div>
                                    <div class="col-12">
                                        <p class="small mb-0">Don't have account? <a href="{{ route('register') }}">Create
                                                an account</a></p>
                                    </div>
                                    <div class="col-12">
                                        <p class="small mb-0">Forgot your password? <a href="{{ route('password.request') }}">Reset Password</a></p>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="credits">
                            Developed By <a href="https://amirul.web.app">Amirul Islam</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</main>
@endsection