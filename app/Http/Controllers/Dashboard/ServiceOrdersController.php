<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Repositories\Sql\ServiceOrderRepository;
use Illuminate\Http\Request;

class ServiceOrdersController extends Controller
{
    protected $serviceOrderRepository;

    public function __construct(ServiceOrderRepository $serviceOrderRepository)
    {
        $this->serviceOrderRepository = $serviceOrderRepository;

    }
    public function index()
    {
        $orders = $this->serviceOrderRepository->getAll();
        return view('dashboard.orders.index', compact('orders'));
    }

    public function destroy($id)
    {
         $this->serviceOrderRepository->findOne($id)->delete();
        return response()->json(['success' => 'تم الحذف بنجاح']);

    }

    public function show($id)
    {
        return \redirect()->route('admin.orders.index');
    }
}
