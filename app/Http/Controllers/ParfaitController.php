<?php

namespace App\Http\Controllers;

use App\Models\Parfait; // Use the Parfait model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ParfaitController extends Controller
{

    public function welcome()
    {
        $parfaits = Parfait::all(); // Fetch all parfaits
        return view('welcome', compact('parfaits')); // Pass the parfaits to the view
    }

    public function index()
    {
        $parfaits = Parfait::all();
        return view('parfait', compact('parfaits'));
    }

    public function create()
    {
        return view('create'); // Create a view for adding a new parfait
    }

    public function store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'nullable|string|max:255',
            'technologies' => 'nullable|string|max:255',
            'image' => 'required|url', // Ensure this is a valid URL
            'github_link' => 'nullable|url',
            'live_link' => 'nullable|url',
            'is_featured' => 'boolean',
            'order' => 'integer'
        ]);
    
        // Handle image URL
        $data = $request->all();
        // No need to store the image file, just use the URL directly
        $data['image'] = $request->input('image');
    
        Parfait::create($data); // Insert into the database
        return redirect()->route('projects.index')->with('success', 'Parfait created successfully.');
    }


    public function show(Parfait $parfait)
    {
        return view('show', compact('parfait')); // Create a view for showing a parfait
    }

    public function edit(Parfait $parfait)
    {
        return view('edit', compact('parfait')); // Create a view for editing a parfait
    }

    public function update(Request $request, Parfait $parfait)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'nullable|string|max:255',
            'technologies' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'github_link' => 'nullable|url',
            'live_link' => 'nullable|url',
            'is_featured' => 'boolean',
            'order' => 'integer'
        ]);

        // Handle image upload if provided
        $data = $request->all();
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($parfait->image) {
                Storage::delete(str_replace('/storage/', 'public/', $parfait->image));
            }
            $path = $request->file('image')->store('parfaits', 'public');
            $data['image'] = Storage::url($path);
        }

        $parfait->update($data);
        return redirect()->route('projects.index')->with('success', 'Parfait updated successfully.');
    }

    public function destroy(Parfait $parfait)
    {
        // Delete the image if it exists
        if ($parfait->image) {
            Storage::delete(str_replace('/storage/', 'public/', $parfait->image));
        }
        $parfait->delete();
        return redirect()->route('projects.index')->with('success', 'Parfait deleted successfully.');
    }
}