<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Repositories\Sql\SubscribeRepository;
use Illuminate\Http\Request;

class SubscribeController extends Controller
{
    protected $subscribeRepository;

    public function __construct(SubscribeRepository $subscribeRepository)
    {
        $this->subscribeRepository = $subscribeRepository;

    }
    public function index()
    {
        $subscribes = $this->subscribeRepository->getAll();
        return view('dashboard.subscribe.index', compact('subscribes'));
    }
    public function destroy($id)
    {
         $this->subscribeRepository->findOne($id)->delete();
        return response()->json(['success' => 'تم الحذف بنجاح']);

    }
    public function show($id)
    {
        return \redirect()->route('admin.subscribe.index');
    }
}
