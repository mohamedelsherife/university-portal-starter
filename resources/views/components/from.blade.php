@props([
    'action',
    'method' => 'POST'
])

<form action="{{ $action }}" method="{{ $method }}">
    {{ $slot }}
</form>