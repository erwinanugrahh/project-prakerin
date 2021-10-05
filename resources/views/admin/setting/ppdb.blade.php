<div class="card shadow">
    <div class="card-header accordion-header p-1" id="headingThree">
        <h5 class="mb-0 panel-title">
            <button class="btn btn-link accordion-btn collapsed" type="button" data-toggle="collapse" data-target="#ppdb" aria-expanded="false" aria-controls="ppdb">
            Penerimaan Peserta Didik Baru (PPDB)
            </button>
        </h5>
    </div>
    <div id="ppdb" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
        <div class="card-body p-3 text-justify accordion-body">
            <div class="form-group form-row">
                <div class="col-4">
                    <div class="col-12">
                        <input type="checkbox" id="kenaikan-kelas" {{ setting('setting_ppdb')['kenaikan_kelas']=="true"?'checked':'' }}/>
                        <label class="">Kenaikan Kelas</label>
                    </div>
                </div>
                <div class="col-4">
                    <div class="col-12">
                        <input type="checkbox" id="open-pengumuman" {{ setting('setting_ppdb')['open_pengumuman']=="true"?'checked':'' }} />
                        <label for="open-pengumuman" class="">Open Pengumuman PPDB</label>
                    </div>
                </div>
                <div class="col-4">
                    <div class="col-12">
                        <input type="checkbox" id="open-ppdb" {{ setting('setting_ppdb')['open_ppdb']=="true"?'checked':'' }}/>
                        <label class="">Open PPDB</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
