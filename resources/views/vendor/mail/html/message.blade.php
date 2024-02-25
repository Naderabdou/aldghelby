@component('mail::layout')
{{-- Header --}}
@slot('header')
@component('mail::header', ['url' => url('/')])
{{ getSetting('main_fullname_ar')->value }}
@endcomponent
@endslot

{{-- Body --}}
{{ $slot }}

{{-- Subcopy --}}
@isset($subcopy)
@slot('subcopy')
@component('mail::subcopy')
{{ $subcopy }}
@endcomponent
@endslot
@endisset

{{-- Footer --}}
@slot('footer')
@component('mail::footer')
{{ getSetting('footer_desc_ar')->value }} <br>
كل الحقوق محفوظة {{ getSetting('main_fullname_ar')->value }}  &copy; {{ date('Y') }}
@endcomponent
@endslot
@endcomponent
