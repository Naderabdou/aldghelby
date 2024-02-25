<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InfoController extends Controller
{
    public function index()
    {
        return view('site.info.index');
    }
    public function show()
    {

        // $file = public_path(getSetting('commercial_record_image')->value);

        // $headers = array(
        //     'Content-Type: application/pdf',
        // );
        // return response()->download($file, 'commercial_record.pdf', $headers);
        $filePath = public_path(getSetting('commercial_record_image')->value);
        return response()->download($filePath, 'commercial_record.png');
    }
    public function profilePdf()
    {
        $file = public_path(getSetting('company_profile_pdf')->value);

        $headers = array(
            'Content-Type: application/pdf',
        );
        return response()->download($file, 'company_profile.pdf', $headers);
    }
}
