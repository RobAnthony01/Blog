<?php

namespace App\Http\Controllers;

use \App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderby('name')->paginate(10);
        return view('category/index', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(['category' => 'required|max:30|unique:categories,name']);
        $category = new Category(['name' => $request->category]);
        $category->save();
        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
                               'category' => 'required|max:30',
                               'id' => 'required|numeric',
                           ]);
        $category       = Category::findOrFail($request->id);
        $category->name = $request->category;
        $category->save();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @var Category $category
     * @param \Illuminate\Http\Request $request
     * @throws
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $request->validate([
                               'id' => 'required|numeric',
                           ]);
        $category = Category::findOrFail($request->id);
        $category->delete();
        return back();
    }
}
