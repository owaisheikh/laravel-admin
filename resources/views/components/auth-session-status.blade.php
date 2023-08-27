@props(['status'])

@if ($status)
    <div {{ $attributes->merge(['class' => 'font-medium text-sm alert alert-primary']) }}>
        {{ $status }}
    </div>
@endif
