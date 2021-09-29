<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!--Bootstrap CSS-->
    <link rel="stylesheet" href="{{ url('admin') }}/css/bootstrap.min.css">
    <!--Custom style.css-->
    <link rel="stylesheet" href="{{ url('admin') }}/css/quicksand.css">
    <link rel="stylesheet" href="{{ url('admin') }}/css/style.css">
    <!--Font Awesome-->
    <link rel="stylesheet" href="{{ url('admin') }}/css/fontawesome.css">
    <!--Chartist CSS-->
    <link rel="stylesheet" href="{{ url('admin') }}/css/chartist.min.css">
    <!--Bootstrap Calendar-->
    <link rel="stylesheet" href="{{ url('admin') }}/js/calendar/bootstrap_calendar.css">

    <title>PPDB</title>
</head>
<body>

    <div class="container">
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $err)
                <li>{{ $err }}</li>
            @endforeach
        </ul>
    @endif
    <h3 class="mt-4"><strong>FORM PPDB</strong></h3>
        <form action="{{ url('ppdb') }}" method="post" class="form-horizontal mt-4 mb-5">
            @csrf
            <div class="form-group row">
                <label class="control-label col-sm-2" for="input-1">Nama</label>
                <div class="col-sm-10">
                    <input name="name" type="text" class="form-control" id="input-1" />
                </div>
            </div>
            <div class="form-group row">
                <label class="control-label col-sm-2" for="input-2">NISN</label>
                <div class="col-sm-10">
                    <input name="nisn" type="number" class="form-control" id="input-2" />
                </div>
            </div>
            <div class="form-group row">
                <label class="control-label col-sm-2" for="input-3">Tempat Lahir</label>
                <div class="col-sm-10">
                    <input name="place" type="search" class="form-control" id="input-3" />
                </div>
            </div>
            <div class="form-group row">
                <label class="control-label col-sm-2" for="input-4">Tanggal Lahir</label>
                <div class="col-sm-10">
                    <input name="dob" type="date" class="form-control" id="input-5" placeholder="11/11/2019" />
                </div>
            </div>
            <div class="form-group row">
                <label for="exampleFormControlSelect1" class="control-label col-sm-2">Jenis Kelamin</label>
                <div class="col-sm-10">
                    <select name="gender" class="form-control" id="exampleFormControlSelect1">
                        <option>- Pilih - </option>
                        <option>Laki-laki</option>
                        <option>Perempuan</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="control-label col-sm-2" for="input-6">Anak Ke</label>
                <div class="col-sm-10">
                    <div class="input-group">
                        <input name="child" type="number" class="form-control" id="input-6" />
                        <label class="control-label pt-2 px-3">Dari</label>
                        <input name="child_from" type="number" class="form-control" id="input-6" />
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label class="control-label col-sm-2" for="input-7">Alamat</label>
                <div class="col-sm-10">
                    <textarea name="address" class="form-control" id="input-7"></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="control-label col-sm-2">Pilih Jurusan</label>
                <div class="col-sm-10">
                    <select name="major" class="form-control" id="">
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
                <label class="control-label col-sm-2" for="input-8">No HP</label>
                <div class="col-sm-10">
                    <input name="phone" type="text" class="form-control" id="input-8" />
                </div>
            </div>
            <div class="form-group row">
                <label class="control-label col-sm-2" for="input-9">Kode Pos</label>
                <div class="col-sm-10">
                    <input name="zip" type="text" class="form-control" id="input-9" />
                </div>
            </div>
            <div class="form-group row">
                <label class="control-label col-sm-2" for="input-10">Nama OrangTua/Wali</label>
                <div class="col-sm-10">
                    <input name="parents_name" type="text" class="form-control" id="input-10" />
                </div>
            </div>
            <div class="form-group row">
                <label class="control-label col-sm-2" for="input-11">Pekerjaan OrangTua/Wali</label>
                <div class="col-sm-10">
                    <input name="parents_job" type="text" class="form-control" id="input-11" />
                </div>
            </div>
            <div class="form-group row">
                <label class="control-label col-sm-2" for="input-7">Alamat Orang Tua/Wali</label>
                <div class="col-sm-10">
                    <textarea name="parents_address" class="form-control" id="input-7"></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label class="control-label col-sm-2" for="input-13">No HP</label>
                <div class="col-sm-10">
                    <input name="parents_phone" type="text" class="form-control" id="input-13" />
                </div>
            </div>

            <button class="btn btn-theme btn-block p-2 mb-1" name="" type="submit">Daftar</button>

            {{-- <div class="form-group row">
                <label class="control-label col-sm-2" for="exampleFormControlFile1">File input</label>
                <div class="col-sm-10">
                    <input type="file" class="form-control " id="exampleFormControlFile1">
                </div>
            </div>
            <div class="form-group row">
                <label class="control-label col-sm-2" for="input-9">Read Only Field</label>
                <div class="col-sm-10">
                    <input type="text" readonly class="form-control" id="input-9" placeholder="read only" />
                </div>
            </div>
            <div class="form-group row">
                <label class="control-label col-sm-2" for="input-10">Disabled Field</label>
                <div class="col-sm-10">
                    <input type="text" disabled class="form-control" id="input-10" placeholder="Disabled" />
                </div>
            </div>
            <div class="form-group row">
                <label class="control-label col-sm-2" for="input-11">Textarea</label>
                <div class="col-sm-10">
                    <textarea rows="5" class="form-control" id="input-11" placeholder="Default Textarea"></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label class="control-label col-sm-2 mt-3" for="formControlRange">Range</label>
                <div class="col-sm-10">
                    <input type="range" class="custom-range" min="0" max="5" step="0.5" id="customRange3">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-6 col-12">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                        <label class="custom-control-label" for="customCheck1">Check this custom checkbox</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="customCheck2">
                        <label class="custom-control-label" for="customCheck2">Check this custom checkbox</label>
                    </div>
                </div>

                <div class="col-sm-6 col-12">
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" name="customradio" id="customeradio1">
                        <label class="custom-control-label" for="customeradio1">Check this custom radio</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="customeradio2">
                        <label class="custom-control-label" name="customradio" for="customeradio2">Check this custom radio</label>
                    </div>
                </div>
            </div> --}}

        </form>

    </div>

      <!-- Page JavaScript Files-->
      <script src="{{ url('admin') }}/js/jquery.min.js"></script>
      <script src="{{ url('admin') }}/js/jquery-1.12.4.min.js"></script>
      <!--Popper JS-->
      <script src="{{ url('admin') }}/js/popper.min.js"></script>
      <!--Bootstrap-->
      <script src="{{ url('admin') }}/js/bootstrap.min.js"></script>
      <!--Sweet alert JS-->
      <script src="{{ url('admin') }}/js/sweetalert.js"></script>
      <!--Progressbar JS-->
      <script src="{{ url('admin') }}/js/progressbar.min.js"></script>
      <!--Charts-->
      <!--Canvas JS-->
      <script src="{{ url('admin') }}/js/charts/canvas.min.js"></script>
      <!--Bootstrap Calendar JS-->
      <script src="{{ url('admin') }}/js/calendar/bootstrap_calendar.js"></script>
      <script src="{{ url('admin') }}/js/calendar/demo.js"></script>
      <!--Bootstrap Calendar-->

      <!--Custom Js Script-->
      <script src="{{ url('admin') }}/js/custom.js"></script>
      <!--Custom Js Script-->
</body>
</html>

