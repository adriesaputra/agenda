@props(['status'])

@if ($status)
<div {{ $attributes->merge(['class' => 'fw-semibold text-success']) }}>
    {{ $status }}
</div>
@endif