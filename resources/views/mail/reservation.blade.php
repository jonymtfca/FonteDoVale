<x-mail::message>
# Nova reserva

    Nome: {{ $request['name'] }}
    Email: {{ $request['email'] }}
    Telefone: {{ $request['phone'] }}
    Data: {{ $request['date'] }}
    Hora: {{ $request['time'] }}
    Nº pessoas: {{ $request['people'] }}
    Localização: {{ $request['location'] === 'esplanada' ? 'Esplanada' : 'Interior' }}


    Notas: {{ $request['message'] }}


{{--{{ $request['message'] }}--}}


{{--<x-mail::button :url="''">--}}
{{--Button Text--}}
{{--</x-mail::button>--}}

Obrigado,<br>
{{ config('app.name') }}
</x-mail::message>
