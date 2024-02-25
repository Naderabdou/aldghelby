<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\ProjectRequest;
use App\Models\Category;
use App\Models\City;
use App\Models\District;
use App\Models\Project;
use App\Repositories\Sql\ProjectRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    protected $projectRepository;

    public function __construct(ProjectRepository $projectRepository)
    {
        $this->projectRepository = $projectRepository;
    }
    public function index()
    {
        $projects = $this->projectRepository->getAll();

        return view('dashboard.projects.index', compact('projects'));
    }
    public function create()
    {

        return view('dashboard.projects.create');
    }
    public function store(ProjectRequest $request)
    {
        $data = $request->validated();
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('uploads/projects', 'public');
        }




        if ($this->projectRepository->create($data)) {
            return redirect()->route('admin.projects.index')->with('success', 'تم اضافة المشروع بنجاح');
        } else {
            return redirect()->route('admin.projects.index')->with('error', 'حدث خطأ ما');
        }
    }

    public function show($id)
    {
        return \redirect()->route('admin.projects.index');
    }

    public function edit($id)
    {
        $project = Project::findorfail($id);

        return view('dashboard.projects.edit', compact('project'));

    }
    public function update(ProjectRequest $request, $id)
    {
        $data = $request->validated();
        $project = Project::findorfail($id);
        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($project->image);
            $data['image'] = $request->file('image')->store('uploads/projects', 'public');
        }
        if ($project->update($data)) {
            return redirect()->route('admin.projects.index')->with('success', 'تم تعديل المشروع بنجاح');
        } else {
            return redirect()->route('admin.projects.index')->with('error', 'حدث خطأ ما');
        }
    }
    public function destroy($id)
    {
        $project = $this->projectRepository->findOne($id);
        if ($project->image) {
            Storage::disk('public')->delete($project->image);
        }
        $project->delete();
        return \response()->json([
            'message' => 'تم الحذف بنجاح',
        ]);
    }







}
