<div class="card shadow">
    <div class="card-header accordion-header p-1" id="headingOne">
        <h5 class="mb-0 panel-title">
            <button class="btn btn-link accordion-btn" type="button" data-toggle="collapse" data-target="#setting_web" aria-expanded="true" aria-controls="setting_web">
            Pengaturan Website
            </button>
        </h5>
    </div>

    <div id="setting_web" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
        <div class="card-body p-3 text-justify accordion-body">
            <div class="d-flex justify-content-center mb-3">
                @if (file_exists(public_path('logo.png')))
                    <img id="preview-image-before-upload" src="{{ url('logo.png') }}" alt="" style="max-height: 150px">
                @else
                    <img id="preview-image-before-upload" src="{{ asset('user/images/icon-image/banner-idean.png') }}"
                    alt="preview image" style="max-height: 150px;">
                @endif
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
