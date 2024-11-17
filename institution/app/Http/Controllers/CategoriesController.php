<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\WorkField;
use App\Traits\ImageUploadTrait;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoriesController extends Controller
{
    use ImageUploadTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }


    public function category(){
        $categories = Category::inRandomOrder()->paginate(6);
        $recentProjects = WorkField::orderBy('created_at', 'desc')->take(5)->get();
        return view('categories.index', compact('categories', 'recentProjects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.categories.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,
        [
        'name' => 'required',
        'description' => 'nullable',
        'cover_image' => 'image|required',
        ]);

        $category = new Category;
        $category->name = $request->name;
        $category->cover_image =  $this->uploadImage($request->cover_image);
        $category->description = $request->description;

        $category->save();

        session()->flash('flash_message', 'تم اضافة التصنيف بنجاح');
        return redirect(route('categories.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
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
            if ($category->cover_image && Storage::disk('public')->exists($category->cover_image)) {
                Storage::disk('public')->delete($category->cover_image);
            }

            $category->cover_image = $request->file('cover_image')->store('uploads/categories', 'public');
        }

        $category->save();

        session()->flash('flash_message', 'تم تعديل التصنيف بنجاح');
        return redirect(route('categories.index'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        session()->flash('flash_message', 'تم حذف التصنيف بنجاح');
        return redirect(route('categories.index'));
    }
}
