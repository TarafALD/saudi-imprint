<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Landmark;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LandmarkController extends Controller
{
    public function index()
    {
        $landmarks = Landmark::all();
        return view('admin.landmarks.index', compact('landmarks'));
    }

    public function create()
    {
        return view('admin.landmarks.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'Name' => 'required|max:255',
            'Image' => 'required|max:255',
            'Location' => 'required|max:255',
            'Description' => 'required|max:255',
        ]);

        Landmark::create([
            'Name' => $request->Name,
            'Image' => $request->Image,
            'Opening_Hours' => $request->Opening_Hours,
            'Location' => $request->Location,
            'Description' => $request->Description,
            'Admin_id' => Auth::id(), 
        ]);

        return redirect()->route('Admin.dashboard')->with('success', 'Landmark created successfully.');
    }

    public function edit($id)
    {
        $landmark = Landmark::findOrFail($id);
        return view('admin.landmarks.edit', compact('landmark'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'Name' => 'required|max:50',
            'Image' => 'required|max:50',
            'Location' => 'required|max:50',
            'Description' => 'required|max:50',
        ]);

        $landmark = Landmark::findOrFail($id);

        $landmark->update($request->all());

        return redirect()->route('Admin.dashboard')->with('success', 'Landmark updated successfully.');
    }

    public function destroy($id)
    {
        $landmark = Landmark::findOrFail($id);
        $landmark->delete();

        return redirect()->route('Admin.dashboard')->with('success', 'Landmark deleted successfully.');
    }
}
