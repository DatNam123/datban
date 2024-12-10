<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TeamStoreRequest;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teams = Team::orderBy('id', 'desc')->simplePaginate(2);


        return view('admin.teams.index', compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.teams.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TeamStoreRequest $request)
    {
        $image = $request->file('image')->store('public/teams');
        Team::create([
            'name' => $request->name,
            'job' => $request->name,
            'image' => $image,
            'description' => $request->description,
        ]);
        return to_route('admin.teams.index')->with('success', 'Chef created successfuly.');
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
    public function edit(Team $team)
    {
        return view('admin.teams.edit', compact('team'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Team $team)
    {
        $request->validate([
            'name' => 'required',
            'job' => 'required'
        ]);
        $image = $team->image;
        if ($request->hasFile('image')) {
            Storage::delete($team->image);
            $image = $request->file('image')->store('public/teams');
        }
        $team->update([
            'name' => $request->name,
            'job' => $request->job,
            'description' => $request->description,
            'image' => $image
        ]);
        return to_route('admin.teams.index')->with('success', 'Chef updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Team $team)
    {
        Storage::delete($team->image);
        $team->delete();
        return to_route('admin.teams.index')->with('success', 'Chef deleted successfully.');
    }
}
