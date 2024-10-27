<?php

namespace App\Http\Controllers;

use App\Models\Gedung;
use App\Models\Kategori;
use App\Models\User;
use App\Models\DaftarPinjam;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;


class DaftarPinjamController extends Controller
{
    public function showDaftarPinjam()
    {
        $pinjam = DaftarPinjam::all();
        $user = User::where('role', 'user')->get();
        $gedung = Gedung::all();
        return view('admin-managePinjam', compact('pinjam', 'user', 'gedung'));
    }

    /*public function showCategoryID($id_ct)
    {
        $kategori = Kategori::findOrFail($id_ct);
        return view('categories.show', compact('kategori'));
    }*/

    public function showPinjamForm()
    {
        $user = User::where('role', 'user')->get();
        $gedung = Gedung::all(); 
        $pinjam = DaftarPinjam::all();
        
        return view('admin-pinjamGedung', compact('pinjam', 'gedung', 'user'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_user' => 'required|integer|exists:users,id',
            'id_gd' => 'required|integer|exists:gedung,id',
            'unit_rent' => 'required|integer|max:2',
            'date_rent' => 'required|date',
        ]);

        $date_rent = Carbon::parse($request->input('date_rent'));
        $date_due = $date_rent->copy()->addDays(5);
        //$date_rent = Carbon::parse($request->date_rent);
        //$date_due = $date_rent->copy()->addDays(5);

        DB::beginTransaction();
        Log::info('Received data:', $request->all());

        try {
            $gedung = Gedung::findOrFail($request->id_gd);
            if ($gedung->stock_gd < $request->unit_rent){ 
                Log::info('Insufficient stock.');
                return redirect()->back()->withErrors(['error' => 'Insufficient stock available.']);
            }

            $gedung->stock_gd -= $request->unit_rent;
            $gedung->save();
            //Log::info('Gedung stock updated.');

            //$id_gd = $request->input('id_gd');
            //$unit_rent = $request->input('unit_rent');

            //Log::info("Updated stock for Gedung ID {$gedung->id_gd}: {$gedung->stock_gd}");

            DaftarPinjam::create([
                'id_user' => $request->id_user,
                'id_gd' => $request->id_gd,
                'unit_rent' => $request->unit_rent,              
                'date_rent' => $date_rent,
                'date_due' => $date_due,
                //'returned' => $request->returned == 1 ? "Dikembalikan" : "Belum dikembalikan"

            ]);
            //Log::info('Rental record created.');


        /*    #update status kategori
            $kategori = DB::table('kategori_gedung')
            ->where('id_gd', $request->id_gd)
            ->pluck('id_ct');

                foreach ($kategori as $id_ct) {
                    $stock = DB::table('kategori_gedung')
                    ->join('gedung', 'gedung.id_gd', '=', 'kategori_gedung.id_gd')
                    ->where('kategori_gedung.id_ct', $id_ct)
                    ->where('gedung.stock_gd', '>', 0)
                    ->exists();

                    Kategori::where('id', $id_ct)->update(['status_ct' => $stock ? 1 : 0]);

                    /*if($stock) {
                        Kategori::where('id', $id_ct)->update(['status_ct' => 0]);
                    }else {
                        Kategori::where('id', $id_ct)->update(['status_ct' => 1]);
                    }
                }*/
            DB::commit();
            Log::info('Data saved successfully.');
            //Log::info('Database transaction committed.');
           // return response()->json(['message' => 'Data saved successfully.'], 200);
            return redirect()->route('admin.managePinjam')->with('success', 'Rental created successfully.');
        } catch (\Exception $e) {
            //DB::rollback();
            Log::info('Data saved successfully.');
            //return redirect()->back()->withErrors(['error' => 'Failed to process rental']);
        }
    }


    public function destroy($id)
    {
        $kategori = DaftarPinjam::findOrFail($id);
        $kategori->delete();

        return redirect()->route('admin.manageKategori')->with('success', 'Category deleted successfully!');
    }
}