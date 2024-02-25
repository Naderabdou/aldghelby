<?php

namespace App\Http\Controllers\Site;

use App\Models\Slider;
use App\Models\Contact;
use App\Models\Feature;
use App\Models\Service;
use App\Models\Subscribe;
use App\Models\ServiceOrder;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\Site\ContactRequest;
use App\Http\Requests\Site\MailListRequest;
use App\Http\Requests\Site\SubscribeRequest;
use App\Http\Requests\Site\ServiceOrdersRequest;
use App\Models\Blog;
use App\Models\Client;
use App\Repositories\Contract\MailListRepositoryInterface;

class HomeController extends Controller
{


    public function index()
    {

        $sliders = Slider::all();
        $features = Feature::limit(3)->get();
        $services = Service::limit(6)->get();
        $blogs = Blog::limit(3)->get();
        $clients = Client::all();

        return view('site.home', compact('sliders', 'features', 'services'  , 'blogs', 'clients'));
    }

    public function lang($lang)
    {

        session()->put('lang', $lang);
        return redirect()->back();
    }


    public function mailList(MailListRequest $request, MailListRepositoryInterface $mailListRepository)
    {
        $mailListRepository->create($request->all());
        Session::flash('success', 'تم الاشتراك بنجاح');
        return redirect()->back();
    }

    public function serviceOrder(ServiceOrdersRequest $request)
    {
        ServiceOrder::create($request->all());

        return response()->json(['success' => __('تم الطلب الخدمة بنجاح وسوف يتم الرد عليك في اقرب وقت ممكن')]);
    }

    public function subscribe(SubscribeRequest $request)
    {
        // $lastUrl = url()->previous();
        // $route = Route::getRoutes()->match(app('request')->create($lastUrl));
        // $id = $route->parameters()['blog'];

        // Subscribe::create($request->all());
        Subscribe::create($request->all());

        return response()->json(['success' => __('تم الاشتراك بنجاح وسوف يتم ارسال الاخبار اليك في اقرب وقت ممكن')]);

        // return \redirect()->intended(route('site.blog.show',$id))->with('success' , __('تم الاشتراك بنجاح وسوف يتم ارسال الاخبار اليك في اقرب وقت ممكن'));
    }

    public function sendContact(ContactRequest $request)
    {
        Contact::create($request->all());
        return response()->json(['success' => __('تم ارسال الرسالة بنجاح وسوف يتم الرد عليك في اقرب وقت')]);
    }
}
