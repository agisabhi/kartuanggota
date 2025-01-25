<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use App\Models\Setting as ModelSetting;
use Illuminate\Support\Facades\Storage;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Setting extends Component
{
    use WithFileUploads, LivewireAlert;

    #[Validate('image|max:2048|nullable')] // 1MB Max
    public $background_card;

    #[Validate('image|max:2048|nullable')] // 1MB Max
    public $ttd_ketua;

    #[Validate('image|max:2048|nullable')] // 1MB Max
    public $ttd_sekjen;

    public $ketua_umum;
    public $sekjen;

    public function render()
    {
        $data = [
            'settings' => ModelSetting::first()
        ];
        return view('livewire.setting', $data);
    }

    public function store()
    {
        //Ambil data sebelumnya
        $data_awal = ModelSetting::first();
        $validated = $this->validate();
        if ($this->background_card) {
            // Hapus foto lama jika ada
            if ($data_awal->background_card && Storage::exists($data_awal->background_card)) {
                Storage::delete($data_awal->background_card);
            }
            //simpan file ke public
            $file_path = $this->background_card->store('upload', 'public');
            $validated['background_card'] = $file_path;
        } else {
            $validated['background_card'] = $data_awal->background_card;
        }

        if ($this->ketua_umum) {
            $validated['ketua_umum'] = $this->ketua_umum;
        } else {
            $validated['ketua_umum'] = $data_awal->ketua_umum;
        }

        if ($this->sekjen) {
            $validated['sekjen'] = $this->sekjen;
        } else {
            $validated['sekjen'] = $data_awal->sekjen;
        }

        if ($this->ttd_ketua) {
            // Hapus foto lama jika ada
            if ($data_awal->ttd_ketua && Storage::exists($data_awal->ttd_ketua)) {
                Storage::delete($data_awal->ttd_ketua);
            }
            //simpan file ke public
            $file_path = $this->ttd_ketua->store('upload', 'public');
            $validated['ttd_ketua'] = $file_path;
        } else {
            $validated['ttd_ketua'] = $data_awal->ttd_ketua;
        }

        if ($this->ttd_sekjen) {
            // Hapus foto lama jika ada
            if ($data_awal->ttd_sekjen && Storage::exists($data_awal->ttd_sekjen)) {
                Storage::delete($data_awal->ttd_sekjen);
            }
            //simpan file ke public
            $file_path = $this->ttd_sekjen->store('upload', 'public');
            $validated['ttd_sekjen'] = $file_path;
        } else {
            $validated['ttd_sekjen'] = $data_awal->ttd_sekjen;
        }

        ModelSetting::where('id', '1')
            ->update($validated);
        $this->reset();
        $this->alert('success', 'Berhasil Tambah Data');
    }
}
