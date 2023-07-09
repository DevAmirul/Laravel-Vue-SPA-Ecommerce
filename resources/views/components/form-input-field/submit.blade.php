<div x-data="fetchProducts" class="col">
    <button {{ $attributes->merge(['class' => 'btn mt-3 btn-'.$color]) }} type="submit" >{{ $buttonName }}</button>
</div>