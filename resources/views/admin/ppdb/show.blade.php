@extends('layouts.admin', [
    'searchbar' => false
])

@section('title') Persetujuan Blog @endsection
@section('page') Blogger @endsection
@section('action') Preview @endsection

@push('css')
    <style>
        .tags-area {
            margin: 30px 0;
        }

        .post-tags a {
            border: 1px solid #dadada;
            color: #7c7c7c;
            display: inline-block;
            font-size: 12px;
            padding: 7px 18px;
            margin-left: 3px;
            font-size: 14px;
        }

        .post-tags a:hover {
            background: var(--purple);
            color: #fff;
            border: 1px solid transparent;
        }
    </style>
@endpush

@section('content')
    <h2>{{ $blog->title }}</h2>
    <img style="max-width: 100%" src="{{ url('') }}/images/banners/{{ $blog->banner }}" alt="{{ $blog->blogger->name }}" srcset="">
    <h6 class="mt-3">Oleh {{ $blog->blogger->name }}</h6>
    {!! $blog->content !!}
    <div class="tags-area">
        @if ($blog->tags!='')
        <div class="post-tags">
            @foreach (explode(',', $blog->tags) as $tag)
            <a href="/blogs?tag={{ $tag }}">{{ $tag }}</a>
            @endforeach
        </div>
        @endif
    </div>
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
