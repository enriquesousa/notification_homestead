@component('mail::message')
    
# Hola ESWebers
Para leer el mensaje, haz click en el botón

{{-- para mostrar mensaje que escribió el usuario --}}
@component('mail::panel')
    {{ $message->body }}
@endcomponent

@component('mail::button', ['url' => route('messages.show', $message)])
    Ver mensaje
@endcomponent


Hasta luego!

Regards,
ESWeb

@component('mail::subcopy')
If you're having trouble clicking the "Ver mensaje" button, copy and paste the URL below into your web browser: <a href="{{ route('messages.show', $message) }}">{{ route('messages.show', $message) }}</a>
@endcomponent

@endcomponent