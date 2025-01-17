<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Setting;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class CardController extends Controller
{
    public function generateCard($id)
    {
        $setting = Setting::first();
        $background = asset('storage/' . $setting->background_card);
        $photoPath = public_path('storage/' . $setting->background_card);
        $photoBase64 = 'data:image/' . pathinfo($photoPath, PATHINFO_EXTENSION) . ';base64,' . base64_encode(file_get_contents($photoPath));
        $data = [
            'title' => 'Card',
            'dataAnggota' => Anggota::where('id', $id)->first(),
            'settings' => $photoBase64,
        ];
        // return dd($data['dataAnggota']);
        $point  = 72;
        $inch = 2.54;
        $panjang = 2.13 / $inch * $point;
        $lebar = 3.39 / $inch * $point;
        $size = array(0, 0, $panjang, $lebar);
        // return dd($photoPath, $setting->background_card, file_exists($photoPath));
        $pdf = PDF::loadView('admin.anggota.create_card', $data)
            ->setPaper('b6', 'landscape')
            ->setOption('isRemoteEnabled', true);
        return $pdf->stream('kartuanggota_' . $data['dataAnggota']['nomor_kta'] . '.pdf');
    }
}
