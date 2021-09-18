<div>
    <button class="btn btn-sm btn-primary mb-2" wire:click.prevent='addSkill'>Tambah Skill</button>
    @foreach ($skills as $i => $skill)
        <div class="form-group form-row">
            <div class="col-5">
                <label for="">Skill {{ $loop->iteration }}</label>
                <input type="text" class="form-control" placeholder="Fontawesome Icon.." name="skills[{{ $i }}][icon]" wire:model='skills.{{ $i }}.icon'>
            </div>
            <div class="col-7">
                <label for="">Title</label>
                <div class="input-group">
                    <input type="text" class="form-control" name="skills[{{ $i }}][title]" wire:model='skills.{{ $i }}.title'>
                    <div class="input-group-append">
                        <button class="btn btn-sm btn-danger" wire:click.prevent='deleteSkill({{ $i }})'><i class="fas fa-trash"></i></button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
