<?php

namespace App\Http\Controllers\Site;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::latest()->get();
        return view('site.services.index', compact('services'));
    }
    public function show($id)
    {
        $service = Service::findorfail($id);
        $Ourservice = Service::all();
        return view('site.services.show', compact('service','Ourservice'));
    }
}
