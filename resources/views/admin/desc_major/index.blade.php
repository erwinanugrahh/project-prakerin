@extends('layouts.admin')

@section('title') Halaman Program Keahlian @endsection
@section('page') Program Keahlian @endsection
@section('action') Indeks @endsection

@section('content')
<div class="accordion mt-3" id="accordionExample">
    <div class="card shadow">
        <div class="card-header accordion-header p-1" id="headingOne">
            <h5 class="mb-0 panel-title">
                <button class="btn btn-link accordion-btn" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                Program Keahlian
                </button>
            </h5>
        </div>

        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
            <div class="card-body p-3 text-justify accordion-body">
                <div class="d-flex justify-content-center mb-3">
                    <img id="preview-image-before-upload" src="https://iplbi.or.id/wp-content/plugins/pl-platform/engine/ui/images/default-landscape.png"
                    alt="preview image" style="max-height: 150px;">
                </div>
                <form action="" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="key" value="">
                    <div class="form-group form-row">
                        <div class="col-md-6 col-12 mb-2">
                            <label for="">Nama Keahlian</label>
                            <input type="text" class="form-control" name="website_name" value="">
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-row">
                                <div class="col-5 col-md-6">
                                    <label for="">Logo Keahlian <span class="text-danger">*</span></label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="logo" id="image">
                                        <label class="custom-file-label" for="image">Choose file...</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Deskripsi</label>
                        <textarea name="description" onkeyup="countChar(this)" id="" rows="5" class="form-control"></textarea>
                    </div>
                    <button class="btn btn-success">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
