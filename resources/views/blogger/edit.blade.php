@extends('layouts.admin', ['searchbar'=>false])

@section('title') Halaman blog @endsection
@section('page') blog @endsection
@section('action') Tambah @endsection

@section('content')
    <h6 class="mb-3">Mengedit Blog {{ $blog->title }}</h6>
    <form action="{{ route('blog.update', $blog->slug) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        @include('blogger._form', ['blog'=>$blog,'imageUrl'=>'/images/banners/'.$blog->banner])
        <button class="btn btn-primary" id="edit-btn">Edit</button>
    </form>
@endsection

@push('js')
    <script>
        $('#edit-btn').on('click', function(e){
            e.preventDefault()
            Swal.fire({
                title: 'Apakah kamu ingin mengeditnya?',
                text: "Jika blog diedit, maka statusnya akan pending kembali!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, edit!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    $(this).parent().submit()
                }
            })
        })
    </script>
@endpush
