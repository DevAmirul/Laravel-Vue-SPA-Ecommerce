<div class="{{ $col }}">
    <textarea class="form-control" id="exampleFormControlTextarea1" wire:model.debounce.500ms={{ $wireModel }} placeholder="{{ $lable }}" rows="3" name="{{ $name }}" {{ $disabled ?? '' }}></textarea>
    @error( $name ) <span class="error fw-light text-danger">{{ $message }}</span> @enderror
</div>
