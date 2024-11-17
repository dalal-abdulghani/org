<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use App\Models\Product;
use App\Models\Rating;
use App\Models\User;
use App\Traits\ImageUploadTrait;
use Illuminate\Support\Facades\Storage;
use Image;



use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
    use ImageUploadTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::all();
        $categories = Category::all();
        return view('admin.news.index', compact('news', 'categories'));
    }

    public function ShowAll(){
        $news = News::orderBy('created_at', 'desc')->paginate(6);
        $popularNews = News::orderBy('likes_count', 'desc')->take(6)->get();
        $categories = Category::all();

        return view('news.show', compact('news', 'popularNews', 'categories'));
    }


    public function detailsNews(News $news)
    {
        $categories = Category::all();

        $popularNews = News::orderBy('likes_count', 'desc')->take(6)->get();
        return view('news.details', compact('news', 'popularNews', 'categories'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.news.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'cover_image' => 'image|required',
            'category' => 'nullable',
            'content' => 'nullable',
            'tags' => 'nullable|string',
        ]);

        $news = new News();

        $news->title = $request->title;
        $news->cover_image =  $this->uploadImage($request->cover_image);
        $news->content = $request->content;
        $news->tags = $request->tags;

        $news->save();



        session()->flash('flash_message', 'تمت إضافة الخبر بنجاح');

        return redirect(route('news.show', $news));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        return view('admin.news.show', compact('news'));
    }




    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        $categories = Category::all();
        return view('admin.news.edit', compact('news', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        $this->validate($request, [
            'title' => 'nullable',
            'cover_image' => 'image|nullable',
            'category' => 'nullable',
            'content' => 'nullable',
            'tags' => 'nullable|string',
        ]);

        $news->title = $request->title;

        if ($request->has ('cover_image')) {
            Storage::disk('public')->delete($news->cover_image);
            $news->cover_image = $this->uploadImage($request->cover_image);
        }

        $news->content = $request->content;
        $news->tags = $request->tags;

        $news->save();

        session()->flash('flash_message', 'تم تعديل الخبر بنجاح');

        return redirect(route('news.show', $news));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        Storage::disk('public')->delete($news->cover_image);
        $news->delete();
        session()->flash('flash_message', 'تم حذف الخبر بنجاح');
        return redirect(route('news.index', $news));

    }

    public function details(News $news){

        $news = News::find($news->id);
        $categories = Category::all();
        $relatedNews = News::where('category_id', $news->category_id)
        ->where('id', '!=', $news->id)
        ->take(4)
        ->get();
        return view('news.details', compact('news', 'categories', 'relatedNews'));
    }




    public function search (Request $request){

        $news = News::where('title', 'like', "%{$request->term}%")
        ->orWhere('content', 'like', "%{$request->term}%")
        ->get();
        return view('news.index', compact('news'));
    }


















}
