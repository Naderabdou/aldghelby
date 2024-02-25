<x-mail::message>
    {{ getSetting('main_fullname_ar')->value }} الرد من خلال موقع 
    <x-mail::panel>
        {{ $mailData }}
    </x-mail::panel>
</x-mail::message>



