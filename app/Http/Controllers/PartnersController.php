<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PartnersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $partners = Partner::all();
        return view('admin.partners.index', compact('partners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.partners.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'nullable|string',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'website_link' => 'nullable|url',
        ]);

        $partner = new Partner;
        $partner->name = $validated['name'];

        if ($request->hasFile('logo')) {
            $image = $request->file('logo');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/partners'), $imageName);
            $partner->logo = 'images/partners/' . $imageName;
        }

        $partner->website_link = $validated['website_link'] ?? '';
        $partner->save();

        return redirect()->route('partners.index')->with('success', 'تم إضافة الشريك بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function show(Partner $partner)
    {
        return view('admin.partners.show', compact('partner'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function edit(Partner $partner)
    {
        return view('admin.partners.edit', compact('partner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Partner $partner)
    {
        $validated = $request->validate([
            'name' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'website_link' => 'nullable|url',
        ]);

        $partner->name = $validated['name'];

        if ($request->hasFile('logo')) {
            if ($partner->logo) {
                File::delete(public_path($partner->logo));
            }

            $image = $request->file('logo');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/partners'), $imageName);
            $partner->logo = 'images/partners/' . $imageName;
        }

        $partner->website_link = $validated['website_link'] ?? '';
        $partner->save();

        return redirect()->route('partners.index')->with('success', 'تم تعديل الشريك بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Partner $partner)
    {
        if ($partner->logo) {
            File::delete(public_path($partner->logo));
        }

        $partner->delete();
        return redirect()->route('partners.index')->with('success', 'تم حذف الشريك بنجاح');
    }
}
