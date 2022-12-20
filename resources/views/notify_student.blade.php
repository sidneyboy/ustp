@component('mail::message')
    Greetings!
    <br /><br />
    Your TOR Accreditation has been forwarded to the USTPTrack site and has been received by the corresponding program chairman/s. You may check your TOR subject accreditation status on ustptrack.com using your tracking code:{{ $code }}.
    <br /><br />
    You may also access the site by clicking the link (https:ustptrack.com).
    <br /><br />
    Thank you!
    <br /><br />
    {{ $time }}
@endcomponent