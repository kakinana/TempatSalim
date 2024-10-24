<?php

namespace App\Http\Controllers;

use App\Models\Gedung;
use Illuminate\Http\Request;

class GedungController extends Controller
{
    public function view()
    {
        $gedung = Gedung::all(); // Fetch all buildings from the database
        return view('admin-gedungData', compact('gedung'));
    }

    // Show form to create a new building
    public function create()
    {
        return view('gedung.create');
    }

    // Store a new building
    public function store(Request $request)
    {
        // Validate input
        $request->validate([
            'name_gd' => 'required|string|max:255',
            'code_gd' => 'required|numeric|unique:gedung,code_gd',
            'price_gd' => 'required|numeric',
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
        return redirect()->route('gedung.create')->with('success', 'New building added successfully!');
    }

    // Show a specific building (optional)
    public function show($id_gd)
    {
        $gedung = Gedung::findOrFail($id_gd);
        return view('gedung.show', compact('gedung'));
    }

    // Show edit form (optional)
    public function edit($id_gd)
    {
        $gedung = Gedung::findOrFail($id_gd);
        return view('admin-gedungData', compact('gedung'));
    }

    // Update an existing building (optional)
    public function update(Request $request, $id_gd)
    {
        // Validate input
        $request->validate([
            'name_gd' => 'required|string|max:255',
            'code_gd' => 'required|numeric|unique:gedung,code_gd,' . $id_gd,
            'price_gd' => 'required|numeric',
            'stock_gd' => 'required|integer|min:0',
            'status_gd' => 'required|boolean'
        ]);

        // Update building
        $gedung = Gedung::findOrFail($id_gd);
        $gedung->update($request->all());

        // Redirect with a success message
        return redirect()->route('kategori.create')->with('success', 'Building updated successfully!');
    }

    // Delete a building (optional)
    public function destroy($id_gd)
    {
        Gedung::destroy($id_gd);

        return redirect()->route('gedung.show')->with('success', 'Building deleted successfully!');
    }
}
