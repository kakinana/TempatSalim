<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class HomeUserController extends Controller
{
    public function index()
    {
        // Fetch all categories from the database
        $categories = Kategori::all();
        return view('categories.index', compact('categories'));
    }

    public function show($id_ct)
    {
        // Fetch the category by ID
        $category = Kategori::findOrFail($id_ct);
        return view('categories.show', compact('category'));
    }
}
