@extends('layouts.admin')

@section('content')
    <h1>Page Blogger</h1>
    <a href="{{ route('blogger.create') }}">Tambah Blogger</a>
    <br>
    <table border="1">
        <tr>
            <td>No</td>
            <td>Nama</td>
            <td>Aksi</td>
        </tr>
        @foreach ($users as $user)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $user->name }}</td>
                <td>
                    <a href="{{ route('blogger.edit', $user->id) }}">Edit</a> <br>
                    <form action="{{ route('blogger.destroy', $user->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <button>Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
