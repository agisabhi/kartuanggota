<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Setting;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Barryvdh\DomPDF\Facade\Pdf;

class CardController extends Controller
{
    public function generateCard($id)
    {
        $setting = Setting::first();

        $photoPath = public_path('storage' . $setting->background_card);
        $photoBase64 = 'data:image/' . pathinfo($photoPath, PATHINFO_EXTENSION) . ';base64,' . base64_encode(file_get_contents($photoPath));
        $data = [
            'title' => 'Card',
            'dataAnggota' => Anggota::where('id', $id)->first(),
            'settings' => $photoBase64,
            'setting' => $setting,
        ];
        // return dd($data['dataAnggota']);
        $point  = 72;
        $inch = 2.54;
        $panjang = 2.13 / $inch * $point;
        $lebar = 3.39 / $inch * $point;
        $size = array(0, 0, $panjang, $lebar);
        // return dd($photoPath, $setting->background_card, file_exists($photoPath));
        $pdf = PDF::loadView('admin.anggota.create_card', $data)
            ->setPaper('a7', 'landscape')
            ->setOption('isRemoteEnabled', true);
        return $pdf->stream('kartuanggota_' . $data['dataAnggota']['nomor_kta'] . '.pdf');
    }

    public function generateCardPng($id)
    {
        //Ambil data anggota
        $anggota = Anggota::where('id', $id)->first();
        //Ambil Gambar Background
        $setting = Setting::first();
        // Gunakan GD Driver
        $driver = new Driver();
        $manager = new ImageManager($driver);

        // Path ke gambar latar belakang (background)
        $backgroundPath = public_path('storage/' . $setting->background_card); // Ubah sesuai path Anda

        // Load gambar background
        $image = $manager->read($backgroundPath);

        // Membuat kanvas 86mm x 54mm (KTP ukuran standar)
        $width = 86 * 3.7795275591; // mm ke pixel (1 mm ≈ 3.7795275591 px)
        $height = 54 * 3.7795275591;
        $image->resize($width, $height);

        // BARIS 1 Y=70
        // Tambahkan teks ke gambar
        $image->text(
            'Nomor KTA',
            10,
            70,
            function ($font) {
                $font->file(public_path('src/ARIAL.TTF'));
                $font->size(11); // Ukuran font
                $font->color('#000000'); // Warna font
                $font->align('left'); // Posisi teks horizontal
                $font->valign('top'); // Posisi teks vertikal
            }
        );

        $image->text(':', 70, 70, function ($font) {
            $font->file(public_path('src/ARIAL.TTF'));
            $font->size(11); // Ukuran font
            $font->color('#000000'); // Warna font
            $font->align('left'); // Posisi teks horizontal
            $font->valign('top'); // Posisi teks vertikal
        });

        $image->text(
            $anggota->nomor_kta,
            75,
            70,
            function ($font) {
                $font->file(public_path('src/ARIAL.TTF'));
                $font->size(11); // Ukuran font
                $font->color('#000000'); // Warna font
                $font->align('left'); // Posisi teks horizontal
                $font->valign('top'); // Posisi teks vertikal
            }
        );

        // END BARIS 2
        // BARIS 2 Y-80
        // Tambahkan teks ke gambar
        $image->text('Nama', 10, 80, function ($font) {
            $font->file(public_path('src/ARIAL.TTF'));
            $font->size(11); // Ukuran font
            $font->color('#000000'); // Warna font
            $font->align('left'); // Posisi teks horizontal
            $font->valign('top'); // Posisi teks vertikal
        });

        $image->text(':', 70, 80, function ($font) {
            $font->file(public_path('src/ARIAL.TTF'));
            $font->size(11); // Ukuran font
            $font->color('#000000'); // Warna font
            $font->align('left'); // Posisi teks horizontal
            $font->valign('top'); // Posisi teks vertikal
        });

        $image->text(
            $anggota->nama,
            75,
            80,
            function ($font) {
                $font->file(public_path('src/ARIAL.TTF'));
                $font->size(11); // Ukuran font
                $font->color('#000000'); // Warna font
                $font->align('left'); // Posisi teks horizontal
                $font->valign('top'); // Posisi teks vertikal
            }
        );

        // END BARIS 2

        // BARIS 3 Y=90
        // Tambahkan teks ke gambar
        $image->text('NIK', 10, 90, function ($font) {
            $font->file(public_path('src/ARIAL.TTF'));
            $font->size(11); // Ukuran font
            $font->color('#000000'); // Warna font
            $font->align('left'); // Posisi teks horizontal
            $font->valign('top'); // Posisi teks vertikal
        });

        $image->text(
            ':',
            70,
            90,
            function ($font) {
                $font->file(public_path('src/ARIAL.TTF'));
                $font->size(11); // Ukuran font
                $font->color('#000000'); // Warna font
                $font->align('left'); // Posisi teks horizontal
                $font->valign('top'); // Posisi teks vertikal
            }
        );

        $image->text(
            $anggota->nik,
            75,
            90,
            function ($font) {
                $font->file(public_path('src/ARIAL.TTF'));
                $font->size(11); // Ukuran font
                $font->color('#000000'); // Warna font
                $font->align('left'); // Posisi teks horizontal
                $font->valign('top'); // Posisi teks vertikal
            }
        );

        // END BARIS 3
        // BARIS 4 Y=100
        // Tambahkan teks ke gambar
        $image->text(
            'Provinsi',
            10,
            100,
            function ($font) {
                $font->file(public_path('src/ARIAL.TTF'));
                $font->size(11); // Ukuran font
                $font->color('#000000'); // Warna font
                $font->align('left'); // Posisi teks horizontal
                $font->valign('top'); // Posisi teks vertikal
            }
        );

        $image->text(
            ':',
            70,
            100,
            function ($font) {
                $font->file(public_path('src/ARIAL.TTF'));
                $font->size(11); // Ukuran font
                $font->color('#000000'); // Warna font
                $font->align('left'); // Posisi teks horizontal
                $font->valign('top'); // Posisi teks vertikal
            }
        );

        $image->text(
            $anggota->province->name,
            75,
            100,
            function ($font) {
                $font->file(public_path('src/ARIAL.TTF'));
                $font->size(11); // Ukuran font
                $font->color('#000000'); // Warna font
                $font->align('left'); // Posisi teks horizontal
                $font->valign('top'); // Posisi teks vertikal
            }
        );

        // END BARIS 4
        // BARIS 5 Y=110
        // Tambahkan teks ke gambar
        $image->text(
            'Kab/Kota',
            10,
            110,
            function ($font) {
                $font->file(public_path('src/ARIAL.TTF'));
                $font->size(11); // Ukuran font
                $font->color('#000000'); // Warna font
                $font->align('left'); // Posisi teks horizontal
                $font->valign('top'); // Posisi teks vertikal
            }
        );

        $image->text(
            ':',
            70,
            110,
            function ($font) {
                $font->file(public_path('src/ARIAL.TTF'));
                $font->size(11); // Ukuran font
                $font->color('#000000'); // Warna font
                $font->align('left'); // Posisi teks horizontal
                $font->valign('top'); // Posisi teks vertikal
            }
        );

        $image->text(
            $anggota->city->name,
            75,
            110,
            function ($font) {
                $font->file(public_path('src/ARIAL.TTF'));
                $font->size(11); // Ukuran font
                $font->color('#000000'); // Warna font
                $font->align('left'); // Posisi teks horizontal
                $font->valign('top'); // Posisi teks vertikal
            }
        );

        // END BARIS 5
        // BARIS 6 Y=120
        // Tambahkan teks ke gambar
        $image->text('Kecamatan', 10, 120, function ($font) {
            $font->file(public_path('src/ARIAL.TTF'));
            $font->size(11); // Ukuran font
            $font->color('#000000'); // Warna font
            $font->align('left'); // Posisi teks horizontal
            $font->valign('top'); // Posisi teks vertikal
        });

        $image->text(
            ':',
            70,
            120,
            function ($font) {
                $font->file(public_path('src/ARIAL.TTF'));
                $font->size(11); // Ukuran font
                $font->color('#000000'); // Warna font
                $font->align('left'); // Posisi teks horizontal
                $font->valign('top'); // Posisi teks vertikal
            }
        );

        $image->text(
            $anggota->district->name,
            75,
            120,
            function ($font) {
                $font->file(public_path('src/ARIAL.TTF'));
                $font->size(11); // Ukuran font
                $font->color('#000000'); // Warna font
                $font->align('left'); // Posisi teks horizontal
                $font->valign('top'); // Posisi teks vertikal
            }
        );

        // END BARIS 6
        // BARIS 7 Y=130
        // Tambahkan teks ke gambar
        $image->text('Kelurahan', 10, 130, function ($font) {
            $font->file(public_path('src/ARIAL.TTF'));
            $font->size(11); // Ukuran font
            $font->color('#000000'); // Warna font
            $font->align('left'); // Posisi teks horizontal
            $font->valign('top'); // Posisi teks vertikal
        });

        $image->text(
            ':',
            70,
            130,
            function ($font) {
                $font->file(public_path('src/ARIAL.TTF'));
                $font->size(11); // Ukuran font
                $font->color('#000000'); // Warna font
                $font->align('left'); // Posisi teks horizontal
                $font->valign('top'); // Posisi teks vertikal
            }
        );

        $image->text(
            $anggota->village->name,
            75,
            130,
            function ($font) {
                $font->file(public_path('src/ARIAL.TTF'));
                $font->size(11); // Ukuran font
                $font->color('#000000'); // Warna font
                $font->align('left'); // Posisi teks horizontal
                $font->valign('top'); // Posisi teks vertikal
            }
        );

        // END BARIS 6


        // save modified image in new format 
        // Storage::put('storage/upload/file.jpg', $image->stream());
        $image->toPng(indexed: true)->save('storage/upload/' . $anggota->nomor_kta . '.png');

        return response()->download('storage/upload/' . $anggota->nomor_kta . '.png');  // Menyediakan file untuk diunduh
    }
}
