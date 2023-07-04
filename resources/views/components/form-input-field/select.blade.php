
{{-- <div class="{{ $col }}">
    <select  id="select" class="form-select" aria-label="Default select example" name="{{ $name }}">
        @foreach ($options as $option)
            <option value="{{ $option->id }}">{{ $option->name }}</option>
        @endforeach
    </select>
</div> --}}

<div class="{{ $col }}">
    <select wire:model='{{ $wireModel }}' id="select" class="form-select" aria-label="Default select example">
        <option>Please select any {{ $option }}</option>
        @if ($options !== null)
        @foreach ($options as $option)
        <option value="{{ $option->id }}">{{ $option->name }}</option>
        @endforeach
        @endif
    </select>
</div>