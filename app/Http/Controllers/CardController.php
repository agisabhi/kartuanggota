<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class CardController extends Controller
{
    public function generateCard($id)
    {
        $data = [
            'title' => 'Card',
            'dataAnggota' => Anggota::where('id', $id)->first(),
        ];
        // return dd($data['dataAnggota']);
        $point  = 72;
        $inch = 2.54;
        $panjang = 2.13 / $inch * $point;
        $lebar = 3.39 / $inch * $point;
        $size = array(0, 0, $panjang, $lebar);
        // return dd($size);
        $pdf = PDF::loadView('admin.anggota.create_card', $data)
            ->setPaper('b6', 'landscape');

        return $pdf->stream('kartuanggota_' . $data['dataAnggota']['nomor_kta'] . '.pdf');
    }
}
