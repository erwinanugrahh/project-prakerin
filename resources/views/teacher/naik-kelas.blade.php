@extends('layouts.admin')

@section('title') Halaman Siswa @endsection
@section('page') Siswa @endsection
@section('action') Indeks @endsection

@section('content')
<div class="product-list">

    <div class="row border-bottom mb-4">
        <div class="col-sm-6 pt-2"><h6 class="mb-4 bc-header">Data Siswa</h6></div>

        <div class="col-sm-6 d-flex justify-content-end pb-3">
            <button class="btn btn-success shadow" id="naik-terpilih">
                <span class='text-white'><b>Naik Terpilih</b></span>
            </button>

            <div class="clearfix"></div>
        </div>
    </div>

    <div class="table-responsive product-list">

        <table class="table table-bordered table-striped mt-3" id="students_table">
            <thead>
                <tr class="bg-theme">
                    <th style="width: 10px;" class="p-0 pr-4 align-middle">
                        <div class="form-check-box cta white">
                            <span class="color1">
                                <input type="checkbox" id="orderAll">
                                <label for="orderAll"></label>
                            </span>
                        </div>
                    </th>
                    <th>NISN</th>
                    <th>Nama Siswa</th>
                    <th>Alamat</th>
                    <th style="width: 150px">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    <tr>
                        <td class="p-0 pr-1 align-middle">
                            <div class="form-check-box cta">
                                <span class="color1">
                                    <input type="checkbox" id="choose{{ $student->id }}" value="{{ $student->id }}" name="selected">
                                    <label for="choose{{ $student->id }}"></label>
                                </span>
                            </div>
                        </td>
                        <td>{{ $student->nisn }}</td>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->address }}</td>
                        <td>
                            <form action="{{ url('/teacher/naik-kelas') }}" method="post">
                                @csrf
                                <input type="hidden" name="id[{{ $loop->iteration }}]" value="{{ $student->id }}">
                                <button class="btn btn-info naik-kelas" data-name="{{ $student->name }}">Naik</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@push('js')
    <script>
        //select all
        $('#orderAll').on('click',function(){
            let checked = $(this).prop('checked');
            $('input[name=selected]').prop('checked',checked);
        });

        $('#naik-terpilih').on('click', function(){
            let selected = $('input[name=selected]:checked');
            let ids = []
            selected.each((i, node)=>{
                ids.push(node.value)
            })
            console.log(ids);
            Swal.fire({
                title: 'Apakah kamu yakin?',
                text: selected.length+" Siswa akan naik kelas?",
                icon: 'info',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, naikan!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '/teacher/naik-kelas',
                        method: 'post',
                        data: {
                            _token: $('input[name=_token]').val(),
                            id: ids
                        },
                        success: function(result){
                            console.log(result);
                            window.location.href = '/teacher/naik-kelas'
                        }
                    })
                }
            })
        })

        $('.naik-kelas').on('click', function(e){
            e.preventDefault()
            let name = $(this).data('name')
            Swal.fire({
                title: 'Apakah kamu yakin?',
                text: "Siswa "+name+" akan naik kelas?",
                icon: 'info',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, naikan!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $(this).parent().submit()
                }
            })
        })
    </script>
@endpush
