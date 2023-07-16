<div x-data="fetchProducts" class="col">
    <button {{ $attributes->merge(['class' => 'btn btn-'.$color]) }} type="submit" >{{ $buttonName }}</button>
</div>