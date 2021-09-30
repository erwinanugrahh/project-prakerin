@extends('layouts.guest')

@section('content')
    <div class="container">

        <h3 class="mt-4" align="center"><strong>FORMULIR PPDB</strong></h3>
        <div class="card">
            <div class="card-body">
                <form action="{{ url('ppdb') }}" method="post" class="form-horizontal mt-4 mb-5">
                    @method('put')
                    @csrf
                    <div class="form-group row">
                        <label class="control-label col-sm-2" for="input-1"><b>Nama</b></label>
                        <div class="col-sm-10">
                            <input name="name" type="text" class="form-control" id="input-1" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-sm-2" for="input-2"><b>NISN</b></label>
                        <div class="col-sm-10">
                            <input name="nisn" type="text" class="form-control" id="input-2" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-sm-2" for="input-3"><b>Tempat Lahir</b></label>
                        <div class="col-sm-10">
                            <input name="place" type="search" class="form-control" id="input-3" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-sm-2" for="input-4"><b>Tanggal Lahir</b></label>
                        <div class="col-sm-10">
                            <input name="dob" type="date" class="form-control" id="input-5" placeholder="11/11/2019" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleFormControlSelect1" class="control-label col-sm-2"><b>Jenis Kelamin</b></label>
                        <div class="col-sm-10">
                            <select name="gender" class="form-control" id="exampleFormControlSelect1">
                                <option>- Pilih - </option>
                                <option>Laki-laki</option>
                                <option>Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-sm-2" for="input-6"><b>Anak Ke</b></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <input name="child" type="text" maxlength="5" class="form-control" id="input-6" />
                                <label class="control-label pt-2 px-3"><b>Dari</b></label>
                                <input name="child_from" type="text" maxlength="5" class="form-control" id="input-6" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-sm-2" for="input-7"><b>Alamat</b></label>
                        <div class="col-sm-10">
                            <textarea name="address" class="form-control" id="input-7"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleFormControlSelect1" class="control-label col-sm-2"><b>Pilih Jurusan</b></label>
                        <div class="col-sm-10">
                            <select name="major" class="form-control" id="exampleFormControlSelect1">
                                <option></option>
                                <option>RPL</option>
                                <option>TKJ</option>
                                <option>MM</option>
                                <option>DPIB</option>
                                <option>TEKLIN</option>
                                <option>TBSM</option>
                                <option>TKRO</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-sm-2" for="input-8"><b>No HP</b></label>
                        <div class="col-sm-10">
                            <input name="phone" type="text" class="form-control" id="input-8" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-sm-2" for="input-9"><b>Kode Pos</b></label>
                        <div class="col-sm-10">
                            <input name="zip" type="text" class="form-control" id="input-9" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-sm-2" for="input-10"><b>Nama OrangTua/Wali</b></label>
                        <div class="col-sm-10">
                            <input name="parents_name" type="text" class="form-control" id="input-10" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-sm-2" for="input-11"><b>Pekerjaan OrangTua/Wali</b></label>
                        <div class="col-sm-10">
                            <input name="parents_job" type="text" class="form-control" id="input-11" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-sm-2" for="input-7"><b>Alamat Orang Tua/Wali</b></label>
                        <div class="col-sm-10">
                            <textarea name="parents_address" class="form-control" id="input-7"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-sm-2" for="input-13"><b>No HP</b></label>
                        <div class="col-sm-10">
                            <input name="parents_phone" type="text" class="form-control" id="input-13" />
                        </div>
                    </div>
        
                    <button class="btn btn-primary btn-block p-2 mb-1" name="" type="submit"><b>Daftar</b></button>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('js')
<script>
    $('.halaman-scroll').on('click', function(){
        var tujuan = $(this).attr('href');
        window.location.href = '/'+tujuan
    })
</script>
@endpush
@push('js')
<script>
    $('.halaman-scroll').on('click', function(){
        var tujuan = $(this).attr('href');
        window.location.href = '/'+tujuan
    })
</script>
@endpush
