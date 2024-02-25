<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\SettingRequest;
use App\Repositories\Contract\SettingRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    protected $settingRepository;

    public function __construct(SettingRepositoryInterface $settingRepository)
    {

        $this->settingRepository = $settingRepository;
    } // end of contruct

    public function create()
    {

        $settings = $this->settingRepository->getAll(['column' => 'id', 'dir' => 'ASC']);

        return view('dashboard.settings.edit', compact('settings'));
    } // end of create

    public function store(SettingRequest $request)
    {


        $attribute = $request->except('_token', '_method', 'logo');

        $logo_ar = $this->settingRepository->getWhere([['key', 'logo_ar']])->first()['value'];

        $logo_main_ar = $this->settingRepository->getWhere([['key', 'logo_main_ar']])->first()['value'];


        $logo_en = $this->settingRepository->getWhere([['key', 'logo_en']])->first()['value'];
        $logo_main_en = $this->settingRepository->getWhere([['key', 'logo_main_en']])->first()['value'];
        $image_about_header = $this->settingRepository->getWhere([['key', 'image_about_header']])->first()['value'];
        //   $video_about = $this->settingRepository->getWhere([['key', 'video_about']])->first()['value'];
        $cover_video_about = $this->settingRepository->getWhere([['key', 'cover_video_about']])->first()['value'];
        $image_about_footer = $this->settingRepository->getWhere([['key', 'image_about_footer']])->first()['value'];


        if ($request->has('logo_ar')) {

            // Delete old internal_image
            Storage::delete($logo_ar);

            // Upload new internal_image
            $attribute['logo_ar'] = $request->file('logo_ar')->store('setting', 'public');
        }


        if ($request->has('logo_en')) {

            // Delete old internal_image
            Storage::delete($logo_en);

            // Upload new internal_image
            $attribute['logo_en'] = $request->file('logo_en')->store('setting', 'public');
        }

        if ($request->has('logo_main_ar')) {

            // Delete old internal_image
            Storage::delete($logo_main_ar);

            // Upload new internal_image
            $attribute['logo_main_ar'] = $request->file('logo_main_ar')->store('setting', 'public');
        }







        if ($request->has('logo_main_en')) {

            // Delete old internal_image
            Storage::delete($logo_main_en);

            // Upload new internal_image
            $attribute['logo_main_en'] = $request->file('logo_main_en')->store('setting', 'public');
        }

        if ($request->has('cover_video_about')) {

            // Delete old internal_image
            Storage::delete($cover_video_about);

            // Upload new internal_image
            $attribute['logo_main_en'] = $request->file('cover_video_about')->store('setting', 'public');
        }


        if ($request->has('image_about_header')) {

            // Delete old internal_image
            Storage::delete($image_about_header);

            // Upload new internal_image
            $attribute['image_about_header'] = $request->file('image_about_header')->store('setting', 'public');
        }

        // if ($request->has('video_about')) {

        //     // Delete old internal_image
        //     Storage::delete($video_about);

        //     // Upload new internal_image
        //     $attribute['video_about'] = $request->file('video_about')->store('setting', 'public');
        // }

        if ($request->has('image_about_footer')) {

            // Delete old internal_image
            Storage::delete($image_about_footer);

            // Upload new internal_image
            $attribute['image_about_footer'] = $request->file('image_about_footer')->store('setting', 'public');
        }




        $attribute['phone'] = $request->phone_key . $request->phone;

        $this->settingRepository->updateSetting($attribute);

        return redirect()->back()->with('success', 'تم تعديل البيانات بنجاح');
    } // end of update
}
