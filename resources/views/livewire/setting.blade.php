<div>
    <div class="content">
          <!-- Labels on top -->
          <div class="block block-rounded">
            <div class="block-header block-header-default">
              <h3 class="block-title">Update Setting</h3>
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
                        <div class="col-lg-12">
                            <div class="mb-3">
                            <label class="form-label" for="example-ltf-email">Desain ID Card</label>
                            <input type="file" class="form-control" wire:model.live="background_card" placeholder="Masukkan Nama Lengkap">
                            @error('background_card') <span class="error" style="color: red"><small>{{ $message }}</small></span> @enderror
                            <img src="{{ Storage::url($settings->background_card) }}" width="30%" height="30%">
                        </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                      <div class="col-lg-6">
                            <div class="mb-3">
                            <label class="form-label" for="example-ltf-email">Nama Ketua Umum</label>
                            <input type="text" class="form-control" wire:model.live="ketua_umum" placeholder="Masukkan Nama Lengkap">
                            @error('ketua_umum') <span class="error" style="color: red"><small>{{ $message }}</small></span> @enderror
                            <h4> Ketua Umum: {{ $settings->ketua_umum }}</h4>
                            </div>
                        </div>
                      <div class="col-lg-6">
                            <div class="mb-3">
                            <label class="form-label" for="example-ltf-email">Nama Sekjen</label>
                            <input type="text" class="form-control" wire:model.live="sekjen" placeholder="Masukkan Nama Lengkap">
                            @error('sekjen') <span class="error" style="color: red"><small>{{ $message }}</small></span> @enderror
                            <h4>Sekjen: {{ $settings->sekjen }}</h4>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                      <div class="col-lg-6">
                        <label class="form-label">TTD Ketua Umum</label>
                        <input type="file" wire:model.live="ttd_ketua" class="form-control">
                        @error('ttd_ketua') <span class="error" style="color: red"><small>{{ $message }}</small></span> @enderror
                        <img src="{{ Storage::url($settings->ttd_ketua) }}" width="30%" height="30%" class="mt-3">
                      </div>
                      <div class="col-lg-6">
                        <label class="form-label">TTD Sekjen</label>
                        <input type="file" wire:model.live="ttd_sekjen" class="form-control">
                        @error('ttd_sekjen') <span class="error" style="color: red"><small>{{ $message }}</small></span> @enderror
                        <img src="{{ Storage::url($settings->ttd_sekjen) }}" width="30%" height="30%" class="mt-3">
                      </div>
                    </div>
                    
                    <div class="mb-4">
                      <button type="submit" name="submit" class="btn btn-primary col-lg-12">Update</button>
                    </div>
                  </form>
                  <!-- END Form Labels on top - Default Style -->

                </div>
              </div>
            </div>
          </div>
          <!-- END Labels on top -->

    </div>
</div>
