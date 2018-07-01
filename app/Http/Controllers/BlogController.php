<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Category;
use Illuminate\Http\Request;
use Auth;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::with('categories')
                     ->orderby('publish_date', 'desc')
                     ->paginate(5);
        return view('blog.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::orderby('name')->get();
        return view('blog . create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @var Blog $blog
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(Blog::$rules);
        $blog               = new Blog;
        $blog->publish_date = date("Y-m-d", strtotime($request->publish_date));
        $blog->status       = $request->status;
        $blog->title        = $request->title;
        // Changes text back to raw HTML
        $blog->blog_text = preg_replace(' /<\s(.+?)\s >/', ' < $1 > ', $request->blog_text);
        $blog->image     = $request->image;
        $blog->alt_text  = $request->alt_text;
        $blog->user_id   = Auth::user()->id;
        $category_list   = explode(',', $request->categoryIds);
        $blog->save();
        $blog = Blog::findOrFail($blog->id);
        foreach ($category_list as $category_id) {
            $category = Category::find($category_id);
            if (!empty($category)) {
                $blog->categories()->attach($category);
            }
        }
        $blog->save();
        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $blog = Blog::with('categories')->findOrFail($id);
        return view('blog . show', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog       = Blog::with('categories')->findOrFail($id);
        $catsInBlog = $blog->categories()->orderby('name')->pluck('id')->toArray();
        $categories = Category::orderby('name')->whereNotIn('id', $catsInBlog)->get();
        return view('blog . edit', compact('categories', 'blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @var Blog $blog
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate(Blog::$rules);
        $blog               = Blog::findOrFail($request->id);
        $blog->publish_date = date("Y-m-d", strtotime($request->publish_date));
        $blog->status       = $request->status;
        $blog->title        = $request->title;
        // Changes text back to raw HTML
        $blog->blog_text    = preg_replace(' /<\s(.+?)\s >/', ' < $1 > ', $request->blog_text);
        $blog->image        = $request->image;
        $blog->alt_text     = $request->alt_text;
        $blog->user_id      = $request->user_id;
        $categoriesToAdd    = explode(',', $request->categoryIds);
        $categoriesToRemove = $blog->categories()->whereNotIn('id', $categoriesToAdd)->pluck('id')->toArray();
        //Remove already existing categories - no need to add them again
        $categoriesToAdd = array_diff($categoriesToAdd, $blog->categories()->pluck('id')->toArray());
        foreach ($categoriesToRemove as $category_id) {
            $category = Category::find($category_id);
            if (!empty($category)) {
                $blog->categories()->detach($category);
            }
        }
        foreach ($categoriesToAdd as $category_id) {
            $category = Category::find($category_id);
            if (!empty($category)) {
                $blog->categories()->attach($category);
            }
        }
        $blog->update();
        return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request)
    {
        $request->validate(['id' => 'required | numeric']);
        $blog = Blog::findOrFail($request->id);
        $blog->delete();
        return redirect()->route('home');
    }
}
