@component('mail::message')
    Greetings!
    <br /><br />
    Your subject {{ $accredited_to }} has been {{ $status }} by the program chairman, Ms./Mr. {{ $chair_name }}. Please check your TOR subject accreditation status on https://ustptrack.online using your tracking code: {{ $code }}.
    <br /><br />
    You may also access the site by clicking the link (https://ustptrack.online). Thank you!
    <br /><br />
    {{ $time }}
@endcomponent
