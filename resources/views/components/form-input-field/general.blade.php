<div class="{{ $col }}" >
    <input type="{{  $type }}" class="form-control" placeholder="{{ $lable }}" wire:model={{ $wireModel }} name="{{$name}}" aria-label="First name">
    @error( $name ) <span class="error fw-light text-danger">{{ $message }}</span> @enderror

</div>
