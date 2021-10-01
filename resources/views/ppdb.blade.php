@extends('layouts.guest')

@section('content')

    <div class="container">
        @can('open-ppdb')
        <h3 class="mt-4 text-center"><strong>PENGUMUMAN PPDB</strong></h3>
        <div class="card p-4 text-center">
            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Iure suscipit perferendis amet alias, illum quidem omnis fugiat voluptatum error sunt quia eligendi hic exercitationem quo itaque assumenda excepturi tempore aliquid.
            <div class="input-group w-25 pt-3 mx-auto">
                <input type="text" class="form-control" placeholder="Cari NISN anda" aria-label="" aria-describedby="button-addon2">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="button" id="search-nisn">Cari</button>
                </div>
            </div>
        </div>
        @endcan

        @can('open-ppdb')
        <h3 class="mt-4 text-center"><strong>FORM PPDB</strong></h3>
        <div class="card mb-5">
            <div class="card-body pb-0">
                <form action="{{ url('ppdb') }}" method="post" class="form-horizontal mt-4 mb-5">
                    @csrf
                    <div class="form-group form-row">
                        <label class="control-label col-sm-2" for="input-1"><b>Nama</b></label>
                        <div class="col-sm-10">
                            <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="input-1" />
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group form-row">
                        <label class="control-label col-sm-2" for="input-2"><b>NISN</b></label>
                        <div class="col-sm-10">
                            <input name="nisn" type="number" class="form-control @error('nisn') is-invalid @enderror" id="input-2" />
                            @error('nisn')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group form-row">
                        <label class="control-label col-sm-2" for="input-2"><b>Email</b></label>
                        <div class="col-sm-10">
                            <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" id="input-2" />
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group form-row">
                        <label class="control-label col-sm-2" for="input-3"><b>Tempat Lahir</b></label>
                        <div class="col-sm-10">
                            <input name="place" type="search" class="form-control @error('place') is-invalid @enderror" id="input-3" />
                            @error('place')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group form-row">
                        <label class="control-label col-sm-2" for="input-4"><b>Tanggal Lahir</b></label>
                        <div class="col-sm-10">
                            <input name="dob" type="date" class="form-control @error('dob') is-invalid @enderror" id="input-5" placeholder="11/11/2019" />
                            @error('is-invalid')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group form-row">
                        <label for="exampleFormControlSelect1" class="control-label col-sm-2"><b>Jenis Kelamin</b></label>
                        <div class="col-sm-10">
                            <select name="gender" class="custom-select @error('gender') is-invalid @enderror" id="exampleFormControlSelect1">
                                <option value="">- Pilih - </option>
                                <option value="L">Laki-laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                            @error('gender')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group form-row">
                        <label class="control-label col-sm-2" for="input-6"><b>Anak Ke</b></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <input name="child" type="number" maxlength="5" class="form-control @error('child') is-invalid @enderror" id="input-6" />
                                @error('child')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <label class="control-label pt-2 px-3"><b>Dari</b></label>
                                <input name="child_from" type="number" maxlength="5" class="form-control @error('child_from') is-invalid @enderror" id="input-6" />
                                @error('child_from')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group form-row">
                        <label class="control-label col-sm-2" for="input-7"><b>Alamat</b></label>
                        <div class="col-sm-10">
                            <textarea name="address" class="form-control @error('address') is-invalid @enderror" id="input-7"></textarea>
                            @error('address')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    @if (setting('setting_web')['website_for']=='smk')
                    <div class="form-group form-row">
                        <label for="skill_id" class="control-label col-sm-2"><b>Pilih Jurusan</b></label>
                        <div class="col-sm-10">
                            <select name="skill_id" class="custom-select @error('skill_id') is-invalid @enderror" id="skill_id">
                                <option value=""></option>
                                @foreach (App\Models\Skill::all() as $skill)
                                <option value="{{ $skill->id }}">{{ $skill->name }}</option>
                                @endforeach
                            </select>
                            @error('skill_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    @endif
                    <div class="form-group form-row">
                        <label class="control-label col-sm-2" for="input-8"><b>No HP</b></label>
                        <div class="col-sm-10">
                            <input name="phone" type="text" class="form-control @error('phone') is-invalid @enderror" id="input-8" />
                            @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group form-row">
                        <label class="control-label col-sm-2" for="input-9"><b>Kode Pos</b></label>
                        <div class="col-sm-10">
                            <input name="zip" type="text" class="form-control @error('zip') is-invalid @enderror" id="input-9" />
                            @error('zip')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group form-row">
                        <label class="control-label col-sm-2" for="input-10"><b>Nama OrangTua/Wali</b></label>
                        <div class="col-sm-10">
                            <input name="parents_name" type="text" class="form-control @error('parents_name') is-invalid @enderror" id="input-10" />
                            @error('parents_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group form-row">
                        <label class="control-label col-sm-2" for="input-11"><b>Pekerjaan OrangTua/Wali</b></label>
                        <div class="col-sm-10">
                            <input name="parents_job" type="text" class="form-control @error('parents_job') is-invalid @enderror" id="input-11" />
                            @error('parents_job')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group form-row">
                        <label class="control-label col-sm-2" for="input-7"><b>Alamat Orang Tua/Wali</b></label>
                        <div class="col-sm-10">
                            <textarea name="parents_address" class="form-control @error('parents_address') is-invalid @enderror" id="input-7"></textarea>
                            @error('parents_address')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group form-row">
                        <label class="control-label col-sm-2" for="input-13"><b>No HP</b></label>
                        <div class="col-sm-10">
                            <input name="parents_phone" type="text" class="form-control @error('parents_phone') is-invalid @enderror" id="input-13" />
                            @error('parents_phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <button class="btn btn-primary btn-block p-2 mb-0 pb-0" name="" type="submit"><b>Daftar</b></button>
                </form>
            </div>
        </div>
        @endcan
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
