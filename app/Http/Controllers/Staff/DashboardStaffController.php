<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Models\Letters;
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
        $skuStaff = Letters::count();
        $skpStaff = Letters::count();
        $sktmStaff = Letters::count();
        return view('pages.staff.dashboard', [
            'user' => $user,
            'skuStaff' => $skuStaff,
            'skpStaff' => $skpStaff,
            'sktmStaff' => $sktmStaff,
        ]);
    }
}
