<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DataPendudukController extends Controller
{
    public function getPendudukLurah()
    {
        if (request()->ajax()) {
            $query = User::where('roles', 'user')->get();

            return datatables()->of($query)
                ->addIndexColumn()
                ->editColumn('foto_profile', function ($item) {
                    if ($item->foto_profile != null) {
                        return '<img src="' . Storage::url($item->foto_profile) . '" class="img-fluid rounded-circle" width="40px" height="40px">';
                    } else {
                        return '<img src="' . asset('assets/images/user.png') . '" class="img-fluid rounded-circle" width="40px" height="40px">';
                    }
                })
                ->editColumn('alamat', function ($item) {
                    if ($item->alamat == null) {
                        return '-';
                    } else {
                        return $item->alamat;
                    }
                })
                ->rawColumns(['alamat', 'foto_profile'])
                ->make(true);
        }
        return view('pages.lurah.data-penduduk');
    }
    public function getPendudukStaff()
    {
        if (request()->ajax()) {
            $query = User::where('roles', 'user')->get();

            return datatables()->of($query)
                ->addIndexColumn()
                ->editColumn('foto_profile', function ($item) {
                    if ($item->foto_profile != null) {
                        return '<img src="' . Storage::url($item->foto_profile) . '" class="img-fluid rounded-circle" width="40px" height="40px">';
                    } else {
                        return '<img src="' . asset('assets/images/user.png') . '" class="img-fluid rounded-circle" width="40px" height="40px">';
                    }
                })
                ->editColumn('alamat', function ($item) {
                    if ($item->alamat == null) {
                        return '-';
                    } else {
                        return $item->alamat;
                    }
                })
                ->rawColumns(['alamat', 'foto_profile'])
                ->make(true);
        }
        return view('pages.staff.data-penduduk');
    }
}
