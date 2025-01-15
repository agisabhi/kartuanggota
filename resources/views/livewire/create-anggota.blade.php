<div>
    <div class="content">
          <!-- Labels on top -->
          <div class="block block-rounded">
            <div class="block-header block-header-default">
              <h3 class="block-title">Tambah Data Anggota</h3>
            </div>
            <div class="col-lg-12">
                
            </div>
            <div class="block-content block-content-full">
              <div class="row">
                
                <div class="col-lg-12 space-y-5">
                  <!-- Form Labels on top - Default Style -->
                  <form method="post" wire:submit.prevent="store">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label" for="example-ltf-email">Nama Lengkap</label>
                            <input type="text" class="form-control" wire:model.live="nama" placeholder="Masukkan Nama Lengkap">
                            @error('nama') <span class="error" style="color: red"><small>{{ $message }}</small></span> @enderror
                            
                        </div>
                        
                        </div>
                        <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label" for="example-ltf-password">NIK (Sesuai KTP)</label>
                            <input type="text" class="form-control" placeholder="Masukkn 16 Digit NIK" wire:model.live="nik">
                            @error('nik') <span class="error" style="color: red"><small>{{ $message }}</small></span> @enderror
                        </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3" wire:ignore.self>
                              <label class="form-label" for="example-ltf-email">Provinsi</label>
                                <select class="form-control prov" id="selectedProvince" wire:model.live="selectedProvince" style="width: 100%;" data-placeholder="Pilin Provinsi...">
                                    <option>Pilih Provinsi..</option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                    @foreach ($province as $prov)
                                        <option value="{{ $prov->id }}">{{ $prov->name }}</option>
                                    @endforeach
                                  </select>
                                  @error('selectedProvince') <span class="error" style="color: red"><small>{{ $message }}</small></span> @enderror
                                </div>
                                
                        </div>
                        @if (!empty($cities))
                            <div class="col-lg-6">
                            <div class="mb-3" wire:ignore.self>
                              <label class="form-label" for="example-ltf-email">Kab/Kota</label>
                                <select class="form-control kota" wire:model.live="selectedCity" id="selectedCity" name="example-select2" style="width: 100%;" data-placeholder="Pilin Kab/Kota..." >
                                    <option value="">Pilih Kab/Kota...</option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                    @foreach ($cities as $kk)
                                        <option value="{{ $kk->id }}">{{ $kk->name }}</option>
                                    @endforeach
                                  </select>
                                  @error('selectedCity') <span class="error" style="color: red"><small>{{ $message }}</small></span> @enderror
                                </div>
                        </div>
                        @endif
                        @if (!empty($districts))
                            <div class="col-lg-6">
                            <div class="mb-3" wire:ignore.self>
                              <label class="form-label" for="example-ltf-email">Kecamatan</label>
                                <select class="form-control select2" wire:model.live="selectedDistrict" id="selectedDistrict" name="example-select2" style="width: 100%;" data-placeholder="Pilin Kab/Kota..." >
                                    <option value="">Pilih Kab/Kota...</option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                    @foreach ($districts as $kk)
                                        <option value="{{ $kk->id }}">{{ $kk->name }}</option>
                                    @endforeach
                                  </select>
                                  @error('selectedDistrict') <span class="error" style="color: red"><small>{{ $message }}</small></span> @enderror
                                </div>
                        </div>
                        @endif
                        @if (!empty($villages))
                            <div class="col-lg-6">
                            <div class="mb-3" wire:ignore.self>
                              <label class="form-label" for="example-ltf-email">Kelurahan/Desa</label>
                                <select class="form-control select2" wire:model.live="selectedVillage" id="selectedVillage" name="example-select2" style="width: 100%;" data-placeholder="Pilin Kab/Kota..." >
                                    <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                    @foreach ($villages as $kk)
                                        <option value="{{ $kk->id }}">{{ $kk->name }}</option>
                                    @endforeach
                                  </select>
                                  @error('selectedVillage') <span class="error" style="color: red"><small>{{ $message }}</small></span> @enderror
                                </div>
                        </div>
                        @endif
                    </div>
                    
                    <div class="mb-4">
                      <button type="submit" name="submit" class="btn btn-primary col-lg-12">{{ $anggotaId ? 'Update' : 'Save' }}</button>
                    </div>
                  </form>
                  <!-- END Form Labels on top - Default Style -->

                </div>
              </div>
            </div>
          </div>
          <!-- END Labels on top -->

          <div class="block block-rounded">
            <div class="block-header block-header-default">
              <h3 class="block-title">Data Anggota</h3>
              <div class="block-options">
                <button type="button" class="btn-block-option">
                  <i class="si si-settings"></i>
                </button>
              </div>
            </div>
            <div class="block-content">
              <p class="fs-sm text-muted">
                
              </p>
              <div class="table-responsive">
                <table class="table table-bordered table-striped table-vcenter">
                  <thead>
                    <tr>
                      <th class="text-center" style="width: 100px;">
                        No KTA
                      </th>
                      <th>Nama</th>
                      {{-- <th>NIK</th> --}}
                      <th>Provinsi</th>
                      <th>Kab/Kota</th>
                      {{-- <th>Kecamatan</th>
                      <th>Kelurahan</th> --}}
                      {{-- <th>Alamat</th> --}}
                      <th class="text-center" style="width: 100px;">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($dataAnggotas as $dataAnggota)
                        <tr>
                            <td>{{ $dataAnggota->nomor_kta }}</td>
                            <td>{{ $dataAnggota->nama }}</td>
                            {{-- <td>{{ $dataAnggota->nik }}</td> --}}
                            <td>{{ $dataAnggota->province->name }}</td>
                            <td>{{ $dataAnggota->city->name }}</td>
                            {{-- <td>{{ $dataAnggota->district->name }}</td>
                            <td>{{ $dataAnggota->village->name }}</td> --}}
                            {{-- <td>{{ $dataAnggota->alamat }}</td> --}}
                            <td class="text-center">
                        <div class="btn-group">
                          <a class="btn btn-sm btn-primary" data-bs-toggle="tooltip" href="/generateCard/{{ $dataAnggota->id }}">
                            <i class="si si-printer"> Cetak</i>
                          </a>
                          <button wire:click="edit({{ $dataAnggota->id }})" class="btn btn-sm btn-warning"><i class="si si-printer"> Edit</i></button>
                          <button type="button" class="btn btn-sm btn-danger" wire:click="delete({{ $dataAnggota->id }})" wire:confirm="Are you sure you want to delete this post?"><i class="si si-trash"> Delete</i> </button>
                            
                        </div>
                      </td>
                        </tr>
                    @endforeach
                    
                    
                  </tbody>
                </table>
                {{ $dataAnggotas->links() }}
              </div>
            </div>
          </div>
          
                  
    </div>
    @assets
    <script  src="https://code.jquery.com/jquery-3.7.1.js"  integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    @endassets
    @script
      <script>
        document.addEventListener('livewire:load', function(){
            $('.prov').select2();
            $('.prov').on('change', function (e) {
                Livewire.emit('updatedSelectedProvince',e.target.id, $(this).val());
            });
            
            $('.kota').select2({
              dropdownParent: $('.prov'),
            });
            $('.kota').on('change', function (e) {
                Livewire.emit('updatedSelectedCity',e.target.id, $(this).val());
            });
            
            $('.kecamatan').select2({
              dropdownParent: $('.kota'),
            });
            $('.kecamatan').on('change', function (e) {
                Livewire.emit('updatedSelectedDistrict',e.target.id, $(this).val());
            });
            
            $('.village').select2({
              dropdownParent: $('.kecamatan'),
            });
            
        });
    </script>
    @endscript
</div>
