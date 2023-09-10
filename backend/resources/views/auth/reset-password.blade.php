@extends('layouts.error-app')
@push('title')
Recovery Password
@endpush
@section('section')
<main>
    <div class="container">
        <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
                        <div class="d-flex justify-content-center py-4">
                            <a href="index.html" class="logo d-flex align-items-center w-auto">
                                <img src="assets/img/logo.png" alt="">
                                <span class="d-none d-lg-block">E-commerce</span>
                            </a>
                        </div><!-- End Logo -->
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="pt-4 pb-2">
                                    <h5 class="card-title text-center pb-0 fs-4">Change Password</h5>
                                </div>
                                <form class="row g-3 needs-validation" action="{{ route('password.store') }}" method="POST">
                                    @csrf
                                    <div class="col-12">
                                        <input type="email" name="email" class="form-control" id="yourEmail" placeholder="Your Email" required
                                            value="{{ old('email') }}">
                                        @error('email')
                                        <small class=" error fw-lighter text-danger text-lg mx-3">*{{ $message }}*</small>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <input type="password" name="password" class="form-control" id="yourPassword" placeholder="Password****" required>
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
                                        <button class="btn btn-primary w-100" type="submit">Change Password</button>
                                    </div>
                                    <div class="col-12">
                                        <p class="small mb-0">Don't have account? <a href="{{ route('register') }}">Create
                                                an account</a></p>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="credits">

                            Developed By <a href="https://bootstrapmade.com/">Amirul Islam</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</main>
@endsection