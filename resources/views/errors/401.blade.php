@extends('layouts.error-app')
@push('title')
Unauthorized
@endpush
@section('section')
<main>
    <div class="container">
        <section class="section error-404 min-vh-100 d-flex flex-column align-items-center justify-content-center">
            <h1>401</h1>
            <h2>Unauthorized.</h2>
            <a class="btn" href="{{ route('home') }}">Back to home</a>
        </section>
    </div>
</main>
@endsection