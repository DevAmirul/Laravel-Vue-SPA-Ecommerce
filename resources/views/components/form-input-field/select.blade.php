
<div class="{{ $col }}">
    <select  id="select" class="form-select" aria-label="Default select example" name="{{ $name }}">
        @foreach ($options as $option)
            <option value="{{ $option->id }}">{{ $option->name }}</option>
        @endforeach
    </select>
</div>