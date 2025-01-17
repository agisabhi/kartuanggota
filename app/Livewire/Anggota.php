<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\IndonesiaProvinces;
use App\Models\Anggota as ModelAnggota;
use App\Models\IndonesiaCities;
use App\Models\IndonesiaDistricts;
use App\Models\IndonesiaVillages;
use Livewire\Features\SupportPagination\WithoutUrlPagination;
use Livewire\Attribute\Computed;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Computed as AttributesComputed;
use Livewire\Attributes\Reactive;

class Anggota extends Component
{

    use WithPagination, WithoutUrlPagination, LivewireAlert;

    protected $paginationTheme = 'bootstrap';
    protected $listener = ['updatedSelectedProvince', 'updatedSelectedCity', 'updatedSelectedDistrict', 'updatedSelectedVillage'];

    public $anggotaId;
    public $search = '';
    public $nomor_kta;
    public $nama;
    public $nik;
    public $countries;
    public $cities = [];
    public $districts = [];
    public $villages = [];

    public $selectedProvince = null;
    public $selectedCity = null;
    public $selectedDistrict = null;
    public $selectedVillage = null;


    protected $rules = [
        'nama' => 'required',
        'nik' => 'required|min:16',
        'selectedProvince' => 'required',
        'selectedCity' => 'required',
        'selectedDistrict' => 'required',
        'selectedVillage' => 'required',
    ];

    public function updatingSearch()
    {
        $this->resetPage(); // Reset halaman ke 1 jika pencarian diubah
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function mount()
    {
        $this->countries = IndonesiaProvinces::orderBy('name', 'ASC')->get();
    }

    public function updatedSelectedProvince($provinceId)
    {
        $prov_code = IndonesiaProvinces::where('id', $provinceId)->first();
        $this->cities = IndonesiaCities::where('province_code', $prov_code->code)->orderBy('name', 'ASC')->get();
        $this->selectedCity = null;
        $this->districts = [];
        $this->villages = [];
    }

    public function updatedSelectedCity($cityId)
    {
        $city_code = IndonesiaCities::where('id', $cityId)->first();
        $this->districts = IndonesiaDistricts::where('city_code', $city_code->code)->orderBy('name', 'ASC')->get();
        $this->selectedDistrict = null;
        $this->villages = [];
    }

    public function updatedSelectedDistrict($districtId)
    {
        $district_code = IndonesiaDistricts::where('id', $districtId)->first();
        $this->villages = IndonesiaVillages::where('district_code', $district_code->code)->orderBy('name', 'ASC')->get();
        $this->selectedVillage = null;
    }

    public function render()
    {
        $data = [
            'dataAnggotas' => ModelAnggota::when($this->search, function ($query) {
                $query->where('nomor_kta', 'like', '%' . $this->search . '%')
                    ->orWhere('nama', 'like', '%' . $this->search . '%')
                    ->orWhere('selectedProvince', 'like', '%' . $this->search . '%')
                    ->orWhere('selectedCity', 'like', '%' . $this->search . '%');
            })->paginate(10),
            'province' => IndonesiaProvinces::orderBy('name', 'ASC')->get(),
        ];
        return view('livewire.create-anggota', $data);
    }

    public function edit($id)
    {
        $anggota = ModelAnggota::findOrFail($id);

        $this->anggotaId = $anggota->id;
        $this->nama = $anggota->nama;
        $this->nik = $anggota->nik;
        $this->selectedProvince = $anggota->selectedProvince;
        $this->selectedCity = $anggota->selectedCity;
        $this->selectedDistrict = $anggota->selectedDistrict;
        $this->selectedVillage = $anggota->selectedVillage;
    }

    public function store()
    {
        $validated = $this->validate();

        if ($this->anggotaId) {
            $tahun = date('Y');
            $bulan = date('m');

            //Validasi no urut KTA
            $anggota_akhir = ModelAnggota::where('id', $this->anggotaId)->first();
            $no_urut_now = substr($anggota_akhir->nomor_kta, 15);

            //Generate nomor kta
            $kode_kecamatan = IndonesiaDistricts::where('id', $validated['selectedDistrict'])->first();
            $validated['nomor_kta'] = substr($kode_kecamatan->code, 0, 2) . '.' . substr($kode_kecamatan->code, 2, 2) . '.' . substr($kode_kecamatan->code, 4, 2) . '.' . substr($tahun, 2, 2) . '.' . $bulan . '.' . $no_urut_now;

            // return dd($validated);
            $dataAnggota = ModelAnggota::findOrFail($this->anggotaId);

            $dataAnggota->update($validated);
            $this->alert('success', 'Berhasil Update Data');
        } else {
            $tahun = date('Y');
            $bulan = date('m');

            //Validasi no urut KTA
            $anggota_akhir = ModelAnggota::latest()->first();
            if ($anggota_akhir) {

                $no_urut_now = substr($anggota_akhir->nomor_kta, 15) + 1;
            } else {
                $no_urut_now = 1;
            }

            //Generate nomor kta
            $kode_kecamatan = IndonesiaDistricts::where('id', $validated['selectedDistrict'])->first();
            $validated['nomor_kta'] = substr($kode_kecamatan->code, 0, 2) . '.' . substr($kode_kecamatan->code, 2, 2) . '.' . substr($kode_kecamatan->code, 4, 2) . '.' . substr($tahun, 2, 2) . '.' . $bulan . '.' . $no_urut_now;

            // return dd($validated);
            ModelAnggota::create($validated);
            $this->alert('success', 'Berhasil Tambah Data');
        }

        $this->reset();
    }

    public function delete($id)
    {
        ModelAnggota::findOrFail($id)->delete();
        $this->render();
        session()->flash('message', 'Data berhasil dihapus!');
    }
}
