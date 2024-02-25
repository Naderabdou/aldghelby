<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\ServicesCategoriesRequest;
use App\Repositories\Sql\ServiceCategoryRepository;
use Illuminate\Http\Request;

class ServiceCategoryController extends Controller
{
    protected $serviceCategoryRepository;

    public function __construct(ServiceCategoryRepository $serviceCategoryRepository)
    {
        $this->serviceCategoryRepository = $serviceCategoryRepository;

    }
    public function index()
    {
        $serviceCategories = $this->serviceCategoryRepository->getAll();

        return view('dashboard.serviceCategories.index', compact('serviceCategories'));
    }

    public function create()
    {
        return view('dashboard.serviceCategories.create');
    }


    public function store(ServicesCategoriesRequest $request)
    {

        $data = $request->validated();
      $category= $this->serviceCategoryRepository->create($data);
        if ($category) {
            return redirect()->route('admin.servicesCategories.index')->with('success', 'تم اضافة القسم بنجاح');
        } else {
            return redirect()->route('admin.servicesCategories.index')->with('error', 'حدث خطأ ما');
        }
    }

    public function edit($id)
    {
        $category = $this->serviceCategoryRepository->findOne($id);

        if ($category) {
            return view('dashboard.serviceCategories.edit', compact('category'));
        } else {
            return redirect()->route('admin.servicesCategories.index')->with('error', 'حدث خطأ ما');
        }
    }

    public function update(ServicesCategoriesRequest $request, $id)
    {
        $data = $request->validated();
        $category = $this->serviceCategoryRepository->update($data, $id);

        if ($category) {
            return redirect()->route('admin.servicesCategories.index')->with('success', 'تم تعديل القسم بنجاح');
        } else {
            return redirect()->route('admin.servicesCategories.index')->with('error', 'حدث خطأ ما');
        }
    }

    public function destroy(Request $request)
    {
        $category = $this->serviceCategoryRepository->findOne($request->id);

        $category->delete();

        return \response()->json([
            'message' => 'تم الحذف بنجاح',
        ]);
    }


    public function status()
    {

        try {
            foreach (json_decode(request()->record_ids) as $recordId) {
                $category = $this->serviceCategoryRepository->findOne($recordId);


                if ($category->status === 'active'){


                    $category->status = 'inactive';
                }else{

                    $category->status = 'active';
                }

                $category->save();
            }

        }catch (\Exception $e){
            return redirect()->back()->with('error', 'حدث خطأ ما');
        }
        return redirect()->back()->with('success', 'تم تغيير الحالة بنجاح');

    }// end of status


    public function bulk_delete()
    {

        try {
            foreach (json_decode(request()->record_ids) as $recordId) {

                $Category = $this->serviceCategoryRepository->findOne($recordId);
                $Category->delete();

            }
        }catch (\Exception $e){
            return redirect()->back()->with('error', 'حدث خطأ ما');
        }

            return redirect()->back()->with('success', 'تم الحذف بنجاح');
    }// end of bulk_delete

}
