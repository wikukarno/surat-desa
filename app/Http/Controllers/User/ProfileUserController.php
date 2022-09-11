<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ProfileUserController extends Controller
{
    public function index()
    {
        return view('pages.user.profile');
    }

    public function update(Request $request)
    {
        $user = User::find($request->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->no_telephone = $request->no_telephone;
        $user->alamat = $request->alamat;
        $user->save();
    }

    public function ubahFoto(Request $request)
    {
        $user = User::find($request->id);
        $user->foto_profile = $request->file('foto_profile')->store('assets/profile', 'public');
        $user->save();

        Alert::success('Berhasil', 'Foto Profile Berhasil Diubah');
        return redirect()->back();
    }

    public function show(Request $request)
    {
        if (request()->ajax()) {
            $where = array('users.id' => $request->id);
            $result = User::where($where)->first();
            if ($result) {
                return Response()->json($result);
            } else {
                return Response()->json(['error' => 'Lampiran tidak ditemukan!']);
            }
        } else {
            $result = (['status' => false, 'message' => 'Maaf, akses ditolak!']);
        }
        return Response()->json($result);
    }
}
