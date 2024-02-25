<x-mail::message>
    لاعادة تعيين كلمة مرور جديدة بالرجاء الضغط على اللينك الموجود بالاسفل
    @component('mail::button', ['url' => $data['link']])
        اعادة تعيين كلمة المرور
    @endcomponent
</x-mail::message>
