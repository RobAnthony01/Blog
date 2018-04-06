<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Blog;
use App\Category;
use Illuminate\Http\Request;

/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $blogs_by_date = DB::table('blogs')->select(DB::raw("DISTINCT YEAR(publish_date) AS year"), DB::raw("MONTHNAME(publish_date) AS month"))
            ->where('status', 'Published')
            ->whereDate('publish_date', '<=', date('Y-m-d'))
            ->groupby('year')
            ->groupby('month')
            ->orderby('publish_date', 'desc')
            ->get();

        foreach ($blogs_by_date as $blog) {
            $blog->blogs = DB::table('blogs')->select('id', 'title', DB::raw("YEAR(publish_date) AS year"), DB::raw("MONTHNAME(publish_date) AS month"))
                ->where('status', 'Published')
                ->whereDate('publish_date', '<=', date('Y-m-d'))
                ->having('year', $blog->year)
                ->having('month', $blog->month)
                ->orderby('publish_date', 'desc')
                ->get();
        }

        $categories_with_count = Category::withCount('published_blogs')->get();
        if (empty($request->category)) {
            $blogs = Blog::with('categories')
                ->where('status', 'Published')
                ->whereDate('publish_date', '<=', date('Y-m-d'))
                ->orderby('publish_date', 'desc')
                ->get();
        } else {
            $category = $request->category;
            $blogs    = Blog::wherehas('categories', function ($q) use ($category) {
                $q->where('name', $category);
            })
                ->where('status', 'Published')
                ->whereDate('publish_date', '<=', date('Y-m-d'))
                ->orderby('publish_date', 'desc')
                ->get();
        }
        $filter = $request->category;
        return view('home', compact('blogs', 'categories_with_count', 'blogs_by_date', 'filter'));
    }
}
