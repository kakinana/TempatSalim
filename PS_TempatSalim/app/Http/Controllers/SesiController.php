<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class SesiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function showRegistForm()
    {
        return view('admin-register');
    }

    #untuk registrasi (Add User)
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'no_telp' => 'required|string|max:20|unique:users',
            'role' => 'required|in:user,admin',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        DB::beginTransaction();

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'password' => Crypt::encryptString($request->password),
            'no_telp' => $request->no_telp,
            'role' => $request->role,
        ]);

        DB::commit();

        return redirect()->route('admin.manageUser')->with('success', 'Registrasi berhasil!');
    }

    function indexSesi()
    {
        return view('login');
    }

    #untuk validasi login
    function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'password' => 'required|string|min:8',
        ], [
            'username.required' => 'Username wajib diisi!',
            'password.required' => 'Password wajib diisi!',
        ]);

        $user = User::where('username', $request->username)->first();

        if ($user && Crypt::decryptString($request->password) === ($user->password)) {
            Auth::login($user);
            $role = $user->role;

            Session::put('id_user', $user->id_user);
            Session::put('username', $user->username);
            Session::put('role', $user->role);
            
            if ($role === 'admin') {
                return redirect()->route('admin.homepage');
            } elseif ($role === 'user') {
                return redirect()->route('user.homepage', ['username' => $user->username]);
            }
        } else {
            return redirect('/')->withErrors( 'Username atau password salah!')->withInput();
        }
    }

    #untuk Logout
    public function logout()
    {
        Auth::logout();
        Session::flush();
        return redirect('/')->with('success', 'Berhasil logout!');

    }
   
    /*public function update(Request $request, string $id)
    {
        //
    }

     * Remove the specified resource from storage.
    public function destroy(string $id)
    {
        //
    }*/
}
