@extends('layouts.admin')

@section('title') Halaman Blog @endsection
@section('page') Blog @endsection
@section('action') Preview @endsection

@push('css')
    {{-- <link rel="stylesheet" href="{{ url('plugins/ckeditor/contents.css') }}"> --}}
@endpush

@section('content')
    <h2>{{ $blog->title }}</h2>
    <hr>
    <img src="/images/banners/{{ $blog->banner }}" alt="{{ $blog->title }}" style="width: 100%; height: 100%">
    <br><br>
    {!! $blog->content !!}
    <hr>
    <div class="d-flex justify-content-end">
        <a href="{{ route('blog.edit', $blog->slug) }}" class="btn btn-info text-white mr-2"><i class="fas fa-edit pr-2"></i> Edit</a>
        <button class="btn btn-danger" onclick="destroy()"><i class="fas fa-trash pr-2"></i> Hapus</button>
    </div>
@endsection

@push('js')
    <script>
        $('#blog').addClass('active')
        function destroy() {
            Swal.fire({
                title: 'Apakah Kamu Yakin?',
                text: `Blog ini akan dihapus`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: `Ya, hapus`,
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '{{ $blog->slug }}',
                        method: 'DELETE',
                        data: {
                            _token: $('input[name=_token]').val(),
                        },
                        success: function(result){
                            Swal.fire({
                                title: `Blog ini berhasil dihapus`,
                                html: result.message,
                                icon: 'success',
                                confirmButtonColor: '#3085d6',
                                confirmButtonText: `Oke`
                            }).then(() => {
                                window.location.href = '../blog'
                            })
                        }
                    })
                }
            })
        }
    </script>
@endpush
