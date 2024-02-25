<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Repositories\Sql\TrainingRepository;
use App\Http\Requests\Dashboard\TrainingRequest;

class TrainingController extends Controller
{
    protected $trainingRepository;

    public function __construct(TrainingRepository $trainingRepository)
    {
        $this->trainingRepository = $trainingRepository;
    }

    public function index()
    {
        $training = $this->trainingRepository->getAll();
        return view('dashboard.training.index', compact('training'));
    }

    public function create()
    {
        return view('dashboard.training.create');
    }

    public function store(TrainingRequest $request)
    {
        $data = $request->validated();
        if ($request->hasFile('icon')) {
            $data['icon'] = $request->file('icon')->store('uploads/training', 'public');
        }

      $feature =  $this->trainingRepository->create($data);
        if ($feature) {
            return redirect()->route('admin.training.index')->with('success', 'تم اضافة تدرب  معنا  بنجاح');
        } else {
            return redirect()->route('admin.training.index')->with('error', 'حدث خطأ ما');
        }
    }


    public function show($id)
    {
        return \redirect()->route('admin.training.index');
    }

    public function edit($id)
    {
        $training = $this->trainingRepository->findOne($id);
        return view('dashboard.training.edit', compact('training'));
    }

    public function update(TrainingRequest $request, $id)
    {
        $data = $request->validated();
        $feature = $this->trainingRepository->findOne($id);

        if ($request->hasFile('icon')) {
            $oldImage = $feature->icon;
            Storage::disk('public')->delete($oldImage);
            $data['icon'] = $request->file('icon')->store('uploads/training', 'public');
        }
        $feature = $feature->update($data);
        if ($feature) {
            return redirect()->route('admin.training.index')->with('success', 'تم تعديل تدرب  معنا  بنجاح');
        } else {
            return redirect()->route('admin.training.index')->with('error', 'حدث خطأ ما');
        }
    }


    public function destroy($id)
    {
        $feature = $this->trainingRepository->findOne($id);
        $image = $feature->icon;
        Storage::disk('public')->delete($image);
        $feature = $feature->delete();
        return \response()->json([
            'message' => 'تم الحذف بنجاح',
        ]);
    }






}
