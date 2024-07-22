@php
    $class ??= 'btn btn-primary btn-sm float-right';
    $route ??= '';
    $value ??= 'Back';
@endphp

<a href="{{ route($route) }}" class="{{ $class }}" data-placement="left">
    <i class="bi bi-arrow-90deg-left"></i>
    {{ __($value) }}
</a>
