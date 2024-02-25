<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Models\GallaryProject;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Dashboard\GallaryRequest;

class ProjectGallaryController extends Controller
{
    public function index()
    {
        $gallary = GallaryProject::all();
        return view('dashboard.gallary.index', compact('gallary'));
    }

    public function create()
    {
        $projects = Project::all();
        return view('dashboard.gallary.create', compact('projects'));
    }



    public function edit($id)
    {
        $projects = Project::all();

        $gallary = GallaryProject::findorfail($id);


        return view('dashboard.gallary.edit', compact('gallary', 'projects'));
    }

    public function store(GallaryRequest $request)
    {
        $data = $request->validated();
        if ($request->has('image')) {

            foreach ($request->file('image') as $file) {
                $data['image'] = $file->store('uploads/gallary', 'public');

                GallaryProject::create($data);
            }
        }



        return redirect()->route('admin.gallary.index')->with('success', 'تم اضافة الصورة بنجاح');
    }

    public function update(GallaryRequest $request, $id)
    {
        $gallary = GallaryProject::findorfail($id);
        $data = $request->validated();
        if ($request->has('image')) {
            Storage::disk('public')->delete($gallary->image);
            $data['image'] = $request->file('image')->store('uploads/gallary', 'public');
        }
        $gallary->update($data);
        return redirect()->route('admin.gallary.index')->with('success', 'تم تعديل الصورة بنجاح');
    }

    public function destroy($id)
    {
        $gallary = GallaryProject::findorfail($id);

        if ($gallary->image) {

            Storage::disk('public')->delete($gallary->image);
        }


        $gallary->delete();

        return \response()->json([
            'message' => 'تم الحذف بنجاح',
        ]);
    }


    public function show($id)
    {
        return \redirect()->route('admin.gallary.index');
    }
}
