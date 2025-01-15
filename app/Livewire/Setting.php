<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Setting as ModelSetting;
use Livewire\Attributes\Validate;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Setting extends Component
{
    use WithFileUploads, LivewireAlert;

    #[Validate('required')] // 1MB Max
    public $ketua_umum;

    #[Validate('required')] // 1MB Max
    public $sekjen;

    #[Validate('image|max:2048')] // 1MB Max
    public $background_card;

    public function render()
    {
        $data = [
            'settings' => ModelSetting::first()
        ];
        return view('livewire.setting', $data);
    }

    public function store()
    {
        $validated = $this->validate();
        $file_path = $this->background_card->store('upload', 'public');
        $validated['background_card'] = $file_path;

        ModelSetting::where('id', '1')
            ->update($validated);
        $this->reset();
        $this->alert('success', 'Berhasil Tambah Data');
    }
}
