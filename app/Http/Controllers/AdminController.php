<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Message;
use App\Models\News;
use App\Models\User;
use App\Models\WorkField;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $number_of_News = News::count();
        $number_of_categories = Category::count();
        $number_of_users = User::count();
        $number_of_message = Message::count();
        $number_of_work = WorkField::count();

        return view('admin.index', compact('number_of_News', 'number_of_categories', 'number_of_users', 'number_of_message', 'number_of_work'));
    }
}
