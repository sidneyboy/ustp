@component('mail::message')
    {{ $subject }}
    <br /><br />
    {{ $messages }}
    <br /><br />
    {{ $time }}

    {{-- @component('mail::button', ['url' => ' ', 'color' => 'error'])
Review Your Memozine
@endcomponent --}}
@endcomponent