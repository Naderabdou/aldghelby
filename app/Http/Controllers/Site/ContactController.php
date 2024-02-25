<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\Site\ContactRequest;
use App\Repositories\Contract\ContactRepositoryInterface;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    protected $contactRepository;

    public function __construct(ContactRepositoryInterface $contactRepository)
    {
        $this->contactRepository = $contactRepository;
    }

    public function showForm()
    {
        return view('site.contact');
    }

    public function sendContact(ContactRequest $request)
    {

        $this->contactRepository->create($request->all());

        return redirect()->back()->with('success', 'تم ارسال الرسالة بنجاح');

    }
}
