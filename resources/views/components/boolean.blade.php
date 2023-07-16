@php
$i = 0;
@endphp
@foreach ($booleanAttributes as $booleanAttribute)
@php
$colName = $booleanColNames[$i];
@endphp
@if ($data->$colName == 0)
<td> <span class="badge text-bg-warning">{{ $booleanAttribute[0] }}</span></td>
@elseif ($data->$colName == 1)
<td><span class="badge text-bg-success">{{ $booleanAttribute[1] }}</span></td>
@endif
@php
$i++;
@endphp
@endforeach




{{-- @if ($tableDataColumnName === $enumColName && $enum)
                                    @if ($data->$enumColName == 0)
                                    <td> <span class="badge text-bg-danger">{{ $enum[0] }}</span></td>
@elseif ($data->$enumColName == 1)
<td><span class="badge text-bg-success">{{ $enum[1] }}</span></td>
@elseif ($data->$enumColName == 2)
<td><span class="badge text-bg-primary">{{ $enum[2] }}</span></td>
@elseif ($data->$enumColName == 3)
<td><span class="badge text-bg-info">{{ $enum[3] }}</span></td>
@endif
@continue
@endif --}}




{{-- @if ($tableDataColumnName === array_keys($booleanColNames))
                                    @foreach ($booleanColNames as $booleanColName)
                                    @if ($tableDataColumnName === $booleanColName && $booleanValue)
                                    @if ($data->$booleanColName == 0)
                                    <td> <span class="badge text-bg-danger">{{ $booleanValue[0] }}</span></td>
@elseif ($data->$booleanColName == 1)
<td><span class="badge text-bg-success">{{ $booleanValue[1] }}</span></td>
@endif
@endif
@endforeach
@continue
@endif --}}