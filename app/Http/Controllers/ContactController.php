<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Message;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){

        $categories = Category::all();
        return view('contact.message', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'InputName' => 'required',
            'InputEmail' => 'required|email',
            'InputMessage' => 'required',
        ]);

        $message = new Message();
        $message->name = $request->InputName;
        $message->email = $request->InputEmail;
        $message->message = $request->InputMessage;

        $message->save();

        return redirect()->back()->with('success', 'تم إرسال رسالتك بنجاح!');
    }




}
