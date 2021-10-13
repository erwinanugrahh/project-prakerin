@extends('layouts.admin')

@section('title') Kelas Jurusan @endsection
@section('page') Kelas Jurusan @endsection
@section('action') Indeks @endsection

@section('content')
    <form action="" method="post" id="ajax">
        @csrf
        <select name="level" id="level">
            <option value="1">X</option>
            <option value="2">XI</option>
            <option value="3">XII</option>
        </select>
        <select name="skill_id" id="skill_id">
            @foreach (App\Models\Skill::all() as $skill)
                <option value="{{ $skill->id }}">{{ $skill->name }}</option>
            @endforeach
        </select>
        <input type="text" name="name" id="name">
        <button>Submit</button>
    </form>
    <!--Validation Scenario-->
    <div class="row border-bottom mb-4">
        <div class="col-sm-6 pt-2"><h6 class="mb-4 bc-header">Tabel Data Kelas / Jurusan</h6></div>
    </div>

    <div id="majorities_table"></div>
    <!--/Validation Scenario-->
@endsection

@push('css')
    <!--JsGrid CSS-->
    <link rel="stylesheet" href="{{ url('admin') }}/css/jsgrid.min.css">
    <link rel="stylesheet" href="{{ url('admin') }}/css/jsgrid-theme.min.css">
@endpush

@push('js')
    <script src="{{ url('admin/js/jsgrid.min.js') }}"></script>
    <script src="{{ url('js/admin/major.js?v=1') }}"></script>
    <script>
        $('#ajax').on('submit', function(e){
            e.preventDefault()
            $.ajax({
                url: '',
                method: 'post',
                data: $(this).serialize(),
                success: function(e){
                    console.log(e);
                }
            })
        })
    </script>
@endpush
