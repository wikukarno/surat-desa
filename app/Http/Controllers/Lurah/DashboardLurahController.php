<?php

namespace App\Http\Controllers\Lurah;

use App\Models\SKP;
use App\Models\SKU;
use App\Models\SKTM;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Letters;
use App\Models\User;

class DashboardLurahController extends Controller
{
    public function index()
    {
        $user = User::count();
        $skuLurah = Letters::count();
        $skpLurah = Letters::count();
        $sktmLurah = Letters::count();
        return view('pages.lurah.dashboard', [
            'user' => $user,
            'skuLurah' => $skuLurah,
            'skpLurah' => $skpLurah,
            'sktmLurah' => $sktmLurah,
        ]);
    }
}
