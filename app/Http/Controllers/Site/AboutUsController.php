<?php

namespace App\Http\Controllers\Site;



use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\OurValue;

class AboutUsController extends Controller
{
    public function index()
    {
        $values = OurValue::all();
        return view('site.about.index', compact('values'));
    }
}
