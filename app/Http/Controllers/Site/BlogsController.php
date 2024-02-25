<?php

namespace App\Http\Controllers\Site;

use App\Models\Blog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogsController extends Controller
{
    public function index()
    {
        $blogs = Blog::latest()->get();
        return view('site.blogs.index', compact('blogs'));
    }

    public function show($id)
    {
        $blog = Blog::findOrFail($id);
        $popularBlogs = Blog::where('id', '!=', $id)->take(6)->get();

        return view('site.blogs.show', compact('blog', 'popularBlogs'));
    }
}
