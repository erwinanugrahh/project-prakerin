@extends('layouts.guest')

@section('content')
    <div class="container text-center mt-3 mb-5">
        <img src="{{ $skill->logo }}" style="max-width: 300px" alt="">
        <h3>{{ $skill->name }}</h3>
        <p>{{ $skill->description }}</p>
    </div>
@endsection

@push('js')
<script>
    $('.halaman-scroll').on('click', function(){
        var tujuan = $(this).attr('href');
        window.location.href = '/'+tujuan
    })
</script>
@endpush
