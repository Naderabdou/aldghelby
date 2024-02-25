<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Feature;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Repositories\Sql\FeatureRepository;
use App\Http\Requests\Dashboard\FeatureRequest;

class FeatureController extends Controller
{
    protected $featureRepository;

    public function __construct(FeatureRepository $featureRepository)
    {
        $this->featureRepository = $featureRepository;
    }

    public function index()
    {
        $features = $this->featureRepository->getAll();
        return view('dashboard.features.index', compact('features'));
    }

    public function create()
    {
        return view('dashboard.features.create');
    }

    public function store(FeatureRequest $request)
    {
        $data = $request->validated();
        if ($request->hasFile('icon')) {
            $data['icon'] = $request->file('icon')->store('uploads/features', 'public');
        }

      $feature =  $this->featureRepository->create($data);
        if ($feature) {
            return redirect()->route('admin.features.index')->with('success', 'تم اضافة الميزه بنجاح');
        } else {
            return redirect()->route('admin.features.index')->with('error', 'حدث خطأ ما');
        }
    }

    public function show($id)
    {
        return \redirect()->route('admin.features.index');
    }

    public function edit($id)
    {
        $feature = Feature::findOrfail($id);
        return view('dashboard.features.edit', compact('feature'));
    }

    public function update(FeatureRequest $request, $id)
    {
        $data = $request->validated();
        $feature = Feature::findOrfail($id);

        if ($request->hasFile('icon')) {
            $oldImage = $feature->icon;
            Storage::disk('public')->delete($oldImage);
            $data['icon'] = $request->file('icon')->store('uploads/features', 'public');
        }
        $feature = $feature->update($data);
        if ($feature) {
            return redirect()->route('admin.features.index')->with('success', 'تم تعديل الميزه بنجاح');
        } else {
            return redirect()->route('admin.features.index')->with('error', 'حدث خطأ ما');
        }
    }


    public function destroy($id)
    {
        $feature = Feature::findOrfail($id);
        $image = $feature->icon;
        Storage::disk('public')->delete($image);
        $feature->delete();
        return \response()->json([
            'message' => 'تم الحذف بنجاح',
        ]);
    }






}
