<?php

namespace App\Http\Controllers\Site;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Site\ContactRequest;

class ContactUsController extends Controller
{
    public function index()
    {
        return view('site.contactUs.index');
    }
    public function store(ContactRequest $request)
    {
        Contact::create($request->all());

        return response()->json(['success' => __('تم ارسال الرسالة بنجاح وسوف يتم الرد عليك في اقرب وقت ممكن')]);

    }

    // snd email

}
