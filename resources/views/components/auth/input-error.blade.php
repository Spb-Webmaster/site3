@props(['messages'])

@if ($messages)
    <div {{ $attributes->merge(['class' => 'text__error']) }}>
        @foreach ((array) $messages as $message)
            {{ $message }}
        @endforeach
    </div>
@endif
