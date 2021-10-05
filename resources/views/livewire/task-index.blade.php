<div class="row">
    <div class="col-12 mt-3 d-flex justify-content-center">
        <div class="input-group w-25">
            <div class="input-group-prepend">
                <div class="input-group-text bg-white border-right-0">
                    <i class="fas fa-search"></i>
                </div>
            </div>
            <input type="text" class="form-control border-left-0 pl-0" autocomplete="false" name="search" placeholder="Cari materi..." wire:model='search'>
        </div>
    </div>
    <div class="col-12 my-3 d-flex justify-content-center">
        {{ $lessons->links() }}
    </div>
    <div class="row col-12 lessons">
        @if ($lessons->count()>0)
            @foreach ($lessons as $lesson)
            <div class="col-12 col-md-6">
                <div class="mt-2 mb-2 p-2 bg-white border shadow lh-sm">
                    <div class="row no-gutters">
                        <div class="col-2">
                            <div class="card shadow radius-5 bg-info text-center" style="height: 100%;">
                                <i class="fas fa-lg fa-book text-white my-auto"></i>
                            </div>
                        </div>
                        <div class="col-10 pl-2">
                            <p class="font-weight-bold">{{ $lesson['title'] }}</p>
                            <p>{{ $lesson['teacher'] }}</p>
                            <p>Batas Upload Tugas: {{ $lesson['end_at'] }}</p>
                            <p>Nilai Tugas: {{ $lesson['value'] }}</p>
                            @if ($lesson['start_at']<=date('Y-m-d H:i:s') && date('Y-m-d H:i:s')<=$lesson['end_at'])
                                <a class="btn btn-sm py-0 text-white btn-primary font-weight-bold" href="{{ $lesson['href'] }}">MASUK PEMBELAJARAN</a>
                            @else
                                <a class="btn btn-sm py-0 text-white btn-warning font-weight-bold" href="#">WAKTU HABIS</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        @else
            <div class="col-12">
                <div class="alert alert-warning">Tugas tidak ditemukan</div>
            </div>
        @endif
    </div>
    <div class="col-12 mt-3 d-flex justify-content-center">
        {{ $lessons->links() }}
    </div>
</div>
