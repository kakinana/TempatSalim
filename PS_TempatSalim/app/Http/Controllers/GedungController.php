<?php

namespace App\Http\Controllers;

use App\Models\Gedung;
use Illuminate\Http\Request;

class GedungController extends Controller
{
    public function showGedung()
    {
        $gedung = Gedung::all(); // Fetch all buildings from the database
        return view('admin-gedungData', ['gedung' => $gedung]);
    }

    // Show form to create a new building
    public function showGedungForm()
    {
        return view('admin-addGedung');
    }

    // Store a new building
    public function store(Request $request)
    {
        // Validate input
        $request->validate([
            'name_gd' => 'required|string|max:255',
            'code_gd' => 'required|string|unique:gedung,code_gd',
            'price_gd' => 'required|integer|min:0',
            'stock_gd' => 'required|integer|min:0',
            'status_gd' => 'required|boolean'
        ]);

        // Create new building
        Gedung::create([
            'name_gd' => $request->name_gd,
            'code_gd' => $request->code_gd,
            'price_gd' => $request->price_gd,
            'stock_gd' => $request->stock_gd,
            'status_gd' => $request->status_gd,
        ]);

        // Redirect with a success message
        return redirect()->route('admin.manageGedung')->with('success', 'New building added successfully!');
    }

    // Show a specific building (optional)
    public function show($id)
    {
        $gedung = Gedung::findOrFail($id);
        return view('gedung.show', compact('gedung'));
    }

    public function edit($id)
    {
        $gedung = Gedung::findOrFail($id);
        return view('admin-editGedung', compact('gedung'));
    }

    public function update(Request $request, $id)
    {
        // Validate input
        $request->validate([
            'name_gd' => 'required|string|max:255',
            'code_gd' => 'required|string|unique:gedung,code_gd,' . $id,
            'price_gd' => 'required|integer|min:0',
            'stock_gd' => 'required|integer|min:0',
            'status_gd' => 'required|boolean'
        ]);

        // Update building
        $gedung = Gedung::findOrFail($id);
        $gedung->update($request->all());

        // Redirect with a success message
        return redirect()->route('admin.manageGedung')->with('success', 'Building updated successfully!');
    }

    // Delete a building (optional)
    public function destroy($id)
    {
        Gedung::destroy($id);

        return redirect()->route('admin.manageGedung')->with('success', 'Building deleted successfully!');
    }
}
