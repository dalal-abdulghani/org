<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\WorkField;
use Illuminate\Http\Request;

class WorkFieldController extends Controller
{
    public function index()
    {
        $work_fields = WorkField::all();
        $categories = Category::all();

        return view('admin.work.index', compact('work_fields', 'categories'));
    }


    public function ShowWork()
    {
        $workFields = WorkField::all();

        return view('gallery', compact('workFields', 'categories'));
    }


    public function getCategoryIcon($categoryName)
    {
        switch ($categoryName) {
            case 'سلل غذائية':
                return 'fas fa-wheat-awn-circle-exclamation';
            case 'كفالة ايتام':
                return 'fas fa-child';
            case 'زكاة الفطر':
                return 'fas fa-hand-holding-heart';
            case 'زكاة المال':
                return 'fas fa-coins';
            case 'اعانة زواج':
                return 'fa-solid fa-handshake-angle';
            case 'تفريج كربة':
                return 'fa-solid fa-seedling';
            case 'عيديات المحتاجين':
                return 'fa-solid fa-money-bill-transfer';
            case 'اعانة المرضى':
                return 'fa-solid fa-bed';
            case 'كفالة الارامل':
                return 'fa-solid fa-people-roof';
            case  'كسوة العيد':
                return 'fa-solid fa-children';
            default:
                return 'fas fa-tag';
        }
    }


    public function create()
    {
        $categories = Category::all();
        return view('admin.work.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'cover_image' => 'required|image|mimes:jpg,png,jpeg|max:2048',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
        ]);

        $coverImage = $request->file('cover_image')->store('work_field_images', 'public');

        WorkField::create([
            'name' => $request->name,
            'cover_image' => $coverImage,
            'description' => $request->description,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('work_fields.index')->with('success', 'تم إضافة مجال العمل بنجاح');
    }

    public function show($id)
    {

    }


    public function showDetails($id)
    {
        $work = WorkField::findOrFail($id);

        $relatedProjects = WorkField::where('category_id', $work->category_id)
            ->where('id', '!=', $work->id)
            ->take(5)
            ->get();

        return view('work.details', compact('work', 'relatedProjects'));
    }

    public function showByCategory($id){

        $works = WorkField::where('category_id', $id)->paginate(6);
        $iconFunction = 'getCategoryIcon';
        return view('work.all-work', compact('works', 'iconFunction'));
    }

    public function edit($id)
    {
        $workField = WorkField::findOrFail($id);
        $categories = Category::all();
        return view('admin.work.edit', compact('workField', 'categories'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'cover_image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
        ]);

        $workField = WorkField::findOrFail($id);

        if ($request->hasFile('cover_image')) {
            $coverImage = $request->file('cover_image')->store('work_field_images', 'public');
            $workField->cover_image = $coverImage;
        }
        $workField->update([
            'name' => $request->name,
            'description' => $request->description,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('work_fields.index')->with('success', 'تم تحديث مجال العمل بنجاح');
    }

    public function destroy($id)
    {
        $workField = WorkField::findOrFail($id);
        $workField->delete();
        return redirect()->route('work_fields.index')->with('success', 'تم حذف مجال العمل بنجاح');
    }

}
