<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $settings = DB::table('settings')->pluck('value', 'key')->toArray();
        return view('admin.settings.edit', compact('settings'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        DB::table('settings')->updateOrInsert(
            ['key' => 'site_description'],
            ['value' => $request->input('site_description')]
        );

        DB::table('settings')->updateOrInsert(
            ['key' => 'beneficiaries_count'],
            ['value' => $request->input('beneficiaries_count')]
        );

        DB::table('settings')->updateOrInsert(
            ['key' => 'volunteers_count'],
            ['value' => $request->input('volunteers_count')]
        );

        DB::table('settings')->updateOrInsert(
            ['key' => 'projects_count'],
            ['value' => $request->input('projects_count')]
        );

        if ($request->filled('site_name')) {
            DB::table('settings')->updateOrInsert(
                ['key' => 'site_name'],
                ['value' => $request->input('site_name')]
            );
        }

        if ($request->filled('intro_video')) {
            $videoUrl = $request->input('intro_video');

            if (preg_match('/youtu\.be\/([a-zA-Z0-9_-]+)/', $videoUrl, $matches)) {
                $videoId = $matches[1];
                $introVideo = 'https://www.youtube.com/embed/' . $videoId;
            } elseif (preg_match('/watch\?v=([a-zA-Z0-9_-]+)/', $videoUrl, $matches)) {
                $videoId = $matches[1];
                $introVideo = 'https://www.youtube.com/embed/' . $videoId;
            } else {
                $introVideo = $videoUrl;
            }

            DB::table('settings')->updateOrInsert(
                ['key' => 'intro_video'],
                ['value' => $introVideo]
            );
        }


        if ($request->hasFile('site_logo')) {
            $siteLogo = $request->file('site_logo')->store('logos', 'public');
            DB::table('settings')->updateOrInsert(
                ['key' => 'site_logo'],
                ['value' => 'storage/' . $siteLogo]
            );
        }

        if ($request->filled('contact_number')) {
            DB::table('settings')->updateOrInsert(
                ['key' => 'contact_number'],
                ['value' => $request->input('contact_number')]
            );
        }

        if ($request->filled('facebook')) {
            DB::table('settings')->updateOrInsert(
                ['key' => 'facebook'],
                ['value' => $request->input('facebook')]
            );
        }

        if ($request->filled('twitter')) {
            DB::table('settings')->updateOrInsert(
                ['key' => 'twitter'],
                ['value' => $request->input('twitter')]
            );
        }

        if ($request->filled('instagram')) {
            DB::table('settings')->updateOrInsert(
                ['key' => 'instagram'],
                ['value' => $request->input('instagram')]
            );
        }

        if ($request->filled('linkedin')) {
            DB::table('settings')->updateOrInsert(
                ['key' => 'linkedin'],
                ['value' => $request->input('linkedin')]
            );
        }

        return redirect()->back()->with('success', 'تم تحديث الإعدادات بنجاح');
    }





    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($index) {}
}
