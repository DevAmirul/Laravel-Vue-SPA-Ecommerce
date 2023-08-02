@php
$i = 0;
@endphp
@foreach ($booleanAttributes as $key => $booleanAttribute)
@php
$colName = $booleanColNames[$i];
$class1 = $booleanClasses[$key][0];
$class2 = $booleanClasses[$key][1];
@endphp
@if ($data->$colName == 0)
<td> <span class="{{ $class1 }}">{{ $booleanAttribute[0] }}</span></td>
@elseif ($data->$colName == 1)
<td><span class="{{ $class2 }}">{{ $booleanAttribute[1] }}</span></td>
@endif
@php
$i++;
@endphp
@endforeach
