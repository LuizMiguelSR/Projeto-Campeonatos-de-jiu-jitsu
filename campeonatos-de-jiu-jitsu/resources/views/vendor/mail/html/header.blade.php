@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'OSU BJJ')
<img src="http://localhost:8000/imgs/logo.svg" class="logo" alt="OSU BJJ Logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
