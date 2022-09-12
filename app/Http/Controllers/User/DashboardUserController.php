<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\SKP;
use App\Models\SKTM;
use App\Models\SKU;

class DashboardUserController extends Controller
{
    public function index()
    {
        $skuUser = SKU::count();
        $skpUser = SKP::count();
        $sktmUser = SKTM::count();
        return view('pages.user.dashboard', [
            'skuUser' => $skuUser,
            'skpUser' => $skpUser,
            'sktmUser' => $sktmUser,
        ]);
    }
}
