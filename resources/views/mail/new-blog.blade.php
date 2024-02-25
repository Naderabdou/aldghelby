<x-mail::message>
     {{ $data['message'] }}
    @component('mail::button', ['url' => $data['link']])
        اضغط هنا لمشاهدة المقال
    @endcomponent
</x-mail::message>
