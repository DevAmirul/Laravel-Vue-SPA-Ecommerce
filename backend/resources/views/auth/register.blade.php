@extends('layouts.auth-app')
@push('title')
Register
@endpush
@section('section')
<div class="card mb-3">
    <div class="card-body">
        <div class="pt-4 pb-2">
            <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
        </div>
        <form class="row g-3 needs-validation" action="{{ route('register') }}" method="POST">
            @csrf
            <div class="col-12">
                <input type="text" name="name" class="form-control" id="yourName" placeholder="Name" required
                    value="{{ old('name') }}">
                @error('name')
                <small class=" error fw-lighter text-danger text-lg mx-3">*{{ $message }}*</small>
                @enderror
            </div>
            <div class="col-12">
                <input type="email" name="email" class="form-control" id="yourEmail" placeholder="Email" required
                    value="{{ old('email') }}">
                @error('email')
                <small class=" error fw-lighter text-danger text-lg mx-3">*{{ $message }}*</small>
                @enderror
            </div>
            <div class="col-12">
                <input type="text" name="phone" class="form-control" id="yourEmail" placeholder="Phone" required
                    value="{{ old('phone') }}">
                @error('phone')
                <small class=" error fw-lighter text-danger text-lg mx-3">*{{ $message }}*</small>
                @enderror
            </div>
            <div class="col-12">
                <input type="text" name="address" class="form-control" id="yourEmail" placeholder="Address" required
                    value="{{ old('address') }}">
                @error('address')
                <small class=" error fw-lighter text-danger text-lg mx-3">*{{ $message }}*</small>
                @enderror
            </div>
            <div class="col-12">
                <input type="text" name="city" class="form-control" id="yourEmail" placeholder="City" required
                    value="{{ old('city') }}">
                @error('city')
                <small class=" error fw-lighter text-danger text-lg mx-3">*{{ $message }}*</small>
                @enderror
            </div>
            <div class="col-12">
                <input type="text" name="state" class="form-control" id="yourEmail" placeholder="State" required
                    value="{{ old('state') }}">
                @error('state')
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
                <input type="password" name="password_confirmation" class="form-control" id="yourPassword2"
                    placeholder="Confirm Password****" required>
                @error('password_confirmation')
                <small class=" error fw-lighter text-danger text-lg mx-3">*{{ $message }}*</small>
                @enderror
            </div>

            <div class="col-12">
                <button class="btn btn-primary w-100" type="submit">Create Account</button>
            </div>
        </form>
    </div>
</div>
@endsection