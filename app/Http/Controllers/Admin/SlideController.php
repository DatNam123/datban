<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SlideStoreRequest;
use App\Models\Post;
use App\Models\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $slides = Slide::all();
        return view('admin.slides.index', compact('slides'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.slides.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SlideStoreRequest $request)
    {

        $image = $request->file('image')->store('public/slides');
        Slide::create([
            'subheading' => $request->subheading,
            'heading' => $request->heading,
            'image' => $image,
            'terms' => $request->terms == 'on' ? 1 : 0,
        ]);
        return to_route('admin.slides.index')->with('success', 'Slide created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Slide $slide)
    {
        return view('admin.slides.edit', compact('slide'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Slide $slide)
    {
        $request->validate([
            'subheading' => 'required',
            'heading' => 'required',
        ]);
        $image = $slide->image;
        if ($request->hasFile('image')) {
            Storage::delete($slide->image);
            $image = $request->file('image')->store('public/slides');
        }
        $slide->update([
            'subheading' => $request->subheading,
            'heading' => $request->heading,
            'terms' => $request->terms == 'on' ? 1 : 0,
            'image' => $image
        ]);
        return to_route('admin.slides.index')->with('success', 'Slide updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Slide $slide)
    {
        Storage::delete($slide->image);
        $slide->delete();
        return to_route('admin.slides.index')->with('success', 'Slide deleted successfully.');
    }
}
