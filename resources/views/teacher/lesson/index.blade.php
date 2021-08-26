@extends('layouts.admin')

@section('title' , 'Buat Materi Baru')

@section('content')
    
    @if (session()->has('success'))
        {{ session()->get('success') }}
    @endif
    <a href="{{ route('lesson.create') }}">Buat materi baru</a>
    <table>
        <thead>
            <tr>
                <td>No</td>
                <td>Judul materi</td>
                <td>Aksi</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($lessons as $lesson)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $lesson->title }}</td>
                    <td>
                        <a href="{{ route('lesson.edit', $lesson->slug) }}">Edit</a>
                        <form action="{{ route('lesson.destroy', $lesson->slug) }}" method="post">
                            @csrf
                            @method('delete')
                            <button>Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection

