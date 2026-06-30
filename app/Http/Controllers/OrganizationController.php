<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use App\Models\User; // <-- ADDED THIS IMPORT
use Illuminate\Http\Request;

class OrganizationController extends Controller
{
    public function index()
    {
        // Added 'with("adviser")' to load the adviser data efficiently
        $data['organizations'] = Organization::with('adviser')->latest()->get();
        return view('organizations.index', $data);
    }

    public function create()
    {
        // Fetch only users who are Faculty to pass to the dropdown
        $data['faculties'] = User::where('role', 'Faculty')->orderBy('fname')->get();
        return view('organizations.create-org', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'acronym'     => 'nullable|string|max:50',
            'description' => 'nullable|string',
            'category'    => 'required|in:Academic,Religious,Sports,Cultural',
            'status'      => 'required|in:Active,Inactive',
            'adviser_id'  => 'nullable|exists:users,id' // <-- Added Validation
        ]);

        $org = new Organization;
        $org->name = $request->name;
        $org->acronym = $request->acronym;
        $org->description = $request->description;
        $org->category = $request->category;
        $org->status = $request->status;
        $org->adviser_id = $request->adviser_id; // <-- Added Saving Logic
        $org->save();

        return redirect()->route('organizations.index')->with('success', 'Organization created successfully.');
    }

    public function show(int $id)
    {
        $data['organization'] = Organization::find($id);
        return view('organizations.show', $data);
    }

    public function edit(int $id)
    {
        $data['organization'] = Organization::find($id);
        $data['faculties'] = User::where('role', 'Faculty')->orderBy('fname')->get();
        return view('organizations.edit-org', $data);
    }

    public function update(Request $request, int $id)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'acronym'     => 'nullable|string|max:50',
            'description' => 'nullable|string',
            'category'    => 'required|in:Academic,Religious,Sports,Cultural',
            'status'      => 'required|in:Active,Inactive',
            'adviser_id'  => 'nullable|exists:users,id' // <-- Added Validation
        ]);

        $org = Organization::find($id);
        $org->name = $request->name;
        $org->acronym = $request->acronym;
        $org->description = $request->description;
        $org->category = $request->category;
        $org->status = $request->status;
        $org->adviser_id = $request->adviser_id; // <-- Added Saving Logic
        $org->save();

        return redirect()->route('organizations.index')->with('success', 'Organization updated successfully.');
    }

    public function destroy(int $id)
    {
        $org = Organization::find($id);
        $org->delete();

        return redirect()->back()->with('success', 'Organization has been deleted.');
    }
}