@component('mail::message')
    Greetings!
    <br /><br />
    Your TOR subject accreditation has been reviewed and few subjects have been rejected by the program chairman/s. You may
    now download a copy of your TOR accreditation on ustptrack.com using your tracking code: {{ $code }}. You may also
    access the site by clicking the link (https://ustptrack.online).
    <br /><br />
    For queries, you may visit your respective program chairman for more information regarding your TOR subject
    accreditation. Thank you!
    <br /><br />
    {{ $time }}
@endcomponent
