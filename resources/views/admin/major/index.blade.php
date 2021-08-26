@extends('layouts.admin')

@section('content')

    <!--Validation Scenario-->
    <div class="mt-1 mb-4 p-3 button-container bg-white border shadow-sm">
        <h6 class="mb-2">Validation Scenario</h6>

        <div id="jsGrid3"></div>
    </div>
    <!--/Validation Scenario-->

    {{-- <form action="{{ route('major.store') }}" method="post">
        @csrf
        <input type="text" name="name" value="{{ old('name') }}">
        <button>submit</button>
    </form>

    <ul>
        @foreach ($majorities as $major)
            <li>{{ $major->name }}
                <a href="{{ route('major.edit', $major->id) }}">
                    <button>Edit</button>
                </a>
                <form action="{{ route('major.destroy', $major->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <button>hapus</button>
                </form>
            </li>
        @endforeach
    </ul> --}}
@endsection

@push('css')
    <!--JsGrid CSS-->
    <link rel="stylesheet" href="{{ url('admin') }}/css/jsgrid.min.css">
    <link rel="stylesheet" href="{{ url('admin') }}/css/jsgrid-theme.min.css">
@endpush

@push('js')
    <script src="{{ url('admin/js/jsgrid.min.js') }}"></script>
    <script src="{{ url('js/admin/major.js') }}"></script>
@endpush
