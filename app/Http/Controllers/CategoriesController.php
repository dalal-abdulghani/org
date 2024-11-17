<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\WorkField;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    public function category()
    {
        $categories = Category::inRandomOrder()->paginate(6);
        $recentProjects = WorkField::orderBy('created_at', 'desc')->take(5)->get();
        return view('categories.index', compact('categories', 'recentProjects'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.categories.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'nullable',
            'cover_image' => 'image|required',
        ]);

        $category = new Category;
        $category->name = $request->name;

        if ($request->hasFile('cover_image')) {
            $image = $request->file('cover_image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/categories'), $imageName);
            $category->cover_image = 'images/categories/' . $imageName;
        }

        $category->description = $request->description;
        $category->save();

        session()->flash('flash_message', 'تم اضافة التصنيف بنجاح');
        return redirect(route('categories.index'));
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $category->name = $request->name;
        $category->description = $request->description;

        if ($request->hasFile('cover_image')) {
            if ($category->cover_image && File::exists(public_path($category->cover_image))) {
                File::delete(public_path($category->cover_image));
            }

            $image = $request->file('cover_image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/categories'), $imageName);
            $category->cover_image = 'images/categories/' . $imageName;
        }

        $category->save();

        session()->flash('flash_message', 'تم تعديل التصنيف بنجاح');
        return redirect(route('categories.index'));
    }

    public function destroy(Category $category)
    {
        if ($category->cover_image && File::exists(public_path($category->cover_image))) {
            File::delete(public_path($category->cover_image));
        }

        $category->delete();
        session()->flash('flash_message', 'تم حذف التصنيف بنجاح');
        return redirect(route('categories.index'));
    }
}

