<div class="{{ $col }} ">
    <input type="file" class="form-control" name="{{$name}}" wire:model.debounce.500ms={{ $wireModel }} {{ $multiple ?? null }} {{ $multiple ?? '' }}>
    @error( $name ) <span class=" error fw-light text-danger">{{ $message }}</span> @enderror

</div>