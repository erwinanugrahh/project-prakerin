@extends('layouts.admin')

@section('content')
    
<div class="mt-4 mb-3 p-3 button-container bg-white border shadow-sm">
    <h6 class="mb-3">Edit Siswa</h6>

    <form action="{{ route('student.update', $student->id) }}" method="post">
        @csrf
        @method('put')
        @include('admin.students._form')
        <button>Edit</button>
    </form>

</div>

@endsection
