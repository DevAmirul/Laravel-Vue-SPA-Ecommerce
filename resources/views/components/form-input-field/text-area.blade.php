<div class="{{ $col }}">
    <textarea class="form-control" id="exampleFormControlTextarea1" wire:model={{ $wireModel }} placeholder="{{ $lable }}" rows="3" name="{{ $name }}"></textarea>
    @error( $name ) <span class="error fw-light text-danger">{{ $message }}</span> @enderror
</div>
