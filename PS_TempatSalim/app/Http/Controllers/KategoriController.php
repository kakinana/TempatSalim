<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Gedung;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function fetchCategory()
    {
        $kategori = Kategori::with('gedung')->get();
        return view('admin-categoryData', compact('kategori'));
    }

    public function showCategoryID($id_ct)
    {
        $kategori = Kategori::findOrFail($id_ct);
        return view('categories.show', compact('kategori'));
    }

    public function create()
    {
        $kategori = Kategori::all(); // Fetch all gedung for dropdown
        $gedung = Gedung::all(); // Fetch all buildings from the database
        return view('admin-addCategory', compact('kategori', 'gedung'));
        
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_ct' => 'required|unique:kategori,id_ct',
            'name_ct' => 'required|string',
            'code_gd' => 'required|exists:gedung,code_gd',
            'status_ct' => 'required|boolean',
        ]);

        $status_ct = $request->status_ct ?? 1;

        Kategori::create([
            'id_ct' => $request->id_ct,
            'name_ct' => $request->name_ct,
            'code_gd' => $request->code_gd,
            'status_ct' => $request->$status_ct,
        ]);

        return redirect()->route('kategori.show')->with('success', 'Category created successfully!');
    }

    public function edit($id_ct)
    {
        $kategori = Kategori::findOrFail($id_ct);
        $gedung = Gedung::all(); // Fetch all gedung for dropdown
        return view('admin-editCategory', compact('kategori', 'gedung'));
    }

    public function update(Request $request, $id_ct)
    {
        $request->validate([
            'name_ct' => 'required|string',
            'code_gd' => 'required|exists:gedung,code_gd',
        ]);

        $kategori = Kategori::findOrFail($id_ct);
        $kategori->update([
            'name_ct' => $request->name_ct,
            'code_gd' => $request->code_gd,
            'status_ct' => $request->status_ct,
        ]);

        return redirect()->route('kategori.show')->with('success', 'Category updated successfully!');
    }

    public function destroy($id_ct)
    {
        $category = Kategori::findOrFail($id_ct);
        $category->delete();

        return redirect()->route('kategori.show')->with('success', 'Category deleted successfully!');
    }
}
