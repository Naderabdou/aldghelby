<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\BlogsRequest;
use App\Models\Blog;
use App\Repositories\Sql\BlogRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    protected $blogRepository;

    public function __construct(BlogRepository $blogRepository)
    {
        $this->blogRepository = $blogRepository;
    }
    public function index()
    {
        $blogs = $this->blogRepository->getAll();

        return view('dashboard.blogs.index', compact('blogs'));
    }
    public function create()
    {
        return view('dashboard.blogs.create');
    }
    public function store(BlogsRequest $request)
    {


        $data = $request->validated();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('uploads/blogs', 'public');
        }

        $blog = $this->blogRepository->create($data);

        if ($blog) {
            return redirect()->route('admin.blogs.index')->with('success', 'تم اضافة المدونة بنجاح');
        } else {
            return redirect()->route('admin.blogs.index')->with('error', 'حدث خطأ ما');
        }
    }

    public function edit($id)
    {
        $blog = Blog::findOrFail($id);


        return view('dashboard.blogs.edit', compact('blog'));
    }


    public function update(BlogsRequest $request, $id)
    {
        $data = $request->validated();
       $blog = Blog::findOrFail($id);

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($blog->image);
            $data['image'] = $request->file('image')->store('uploads/blogs', 'public');
        }

        $blog = $this->blogRepository->update($data, $id);

        if ($blog) {
            return redirect()->route('admin.blogs.index')->with('success', 'تم تعديل المدونة بنجاح');
        } else {
            return redirect()->route('admin.blogs.index')->with('error', 'حدث خطأ ما');
        }
    }

    public function destroy($id)
    {
        $blog = $this->blogRepository->findOne($id);

        if ($blog->image) {
            Storage::disk('public')->delete($blog->image);
        }
        //   $this->categoryRepository->delete($request->id);
        $blog->delete();

        return \response()->json([
            'message' => 'تم الحذف بنجاح',
        ]);
    }

    public function show($id)
    {
        return \redirect()->route('admin.blogs.index');
    }
}
