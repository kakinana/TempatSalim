<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Gedung;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function showKategori()
    {
        $kategori = Kategori::with('gedung')->get();
        return view('admin-categoryData', compact('kategori'));
    }

    /*public function showCategoryID($id_ct)
    {
        $kategori = Kategori::findOrFail($id_ct);
        return view('categories.show', compact('kategori'));
    }*/

    public function showKategoriForm()
    {
        $kategori = Kategori::all(); // Fetch all gedung for dropdown
        //$gedung = Gedung::all(); // Fetch all buildings from the database
        return view('admin-addCategory', compact('kategori'));
        
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_ct' => 'required|string|max:255|unique:kategori,name_ct',
            'detail_ct' => 'required|string',
            'status_ct' => 'required|boolean',
        ]);

        //$status_ct = $request->status_ct ?? 1;

        Kategori::create([
            'name_ct' => $request->name_ct,
            'detail_ct' => $request->detail_ct,
            'status_ct' => $request->status_ct,
        ]);

        return redirect()->route('admin.manageKategori')->with('success', 'Category created successfully!');
    }

    public function showEditForm($id)
    {
        $kategori = Kategori::findOrFail($id);
        //$gedung = Gedung::all(); // Fetch all gedung for dropdown
        return view('admin-editCategory', compact('kategori'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name_ct' => 'required|string|max:255|unique:kategori,name_ct',
            'detail_ct' => 'required|string',
            'status_ct' => 'required|boolean',
            //'code_gd' => 'required|exists:gedung,code_gd',
        ]);

        $kategori = Kategori::findOrFail($id);
        $kategori->update([
            'name_ct' => $request->name_ct,
            'code_gd' => $request->code_gd,
            'status_ct' => $request->status_ct,
        ]);

        return redirect()->route('admin.manageKategori')->with('success', 'Category updated successfully!');
    }

    public function destroy($id)
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();

        return redirect()->route('admin.manageKategori')->with('success', 'Category deleted successfully!');
    }
}
