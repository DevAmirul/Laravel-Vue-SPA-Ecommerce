@extends('layouts.error-app')
@push('title')
SignUp
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
                                    <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
                                </div>
                                <form class="row g-3 needs-validation" action="{{ route('register') }}" method="POST">
                                    @csrf
                                    <div class="col-12">
                                        <input type="text" name="name" class="form-control" id="yourName"  placeholder="Your Name" required value="{{ old('name') }}">
                                        @error('name')
                                        <small class=" error fw-lighter text-danger text-lg mx-3">*{{ $message }}*</small>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <input type="email" name="email" class="form-control" id="yourEmail"  placeholder="Your Email" required value="{{ old('email') }}">
                                        @error('email')
                                        <small class=" error fw-lighter text-danger text-lg mx-3">*{{ $message }}*</small>
                                        @enderror
                                    </div>

                                    <div class="col-12">
                                        <input type="password" name="password" class="form-control" id="yourPassword" placeholder="Password****"
                                            required>
                                        @error('password')
                                        <small class=" error fw-lighter text-danger text-lg mx-3">*{{ $message }}*</small>
                                        @enderror
                                    </div>

                                    <div class="col-12">
                                        <input type="password" name="password_confirmation" class="form-control" id="yourPassword2" placeholder="Confirm Password****"
                                            required>
                                        @error('password_confirmation')
                                        <small class=" error fw-lighter text-danger text-lg mx-3">*{{ $message }}*</small>
                                        @enderror
                                    </div>

                                    <div class="col-12">
                                        <button class="btn btn-primary w-100" type="submit">Create Account</button>
                                    </div>
                                    <div class="col-12">
                                        <p class="small mb-0">Already have an account? <a href="{{ route('login') }}">Log
                                                in</a></p>
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