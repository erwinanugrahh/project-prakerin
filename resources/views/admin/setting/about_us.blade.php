<div class="card shadow">
    <div class="card-header accordion-header p-1" id="headingTwo">
        <h5 class="mb-0 panel-title">
            <button class="btn btn-link accordion-btn collapsed" type="button" data-toggle="collapse" data-target="#about_us" aria-expanded="false" aria-controls="about_us">
            About Us
            </button>
        </h5>
    </div>
    <div id="about_us" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
        <div class="card-body p-3 text-justify accordion-body">
            <form action="{{ route('setting.store') }}" method="post">
                @csrf
                <input type="hidden" name="key" value="{{ $about_us['key'] }}">
                <div class="form-group">
                    <label for="">Judul Tentang</label>
                    <input type="text" class="form-control" name="about_us" value="{{ $about_us['about_us'] }}">
                </div>
                <div class="form-group">
                    <label for="">Deskripsi</label>
                    (<span id="max-length-element">300</span> huruf tersisa)
                    <textarea name="description" onkeyup="countChar(this)" id="" rows="5" class="form-control">{{ $about_us['description'] }}</textarea>
                </div>
                <div class="form-group">
                    <label for="">Visi</label>
                    <textarea name="visi" id="" rows="7" class="editor">{{ $about_us['visi'] }}</textarea>
                </div>
                <div class="form-group">
                    <label for="">Misi</label>
                    <textarea name="misi" id="" rows="7" class="editor">{{ $about_us['misi'] }}</textarea>
                </div>
                @livewire('about-us-skills', ['skills'=>$about_us['skills']])
                <button class="btn btn-success">Simpan</button>
            </form>
        </div>
    </div>
</div>
