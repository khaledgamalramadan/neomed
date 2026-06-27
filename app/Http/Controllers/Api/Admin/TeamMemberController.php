<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\TeamMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeamMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(TeamMember::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'position' => 'required|string',
            'linkedin' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('team', 'public');
        }

        $member = TeamMember::create([
            'name' => $request->name,
            'position' => $request->position,
            'linkedin' => $request->linkedin,
            'image' => $imagePath,
        ]);

        return response()->json($member, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return response()->json(TeamMember::findOrFail($id));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'sometimes|string',
            'position' => 'sometimes|string',
            'linkedin' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $member = TeamMember::findOrFail($id);

        if ($request->hasFile('image')) {

            if ($member->image) {
                Storage::disk('public')->delete($member->image);
            }

            $member->image = $request->file('image')
                ->store('team', 'public');
        }

        if ($request->has('name')) {
            $member->name = $request->name;
        }

        if ($request->has('position')) {
            $member->position = $request->position;
        }

        if ($request->has('linkedin')) {
            $member->linkedin = $request->linkedin;
        }

        $member->save();

        return response()->json($member);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $member = TeamMember::findOrFail($id);

        if ($member->image) {
            Storage::disk('public')->delete($member->image);
        }

        $member->delete();

        return response()->json(['message' => 'Team member deleted successfully']);
    }
}
