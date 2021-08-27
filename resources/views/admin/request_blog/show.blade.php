@extends('layouts.admin', [
    'searchbar' => false
])

@section('title') Persetujuan Blog @endsection
@section('page') Blogger @endsection
@section('action') Preview @endsection

@section('content')
    <h2>{{ $blog->title }}</h2>
    <img style="max-width: 100%" src="{{ url('') }}/images/banners/{{ $blog->banner }}" alt="{{ $blog->blogger->name }}" srcset="">
    <h6 class="mt-3">Oleh {{ $blog->blogger->name }}</h6>
    {!! $blog->content !!}
    <hr class="divider">
    <div class="text-right">
        <button class="btn btn-danger shadow" onclick="send_result('rejected')"><i class="fas fa-times mr-2"></i> Tolak</button>
        <button class="btn btn-success shadow" onclick="send_result('accepted')"><i class="fas fa-check mr-2"></i> Terima</button>
    </div>
@endsection

@push('js')
    <script>
        $('#request_blog').addClass('active').parent().parent().addClass('active');
        function send_result(action) {
            var option = {
                accepted: 'terima',
                rejected: 'tolak'
            }
            Swal.fire({
                title: 'Apakah Kamu Yakin?',
                text: `Blog ini akan di${option[action]}`,
                icon: 'info',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: `Ya, ${option[action]}`,
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '../send_result',
                        method: 'POST',
                        data: {
                            _token: $('input[name=_token]').val(),
                            ids: ['{{ $blog->id }}'],
                            action
                        },
                        success: function(result){
                            Swal.fire({
                                title: `Berhasil di${option[action]}`,
                                html: result.message,
                                icon: 'success',
                                confirmButtonColor: '#3085d6',
                                confirmButtonText: `Oke`
                            }).then(() => {
                                window.location.href = '../'
                            })
                        }
                    })
                }
            })
        }
    </script>
@endpush
