<?php

use App\Livewire;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CardController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\SettingController;
use Symfony\Component\HttpFoundation\Response;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [AnggotaController::class, 'index']);
Route::get('/generateCard/{id}', [CardController::class, 'generateCard']);
Route::get('/generateCardPng/{id}', [CardController::class, 'generateCardPng']);

Route::get('/test-image', function () {
    // Gunakan GD Driver
    $driver = new Driver();
    $manager = new ImageManager($driver);

    // Path ke gambar latar belakang (background)
    $backgroundPath = public_path('storage/upload/frRzXY2GRKK1k1Cpm07cnzYAxoac4Xqsja93ILVa.jpg'); // Ubah sesuai path Anda

    // Load gambar background
    $image = $manager->read($backgroundPath);

    // Membuat kanvas 86mm x 54mm (KTP ukuran standar)
    $width = 86 * 3.7795275591; // mm ke pixel (1 mm ≈ 3.7795275591 px)
    $height = 54 * 3.7795275591;
    $image->resize($width, $height);

    // BARIS 1 Y=70
    // Tambahkan teks ke gambar
    $image->text('Nomor KTA', 10, 70, function ($font) {
        $font->file(public_path('src/ARIAL.TTF'));
        $font->size(10); // Ukuran font
        $font->color('#000000'); // Warna font
        $font->align('left'); // Posisi teks horizontal
        $font->valign('top'); // Posisi teks vertikal
    });

    $image->text(':', 65, 70, function ($font) {
        $font->file(public_path('src/ARIAL.TTF'));
        $font->size(10); // Ukuran font
        $font->color('#000000'); // Warna font
        $font->align('left'); // Posisi teks horizontal
        $font->valign('top'); // Posisi teks vertikal
    });

    $image->text('36.04.11.22.1', 70, 70, function ($font) {
        $font->file(public_path('src/ARIAL.TTF'));
        $font->size(10); // Ukuran font
        $font->color('#000000'); // Warna font
        $font->align('left'); // Posisi teks horizontal
        $font->valign('top'); // Posisi teks vertikal
    });

    // END BARIS 2
    // BARIS 2 Y-80
    // Tambahkan teks ke gambar
    $image->text('Nama', 10, 80, function ($font) {
        $font->file(public_path('src/ARIAL.TTF'));
        $font->size(10); // Ukuran font
        $font->color('#000000'); // Warna font
        $font->align('left'); // Posisi teks horizontal
        $font->valign('top'); // Posisi teks vertikal
    });

    $image->text(':', 65, 80, function ($font) {
        $font->file(public_path('src/ARIAL.TTF'));
        $font->size(10); // Ukuran font
        $font->color('#000000'); // Warna font
        $font->align('left'); // Posisi teks horizontal
        $font->valign('top'); // Posisi teks vertikal
    });

    $image->text('John Redi', 70, 80, function ($font) {
        $font->file(public_path('src/ARIAL.TTF'));
        $font->size(10); // Ukuran font
        $font->color('#000000'); // Warna font
        $font->align('left'); // Posisi teks horizontal
        $font->valign('top'); // Posisi teks vertikal
    });

    // END BARIS 2

    // BARIS 3 Y=90
    // Tambahkan teks ke gambar
    $image->text('NIK', 10, 90, function ($font) {
        $font->file(public_path('src/ARIAL.TTF'));
        $font->size(10); // Ukuran font
        $font->color('#000000'); // Warna font
        $font->align('left'); // Posisi teks horizontal
        $font->valign('top'); // Posisi teks vertikal
    });

    $image->text(
        ':',
        65,
        90,
        function ($font) {
            $font->file(public_path('src/ARIAL.TTF'));
            $font->size(10); // Ukuran font
            $font->color('#000000'); // Warna font
            $font->align('left'); // Posisi teks horizontal
            $font->valign('top'); // Posisi teks vertikal
        }
    );

    $image->text(
        '3604112899110004',
        70,
        90,
        function ($font) {
            $font->file(public_path('src/ARIAL.TTF'));
            $font->size(10); // Ukuran font
            $font->color('#000000'); // Warna font
            $font->align('left'); // Posisi teks horizontal
            $font->valign('top'); // Posisi teks vertikal
        }
    );

    // END BARIS 3
    // BARIS 4 Y=100
    // Tambahkan teks ke gambar
    $image->text('Provinsi', 10, 100, function ($font) {
        $font->file(public_path('src/ARIAL.TTF'));
        $font->size(10); // Ukuran font
        $font->color('#000000'); // Warna font
        $font->align('left'); // Posisi teks horizontal
        $font->valign('top'); // Posisi teks vertikal
    });

    $image->text(
        ':',
        65,
        100,
        function ($font) {
            $font->file(public_path('src/ARIAL.TTF'));
            $font->size(10); // Ukuran font
            $font->color('#000000'); // Warna font
            $font->align('left'); // Posisi teks horizontal
            $font->valign('top'); // Posisi teks vertikal
        }
    );

    $image->text(
        'BANTEN',
        70,
        100,
        function ($font) {
            $font->file(public_path('src/ARIAL.TTF'));
            $font->size(10); // Ukuran font
            $font->color('#000000'); // Warna font
            $font->align('left'); // Posisi teks horizontal
            $font->valign('top'); // Posisi teks vertikal
        }
    );

    // END BARIS 4
    // BARIS 5 Y=110
    // Tambahkan teks ke gambar
    $image->text('Kab/Kota', 10, 110, function ($font) {
        $font->file(public_path('src/ARIAL.TTF'));
        $font->size(10); // Ukuran font
        $font->color('#000000'); // Warna font
        $font->align('left'); // Posisi teks horizontal
        $font->valign('top'); // Posisi teks vertikal
    });

    $image->text(
        ':',
        65,
        110,
        function ($font) {
            $font->file(public_path('src/ARIAL.TTF'));
            $font->size(10); // Ukuran font
            $font->color('#000000'); // Warna font
            $font->align('left'); // Posisi teks horizontal
            $font->valign('top'); // Posisi teks vertikal
        }
    );

    $image->text(
        'KAB. SERANG',
        70,
        110,
        function ($font) {
            $font->file(public_path('src/ARIAL.TTF'));
            $font->size(10); // Ukuran font
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
        $font->size(10); // Ukuran font
        $font->color('#000000'); // Warna font
        $font->align('left'); // Posisi teks horizontal
        $font->valign('top'); // Posisi teks vertikal
    });

    $image->text(
        ':',
        65,
        120,
        function ($font) {
            $font->file(public_path('src/ARIAL.TTF'));
            $font->size(10); // Ukuran font
            $font->color('#000000'); // Warna font
            $font->align('left'); // Posisi teks horizontal
            $font->valign('top'); // Posisi teks vertikal
        }
    );

    $image->text(
        'KRAGILAN',
        70,
        120,
        function ($font) {
            $font->file(public_path('src/ARIAL.TTF'));
            $font->size(10); // Ukuran font
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
        $font->size(10); // Ukuran font
        $font->color('#000000'); // Warna font
        $font->align('left'); // Posisi teks horizontal
        $font->valign('top'); // Posisi teks vertikal
    });

    $image->text(
        ':',
        65,
        130,
        function ($font) {
            $font->file(public_path('src/ARIAL.TTF'));
            $font->size(10); // Ukuran font
            $font->color('#000000'); // Warna font
            $font->align('left'); // Posisi teks horizontal
            $font->valign('top'); // Posisi teks vertikal
        }
    );

    $image->text(
        'SILEBU',
        70,
        130,
        function ($font) {
            $font->file(public_path('src/ARIAL.TTF'));
            $font->size(10); // Ukuran font
            $font->color('#000000'); // Warna font
            $font->align('left'); // Posisi teks horizontal
            $font->valign('top'); // Posisi teks vertikal
        }
    );

    // END BARIS 6


    // save modified image in new format 
    Storage::put('storage/upload/file.jpg', $image->stream());
    // $image->toPng()->save('storage/upload/foot1.png');
});

Route::get('/setting', [SettingController::class, 'index']);
