<div class="{{ $col }} ">
    <input type="file" class="form-control" name="{{$name}}" wire:model={{ $wireModel }} {{ $multiple ?? null }}>
    @error( 'image' ) <span class=" error fw-light text-danger">{{ $message }}</span> @enderror

</div>