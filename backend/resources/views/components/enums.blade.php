@php
$i = 0;
@endphp
@foreach ($enumAttributes as $enumAttributeKey => $enumAttribute)
@foreach ($enumAttribute as $attributeKey => $attribute)
@php
$colName = $enumColNames[$i];
$class = $enumClasses[$enumAttributeKey][$attributeKey];
@endphp
@if ($data->$colName == $attribute)
<td><span class=" {{ $class }} " >{{ $attribute }}</span></td>
@endif
@endforeach
@php
$i++;
@endphp
@endforeach
