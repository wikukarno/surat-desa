<?php

namespace App\Http\Controllers;

use App\Models\SKU;
use App\Models\User;
use Carbon\Carbon;
use PDF;
use Illuminate\Http\Request;

class CetakController extends Controller
{
    public function cetak_sku(Request $request)
    {
        $path = base_path('public/assets/images/logo.png'); // local
        // $path = asset('assets/images/uir.png'); // production
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $pic  = 'data:image/' . $type . ';base64,' . base64_encode($data);

        $sku = SKU::with(['user'])->where('id', $request->id)->first();
        $user = User::where('id', $sku->users_id)->first();
        $pdf  = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('pages.cetak.surat-keterangan-usaha', [
            'title' => 'Surat Tugas',
            'pic' => $pic,
            'sku' => $sku,
            'user' => $user
        ]);

        $tgl_cetak = date('d-M-Y');
        return $pdf->download('Surat_Keterangan_Usaha_' . $user->name . '_' . $tgl_cetak . '.pdf');
        // return $pdf->stream('Surat_Keterangan_Usaha_' . $user->name .  '.pdf');
    }
}
