@extends('layouts.error-app')
@push('title')
Server Error
@endpush
@section('section')
<main>
    <div class="container">
        <section class="section error-404 min-vh-100 d-flex flex-column align-items-center justify-content-center">
            <h1>500</h1>
            <h2>Oops! Something went wrong.</h2>
            <a class="btn" href="{{ route('home') }}">Back to home</a>
        </section>
    </div>
</main>
@endsection