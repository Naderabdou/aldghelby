<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function index()
    {
        $projects = Project::latest()->get();
        return view('site.projects.index', compact('projects'));
    }
    public function show($id)
    {
        $project = Project::findorfail($id);
        return view('site.projects.show', compact('project'));
    }
}
