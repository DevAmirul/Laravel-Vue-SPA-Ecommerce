<div class="col-9">
    <div class="row ">
        <div class="col-sm-10 d-flex">
            @if ($options !== null)
            <legend class="col-form-label col-sm-2 pt-0">{{ $legend }}</legend>
            @foreach ($options as $attributeValue)
            <div class="form-check mx-1">
                <input wire:model='attributeValuesId.{{ $attributeValue->id , $attributeValue->value }}' class="form-check-input" type="checkbox"
                    id="gridCheck1">
                <label class="form-check-label" for="gridCheck1">
                    {{ $attributeValue->value }}
                </label>

            </div>
            @endforeach
            @endif

        </div>
    </div>
</div>