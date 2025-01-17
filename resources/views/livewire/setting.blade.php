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
                            <img src="{{ Storage::url($settings->background_card) }}" width="100%" height="100%">
                        </div>
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
