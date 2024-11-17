<?php

namespace App\Http\Controllers;

use App\Models\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SlidesController extends Controller
{
    public function index()
    {
        $slides = Slide::all();
        return view('admin.slides.index', compact('slides'));
    }

    public function create()
    {
        return view('admin.slides.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'button_text' => 'nullable|string|max:255',
            'button_link' => 'nullable|url',
        ]);

        $slide = new Slide;
        $slide->title = $validated['title'];
        $slide->description = $validated['description'] ?? '';
        $slide->button_text = $validated['button_text'] ?? '';
        $slide->button_link = $validated['button_link'] ?? '';

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/slides'), $imageName);
            $slide->image = 'images/slides/' . $imageName;
        }

        $slide->save();

        return redirect()->route('slides.index')->with('success', 'تم إنشاء السلايد بنجاح.');
    }

    public function edit(Slide $slide)
    {
        return view('admin.slides.edit', compact('slide'));
    }

    public function show(Slide $slide)
    {
        return view('admin.slides.show', compact('slide'));
    }

    public function update(Request $request, Slide $slide)
    {
        $validated = $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'button_text' => 'nullable|string|max:255',
            'button_link' => 'nullable|url',
        ]);

        $slide->title = $validated['title'];
        $slide->description = $validated['description'] ?? '';
        $slide->button_text = $validated['button_text'] ?? '';
        $slide->button_link = $validated['button_link'] ?? '';

        if ($request->hasFile('image')) {
            if ($slide->image) {
                File::delete(public_path($slide->image));
            }

            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/slides'), $imageName);
            $slide->image = 'images/slides/' . $imageName;
        }

        $slide->save();

        return redirect()->route('slides.index')->with('success', 'تم تحديث السلايد بنجاح.');
    }

    public function destroy(Slide $slide)
    {
        if ($slide->image) {
            File::delete(public_path($slide->image));
        }

        $slide->delete();

        return redirect()->route('slides.index')->with('success', 'تم حذف السلايد بنجاح.');
    }
}
