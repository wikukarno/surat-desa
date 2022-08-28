<?php

namespace App\Http\Controllers\Lurah;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardLurahController extends Controller
{
    public function index()
    {
        return view('pages.lurah.dashboard');
    }
}
