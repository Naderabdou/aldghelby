<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\ServicesRequest;
use App\Models\ServiceCategory;
use App\Repositories\Sql\ServiceRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Jobs\SendNewServiceEmail;
use App\Models\Service;
use App\Repositories\Contract\ServiceRepositoryInterface;

class ServiceController extends Controller
{
    protected $serviceRepository;

    public function __construct(ServiceRepositoryInterface $serviceRepository)
    {
        $this->serviceRepository = $serviceRepository;
    }

    public function index()
    {
        $services = $this->serviceRepository->getAll();

        return view('dashboard.services.index', compact('services'));
    }
    public function create()
    {


        return view('dashboard.services.create');
    }

    public function show($id)
    {
        return \redirect()->route('admin.services.index');
    }
    public function store(ServicesRequest $request)
    {

        $data = $request->validated();


        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('services', 'public');
        }


        if ($request->hasFile('icon')) {
            $data['icon'] = $request->file('icon')->store('services', 'public');
        }


        $service = $this->serviceRepository->create($data);




        if ($service) {
            return redirect()->route('admin.services.index')->with('success', 'تم اضافة الخدمة بنجاح');
        } else {
            return redirect()->route('admin.services.index')->with('error', 'حدث خطأ ما');
        }
    }

    public function edit($id)
    {
        $service = Service::findorfail($id);

        return view('dashboard.services.edit', compact('service'));
    }
    public function update(ServicesRequest $request, $id)
    {
        $data = $request->validated();
        $service = Service::findorfail($id);


        if ($request->hasFile('image')) {

            Storage::disk('public')->delete($service->image);
            $data['image'] = $request->file('image')->store('services', 'public');
        }

        if ($request->hasFile('icon')) {

            Storage::disk('public')->delete($service->icon);
            $data['icon'] = $request->file('icon')->store('services', 'public');
        }



        $service = $service->update($data);

        if ($service) {
            return redirect()->route('admin.services.index')->with('success', 'تم تعديل الخدمة بنجاح');
        } else {
            return redirect()->route('admin.services.index')->with('error', 'حدث خطأ ما');
        }
    }

    public function destroy($id)
    {
        $service = Service::findorfail($id);

        if ($service->image) {

            Storage::disk('public')->delete($service->image);
        }


        $service->delete();

        return \response()->json([
            'message' => 'تم الحذف بنجاح',
        ]);
    }






}
