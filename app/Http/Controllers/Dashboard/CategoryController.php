<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\CategoriesRequest;
use App\Repositories\Sql\CategoryRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    protected $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function index()
    {

        $categories = $this->categoryRepository->getAll();

        return view('dashboard.categories.index', compact('categories'));
    }
    public function create()
    {
        return view('dashboard.categories.create');
    }
    public function store(CategoriesRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('icon')) {
            $data['icon'] = $request->file('icon')->store('categories');
        }

        $category = $this->categoryRepository->create($data);

        if ($category) {
            return redirect()->route('admin.categories.index')->with('success', 'تم اضافة القسم بنجاح');
        } else {
            return redirect()->route('admin.categories.index')->with('error', 'حدث خطأ ما');
        }
    }

    public function edit($id)
    {
        $category = $this->categoryRepository->findOne($id);

        if ($category) {
            return view('dashboard.categories.edit', compact('category'));
        } else {
            return redirect()->route('admin.categories.index')->with('error', 'حدث خطأ ما');
        }
    }

    public function update(CategoriesRequest $request, $id)
    {

        $category = $this->categoryRepository->findOne($id);

        $data = $request->validated();
        if ($request->hasFile('icon')) {
            Storage::delete($category->icon);

            $data['icon'] = $request->file('icon')->store('categories');
        }

        $category = $this->categoryRepository->update($data,$id);

        if ($category) {
            return redirect()->route('admin.categories.index')->with('success', 'تم تعديل القسم بنجاح');
        } else {
            return redirect()->route('admin.categories.index')->with('error', 'حدث خطأ ما');
        }
    }

    public function destroy(Request $request)
    {
        $category = $this->categoryRepository->findOne($request->id);


        if ($category->icon) {
            Storage::delete($category->icon);
        }
     //   $this->categoryRepository->delete($request->id);
        $category->delete();

        return \response()->json([
            'message' => 'تم الحذف بنجاح',
        ]);
    }

    public function status()
    {
        try {
            foreach (json_decode(request()->record_ids) as $recordId) {
                $category = $this->categoryRepository->findOne($recordId);


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

                $Category = $this->categoryRepository->findOne($recordId);
                if ($Category->icon) {
                    Storage::delete($Category->icon);
                }
                $Category->delete();

            }
        }catch (\Exception $e){
            return redirect()->route('admin.categories.index')->with('error', 'حدث خطأ ما');
        }

        return redirect()->back()->with('success', 'تم الحذف بنجاح');
    }// end of bulk_delete
}
