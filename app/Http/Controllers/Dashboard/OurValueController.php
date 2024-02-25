<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Feature;
use App\Models\OurValue;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Repositories\Sql\OurValueRepository;
use App\Http\Requests\Dashboard\ValuesRequest;

class OurValueController extends Controller
{
    //
    protected $ourValueRepository;

    public function __construct(OurValueRepository $ourValueRepository)
    {
        $this->ourValueRepository = $ourValueRepository;
    }

    public function index()
    {
        $values = $this->ourValueRepository->getAll();
        return view('dashboard.values.index', compact('values'));
    }

    public function create()
    {
        return view('dashboard.values.create');
    }

    public function store(ValuesRequest $request)
    {
        $data = $request->validated();
        if ($request->hasFile('icon')) {
            $data['icon'] = $request->file('icon')->store('uploads/values', 'public');
        }

        $feature =  $this->ourValueRepository->create($data);
        if ($feature) {
            return redirect()->route('admin.values.index')->with('success', 'تم اضافة الميزه بنجاح');
        } else {
            return redirect()->route('admin.values.index')->with('error', 'حدث خطأ ما');
        }
    }

    public function show($id)
    {
        return \redirect()->route('admin.values.index');
    }

    public function edit($id)
    {
        $value = OurValue::findOrfail($id);
        return view('dashboard.values.edit', compact('value'));
    }

    public function update(ValuesRequest $request, $id)
    {

        $data = $request->validated();
        $values = OurValue::findOrfail($id);

        if ($request->hasFile('icon')) {
            $oldImage = $values->icon;
            Storage::disk('public')->delete($oldImage);
            $data['icon'] = $request->file('icon')->store('uploads/values', 'public');
        }
        $values = $values->update($data);
        if ($values) {
            return redirect()->route('admin.values.index')->with('success', 'تم تعديل الميزه بنجاح');
        } else {
            return redirect()->route('admin.values.index')->with('error', 'حدث خطأ ما');
        }
    }


    public function destroy($id)
    {

        $values = OurValue::findOrfail($id);

        $image = $values->icon;
        Storage::disk('public')->delete($image);
       $values->delete();
        return \response()->json([
            'message' => 'تم الحذف بنجاح',
        ]);
    }
}
