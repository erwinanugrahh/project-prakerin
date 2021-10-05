<div class="card-body p-3 text-justify accordion-body">
    <button class="btn btn-sm btn-info mb-3" wire:click='addSocialMedia'>Tambah Sosial Media</button>
    <form wire:submit.prevent='store'>
        @foreach ($social_media['items'] as $i => $item)
            <div class="form-group">
                <label for="">Sosial Media {{ $loop->iteration }}</label>
                <div class="input-group">
                    <input type="text" name="social_media['items'][{{ $i }}]['name']" wire:model.defer='social_media.items.{{ $i }}.name' placeholder="Nama Social Media" class="form-control @error("social_media.items.".$i.".name") is-invalid @enderror" style="max-width: 200px">
                    <input type="text" name="social_media['items'][{{ $i }}]['icon']" wire:model.lazy='social_media.items.{{ $i }}.icon' placeholder="Icon Social Media" class="form-control @error("social_media.items.".$i.".icon") is-invalid @enderror" style="max-width: 150px">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <i class="{{ $item['icon'] }}"></i>
                        </div>
                    </div>
                    <input type="text" name="social_media['items'][{{ $i }}]['url']" wire:model.defer='social_media.items.{{ $i }}.url' placeholder="Url Social Media" class="form-control @error("social_media.items.".$i.".url") is-invalid @enderror">
                    <div class="input-group-append">
                        <button class="btn btn-danger" wire:click.prevent='removeSocialMedia({{ $i }})'><i class="fas fa-trash"></i></button>
                    </div>
                </div>
            </div>
        @endforeach
        <button class="btn btn-success">Simpan</button>
    </form>
</div>
