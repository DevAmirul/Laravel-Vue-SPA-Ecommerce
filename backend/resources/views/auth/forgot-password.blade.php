@extends('layouts.auth-app')
@push('title')
Forgot Password
@endpush
@section('section')
<div class="card mb-3">
    <div class="card-body">
        <div class="pt-4 pb-2">
            <h5 class="card-title text-center pb-0 fs-4">Request New Password</h5>
        </div>
        <form class="row g-3 needs-validation" action="{{ route('password.email') }}" method="POST">
            @csrf

            @if (Session::has('status'))
            <p class="text-success text-center">{{ Session::get('status') }}</p>
            @endif

            <div class="col-12">
                <div class="input-group has-validation">
                    <span class="input-group-text" id="inputGroupPrepend">@</span>
                    <input type="email" name="email" class="form-control" value="{{ old('email') }}" id="yourUsername"
                        placeholder="Enter Your Email" required>
                </div>
                @error('email')
                <small class=" error fw-lighter text-danger text-lg mx-3">*{{ $message }}*</small>
                @enderror
            </div>

            <div class="col-12">
                <button class="btn btn-primary w-100" type="submit">Request New Password</button>
            </div>
        </form>
    </div>
</div>
@endsection