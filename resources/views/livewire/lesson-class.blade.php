<div>
    <button class="btn btn-success mb-3" wire:click.prevent='addClass'>Tambahkan Kelas</button>
    @foreach ($classess as $i => $class)
    <div class="form-group form-row">
        <div class="col-6">
            <label for="">Kelas</label>
            <select name="major_id[]" class="custom-select" wire:model='classess.{{ $i }}.major_id'>
                <option value=""></option>
                @foreach ($majors as $major)
                    <option value="{{ $major->id }}">{{ $major->getMajor() }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-3">
            <label for="">Dari jam</label>
            <input type="time" name="start_at[]" class="form-control start_at" onfocus="this.classList.remove('invalid')">
        </div>
        <div class="col-3">
            <label for="">Sampai Jam</label>
            <input type="time" name="end_at[]" class="form-control end_at" onfocus="this.classList.remove('invalid')">
        </div>
    </div>
    @endforeach
</div>
