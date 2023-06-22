

<div class="{{ $col }}">
    <select class="form-select" aria-label="Default select example" name="{{ $name }}">
        {{-- <option selected>Open this select menu</option>
        <option value="1">One</option>
        <option value="2">Two</option>
        <option value="3">Three</option> --}}
        {{ $slot }}
    </select>
</div>