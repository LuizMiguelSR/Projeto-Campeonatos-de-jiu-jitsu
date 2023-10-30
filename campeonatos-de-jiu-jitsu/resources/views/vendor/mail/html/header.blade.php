@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'OSU BJJ')
<img src="https://laravel.com/imgs/logo.svg" class="logo" alt="OSU BJJ Logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
