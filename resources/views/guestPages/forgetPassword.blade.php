@extends('layouts.mainApp')
@push('title')
Forget Password
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
                                    <h5 class="card-title text-center pb-0 fs-4">Request New Password</h5>
                                    <p class="text-center small">You forgot your password? Here you can easily retrieve a new password.</p>
                                </div>
                                <form class="row g-3 needs-validation" novalidate>
                                    <div class="col-12">
                                        <label for="yourUsername" class="form-label">Enter Your Email</label>
                                        <div class="input-group has-validation">
                                            <span class="input-group-text" id="inputGroupPrepend">@</span>
                                            <input type="text" name="username" class="form-control" id="yourUsername"
                                                required>
                                            <div class="invalid-feedback">Please enter your username.</div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <button class="btn btn-primary w-100" type="submit">Request New Password</button>
                                    </div>
                                    <div class="col-12">
                                        <p class="small mb-0">Don't have account? <a href="{{ route('signUp') }}">Create
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