<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use App\Models\User;
class LikeController extends Controller
{

    public function __invoke(News $news)
    {
        if (auth()->check()) {
            if (!auth()->user()->likes()->where('news_id', $news->id)->exists()) {
                auth()->user()->likes()->attach($news);
                $news->increment('likes_count');
            } else {
                return back();
            }

            return back();
        } else {
            return redirect()->route('login');
        }
    }






    }
