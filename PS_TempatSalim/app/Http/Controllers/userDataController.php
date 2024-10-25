<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;


class userDataController extends Controller
{
    #show-user
    public function showUserData()
    {
        $user = User::where('role', 'user')->get();

        foreach ($user as $u) {
            foreach ($user as $u) {
                try {
                    // Attempt to decrypt; if it fails, we assume it's plain text
                    $u->decrypted_password = Crypt::decryptString($u->password);
                } catch (DecryptException $e) {
                    // If decryption fails, assume the password is plain text
                    $u->decrypted_password = $u->password;
                }
            }
        }
        return view('admin-userData', ['user' => $user]);
    }

    #show-update-user
    public function edit (Request $request, $id_user)
    {
        $user = User::where('id_user', $id_user)->firstOrFail();

        return view('admin-manageUser', compact ('user'));
    }

    #update-user
    public function update(Request $request, $id_user)
    {
        $user = User::where('id_user', $id_user)->firstOrFail();

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'username' => ['required', 'string', 'max:255', Rule::unique('users')->ignore($user->id_user, 'id_user')],
            'no_telp' => ['required', 'string', 'max:20', Rule::unique('users')->ignore($user->id_user, 'id_user')],
            'role' => 'required|in:user,admin',
        ]);

        if($validator->fails()){
            return redirect()->back()->withInput()->withErrors($validator);
        }

        DB::beginTransaction();

        $user->update([
            $user->name = $request->name,
            $user->username = $request->username,
            $user->no_telp = $request->no_telp,
            $user->role = $request->role,
        ]);

        DB::commit();

        return redirect()->route('admin.manageUser')->with('success', 'Edit Berhasil!');
    }

    #delete-user
    public function destroy(Request $request, $id_user)
    {
        $data = User::find($id_user);

        if (!$data) {
            return redirect()->route('admin.manageUser')->with('error', 'User not found!');
        }
        $data->delete();

        return redirect()->route('admin.manageUser')->with('success', 'Hapus Berhasil!');
    }

}
