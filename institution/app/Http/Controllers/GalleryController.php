<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use App\Models\Partner;
use App\Models\Slide;
use App\Models\WorkField;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index(){
        $news = News::orderBy('created_at', 'desc')->paginate(5);
        $categories = Category::orderBy('created_at', 'desc')->get()->take(6);
        $partners = Partner::all();
        $workFields = WorkField::all();
        $slides = Slide::all();
        return view('gallery', compact('news', 'categories', 'slides', 'partners', 'workFields'));
    }

    public function search (Request $request){

        $news = News::where('title', 'like', "%{$request->term}%")
        ->orWhere('content', 'like', "%{$request->term}%")
        ->get();
        return view('news.index', compact('news'));
    }
}
