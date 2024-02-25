<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Repositories\Sql\PartnerRepository;
use App\Http\Requests\Dashboard\PartnerRequest;
use App\Models\Partner;

class PartnerController extends Controller
{

    protected $partnerRepository;

    public function __construct(PartnerRepository $partnerRepository)
    {
        $this->partnerRepository = $partnerRepository;
    }




    public function index()
    {

        $partners = $this->partnerRepository->getAll();
        return view('dashboard.partners.index', compact('partners'));
    }

    public function create()
    {
        return view('dashboard.partners.create');
    }

    public function store(PartnerRequest $request)
    {

        $data = $request->validated();
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('uploads/partners', 'public');
        }


        $partners = $this->partnerRepository->create($data);
        if ($partners) {
            return redirect()->route('admin.partners.index')->with('success', 'تم اضافة الشريك بنجاح');
        } else {
            return redirect()->route('admin.partners.index')->with('error', 'حدث خطأ ما');
        }
    }

    public function edit($id)
    {
        $partner =Partner::findOrFail($id);
        return view('dashboard.partners.edit', compact('partner'));
    }

    public function update(PartnerRequest $request, $id)
    {

       $partners =  $this->partnerRepository->findOne($id);
        $data = $request->validated();
        if ($request->hasFile('image')) {
            // delete old image
            $oldImage = $partners->image;
            Storage::disk('public')->delete($oldImage);
            $data['image'] = $request->file('image')->store('uploads/partners', 'public');
        }
        $partners =  $partners->update($data);
        if ($partners) {
            return redirect()->route('admin.partners.index')->with('success', 'تم تعديل الشريك بنجاح');
        } else {
            return redirect()->route('admin.partners.index')->with('error', 'حدث خطأ ما');
        }
    }

    public function destroy($id)
    {
        $partners = $this->partnerRepository->findOne($id);
        if ($partners) {
            Storage::disk('public')->delete($partners->image);
            $partners->delete();
        }
        return \response()->json([
            'message' => 'تم الحذف بنجاح',
        ]);
    }

    public function show($id)
    {
        return \redirect()->route('admin.partners.index');
    }
}
