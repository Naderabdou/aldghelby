<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Repositories\Sql\SliderRepository;
use App\Http\Requests\Dashboard\SliderRequest;
use App\Models\Slider;

class SliderController extends Controller
{

    protected $sliderRepository;

    public function __construct(SliderRepository $sliderRepository)
    {
        $this->sliderRepository = $sliderRepository;
    }




    public function index()
    {

        $sliders = $this->sliderRepository->getAll();
        return view('dashboard.sliders.index', compact('sliders'));
    }

    public function create()
    {
        return view('dashboard.sliders.create');
    }

    public function store(SliderRequest $request)
    {
        $data = $request->validated();
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('uploads/slider/image', 'public');
        }




        $slider = $this->sliderRepository->create($data);
        if ($slider) {
            return redirect()->route('admin.sliders.index')->with('success', 'تم اضافة الصوره بنجاح');
        } else {
            return redirect()->route('admin.sliders.index')->with('error', 'حدث خطأ ما');
        }
    }

    public function edit($id)
    {
        $slider =  Slider::findOrfail($id);
        return view('dashboard.sliders.edit', compact('slider'));
    }

    public function update(SliderRequest $request, $id)
    {

       $slider =  Slider::findOrfail($id);
        $data = $request->validated();
        if ($request->hasFile('image')) {
            // delete old image
            $oldImage = $slider->image;
            Storage::disk('public')->delete($oldImage);
            $data['image'] = $request->file('image')->store('uploads/slider/image', 'public');
        }

        if ($request->hasFile('icon')) {
            $oldImage = $slider->icon;

            Storage::disk('public')->delete($oldImage);

            $data['icon'] = $request->file('icon')->store('uploads/slider/icon', 'public');
        }
        $slider =  $slider->update($data);
        if ($slider) {
            return redirect()->route('admin.sliders.index')->with('success', 'تم تعديل الصوره بنجاح');
        } else {
            return redirect()->route('admin.sliders.index')->with('error', 'حدث خطأ ما');
        }
    }

    public function destroy($id)
    {
        $slider = $this->sliderRepository->findOne($id);
        if ($slider) {
            Storage::disk('public')->delete($slider->image);
            $slider->delete();
        }
        return \response()->json([
            'message' => 'تم الحذف بنجاح',
        ]);
    }

    public function show($id)
    {
        return \redirect()->route('admin.sliders.index');
    }
}
