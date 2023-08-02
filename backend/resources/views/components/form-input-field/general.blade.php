<div class="{{ $col }}" >
    <input type="{{  $type }}" class="form-control" placeholder="{{ $lable }}" wire:model.debounce.500ms={{ $wireModel }} name="{{$name}}" {{ $disabled ?? '' }} aria-label="First name">
    @error( $name ) <span class="error fw-light text-danger">{{ $message }}</span> @enderror
</div>
