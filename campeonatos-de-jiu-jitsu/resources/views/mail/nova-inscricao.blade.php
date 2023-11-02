@component('mail::message')
# Aviso de nova inscrição

Olá, {{ $nomeAdmin }} o atleta {{ $nomeAtleta }} se inscreveu em {{ $titulo }}.


Obrigado,<br>
{{ config('app.name') }}
@endcomponent
