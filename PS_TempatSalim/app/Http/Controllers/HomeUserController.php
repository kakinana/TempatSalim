<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Gedung;
use Illuminate\Http\Request;

class HomeUserController extends Controller
{
    public function index($id=null)
    {
        // Fetch all categories from the database
        if ($id) {
            // Fetch a specific category with related gedungs if an ID is provided
            $kategori = Kategori::with('gedungs')->findOrFail($id);
            // Pass only the single category to the view
            return view('user-homepage', compact('kategori'));
        } else {
            // Fetch all categories with their related gedungs
            $kategori = Kategori::with('gedungs')->get();
            return view('user-homepage', ['kategori' => $kategori]);
        }
    }

    public function showGedung($id)
{
    $gedung = Gedung::with('kategori')->findOrFail($id);
    return view('user-homepageGedung', compact('gedung'));
}
}
