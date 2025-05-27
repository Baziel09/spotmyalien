@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="http://127.0.0.1:8000/images/alien-space.svg" class="logo" alt="Alien logo">
@else
{!! $slot !!}
@endif
</a>
</td>
</tr>
