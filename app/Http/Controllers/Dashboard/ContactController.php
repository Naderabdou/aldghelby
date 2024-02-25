<?php

namespace App\Http\Controllers\Dashboard;

use App\Mail\MakenMail;
use App\Models\Contact;
use App\Mail\MakenEmail;
use App\Mail\ALJADANIEmail;
use Illuminate\Http\Request;
use App\Mail\AldgelbelaEmail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Repositories\Sql\ContactRepository;

class ContactController extends Controller
{

    protected $contactRepository;

    public function __construct(ContactRepository $contactRepository)
    {
        $this->contactRepository = $contactRepository;
    }

    public function index()
    {
        $contacts = $this->contactRepository->getAll();
        return view('dashboard.contact.index', compact('contacts'));
    }

    public function show($id)
    {
        $contact = Contact::findOrFail($id);
        return view('dashboard.contact.show', compact('contact'));
    }

    public function showReplyForm($id)
    {
        $contact = Contact::findOrFail($id);
        return view('dashboard.contact.reply', compact('contact'));
    }

    public function destroy($id)
    {

        $this->contactRepository->delete($id);
        return \response()->json([
            'message' => 'تم الحذف بنجاح',
        ]);    }

    public function sendReply(Request $request)
    {

        Mail::to($request->email)->send(new AldgelbelaEmail($request->reply));
         $this->contactRepository->findOne($request->id)->delete();


        return redirect()->route('admin.contacts.index')->with('success', 'تم الارسال بنجاح');
    }
    public function deleteMsg($id)
    {
        $this->contactRepository->findOne($id)->delete();
        return response()->json(['success' => 'تم الحذف بنجاح']);
    }
}
