@extends('layouts.admin', ['noCard'=>true])

@section('title') Halaman Darhboard @endsection
@section('page') Dashboard @endsection
@section('action') Admin @endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('admin/css/switchery.min.css') }}">
@endpush

@section('content')
<div class="accordion mt-3" id="accordionExample">
    <div class="card shadow">
        <div class="card-header accordion-header p-1" id="headingOne">
            <h5 class="mb-0 panel-title">
                <button class="btn btn-link accordion-btn" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                Pengaturan Website
                </button>
            </h5>
        </div>

        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
            <div class="card-body p-3 text-justify accordion-body">
                <div class="d-flex justify-content-center mb-3">
                    <img id="preview-image-before-upload" src="https://iplbi.or.id/wp-content/plugins/pl-platform/engine/ui/images/default-landscape.png"
                    alt="preview image" style="max-height: 150px;">
                </div>
                <form action="{{ route('setting.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="key" value="{{ $setting_web['key'] }}">
                    <div class="form-group form-row">
                        <div class="col-md-6 col-12 mb-2">
                            <label for="">Nama Website</label>
                            <input type="text" class="form-control" name="website_name" value="{{ $setting_web['website_name'] }}">
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-row">
                                <div class="col-5 col-md-6">
                                    <label for="">Logo Website <span class="text-danger">*</span></label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="logo" id="image">
                                        <label class="custom-file-label" for="image">Choose file...</label>
                                    </div>
                                </div>
                                <div class="col-7 col-md-6">
                                    <label for="">Untuk Website Tingkatan</label>
                                    <select name="website_for" id="" class="custom-select">
                                        <option value=""></option>
                                        <option value="smp" {{ ($setting_web['website_for']??'')=='smp'?'selected':'' }}>SMP/MTS Sederajat</option>
                                        <option value="smk" {{ ($setting_web['website_for']??'')=='smk'?'selected':'' }}>SMA/SMK/MA Sederajat</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group form-row">
                        <div class="col-12 col-md-6">
                            <label for="">Telepon</label>
                            <input type="text" name="phone" value="{{ $setting_web['phone'] }}" class="form-control">
                        </div>
                        <div class="col-12 col-md-6">
                            <label for="">Email</label>
                            <input type="text" name="email" value="{{ $setting_web['email'] }}" class="form-control">
                        </div>
                    </div>
                    <div class="form-group form-row">
                        <div class="col-12 col-md-6">
                            <label for="">Kode Pos</label>
                            <input type="text" name="zip" value="{{ $setting_web['zip'] }}" class="form-control">
                        </div>
                        <div class="col-12 col-md-6">
                            <label for="">Alamat</label>
                            <input type="text" name="address" value="{{ $setting_web['address'] }}" class="form-control">
                        </div>
                    </div>
                    <button class="btn btn-success">Simpan</button>
                </form>
            </div>
        </div>
    </div>

    <div class="card shadow">
        <div class="card-header accordion-header p-1" id="headingTwo">
            <h5 class="mb-0 panel-title">
                <button class="btn btn-link accordion-btn collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                About Us
                </button>
            </h5>
        </div>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
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
                        <textarea name="visi" id="" rows="7" class="form-control">{{ $about_us['visi'] }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Misi</label>
                        <textarea name="misi" id="" rows="7" class="form-control">{{ $about_us['misi'] }}</textarea>
                    </div>
                    @livewire('about-us-skills', ['skills'=>$about_us['skills']])
                    <button class="btn btn-success">Simpan</button>
                </form>
            </div>
        </div>
    </div>

    <div class="card shadow">
        <div class="card-header accordion-header p-1" id="headingThree">
            <h5 class="mb-0 panel-title">
                <button class="btn btn-link accordion-btn collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                Penerimaan Peserta Didik Baru (PPDB)
                </button>
            </h5>
        </div>
        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
            <div class="card-body p-3 text-justify accordion-body">
                <div class="form-group form-row">
                    <div class="col-4">
                        <div class="col-12">
                            <input type="checkbox" id="kenaikan-kelas" {{ setting('setting_ppdb')['kenaikan_kelas']=="true"?'checked':'' }}/>
                            <label class="">Kenaikan Kelas</label>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="col-12">
                            <input type="checkbox" id="open-pengumuman" {{ setting('setting_ppdb')['open_pengumuman']=="true"?'checked':'' }} />
                            <label for="open-pengumuman" class="">Open Pengumuman PPDB</label>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="col-12">
                            <input type="checkbox" id="open-ppdb" {{ setting('setting_ppdb')['open_ppdb']=="true"?'checked':'' }}/>
                            <label class="">Open PPDB</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
    <script src="{{ asset('admin/js/switchery.min.js') }}"></script>
    <script>
        $('#image').change(function(){

            let reader = new FileReader();

            reader.onload = (e) => {

              $('#preview-image-before-upload').attr('src', e.target.result);
            }

            reader.readAsDataURL(this.files[0]);

        });
        function countChar(val) {
            var len = val.value.length;
            if (len >= 300) {
                val.value = val.value.substring(0, 300);
            } else {
                $('#max-length-element').text(300 - len);
            }
        };

        var elem = document.querySelector('#open-ppdb');
        var switchery = new Switchery(elem);
        new Switchery(document.querySelector('#open-pengumuman'))
        new Switchery(document.querySelector('#kenaikan-kelas'))

        function set_switchery(){
            if($('#open-pengumuman').is(':checked'))
                switchery.enable();
            else{
                if ($(elem).is(':checked')){
                    $(elem).parent().find('.switchery').trigger('click');
                }
                switchery.disable();
            }
        }
        set_switchery()
        $('.switchery').prev().on('change', function(){
            if(this.id == 'open-pengumuman'){
                set_switchery();
            }
            let kenaikan_kelas = $('#kenaikan-kelas').is(':checked')
            let open_pengumuman = $('#open-pengumuman').is(':checked')
            let open_ppdb = $('#open-ppdb').is(':checked')
            $.ajax({
                url: '/api/set-ppdb',
                method: 'post',
                data: {
                    key: 'setting_ppdb',
                    open_pengumuman, open_ppdb, kenaikan_kelas
                },
                success: function(result){
                    console.log(result);
                }
            })
        })
    </script>
@endpush
