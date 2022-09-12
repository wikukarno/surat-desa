<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Models\SKP;
use App\Models\SKTM;
use App\Models\SKU;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardStaffController extends Controller
{
    public function index()
    {
        $user = User::count();
        $skuStaff = SKU::count();
        $skpStaff = SKP::count();
        $sktmStaff = SKTM::count();
        return view('pages.staff.dashboard', [
            'user' => $user,
            'skuStaff' => $skuStaff,
            'skpStaff' => $skpStaff,
            'sktmStaff' => $sktmStaff,
        ]);
    }
}
