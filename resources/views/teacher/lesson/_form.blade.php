<input type="hidden" id="majorities" value="{{ $majorities }}">
<div class="tab">
    <div class="form-group">
        <label for="major_id">Untuk kelas</label>
        <select name="major_id[]" class="form-control select2 @error('major_id') is-invalid @enderror" id="major_id" required multiple>
            @foreach ($majorities as $major)
            <option value="{{ $major->id }}" {{ isset($lesson)&&in_array($major->id, $lesson->majors->pluck('major_id')->toArray())?'selected':'' }}>{{ $major->name }}</option>
            @endforeach
        </select>
        <div class="invalid-tooltip">
            @error('major_id')
                {{ $message }}
            @else
                Silahkan terlebih dahulu isi kelas tujuanya
            @enderror
        </div>
    </div>

    <div class="classess"></div>
</div>

<div class="tab">
    <div class="form-group floating-label">
        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" value="{{ $lesson->title??old('title') }}" required>
        <label for="title">Judul Materi</label>
        <div class="invalid-tooltip">
            @error('title')
                {{ $message }}
            @else
                Judul Materi Harus diisi
            @enderror
        </div>
    </div>

    <div class="form-group">
        <div class="custom-file">
            <input type="file" class="custom-file-input" name="attachment" id="attachment">
            <label class="custom-file-label" for="banner">Pilih Lampiran</label>
            <small class="form-text text-muted">
                (Opsional) seperti dokumen, pdf, excel, presentasi, dll. (Maks upload 3mb)
            </small>
        </div>
    </div>

    <textarea class="form-control editor" name="content">{{ $lesson->content??old('content') }}</textarea>
    @error('content')
        <div class="i text-danger"><small><b>{{ $message }}</b></small></div><br>
    @enderror
</div>

<div style="overflow:auto;" class="mt-3">
    <div style="float:right;">
      <button type="button" class="btn btn-success" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
      <button type="button" class="btn btn-success" id="nextBtn" onclick="nextPrev(1)">Next</button>
      <button type="submit" class="btn btn-success" id="submitBtn">Submit</button>
    </div>
</div>

<!-- Circles which indicates the steps of the form: -->
<div style="text-align:center;margin-top:40px;">
    <span class="step"></span>
    <span class="step"></span>
</div>

@push('css')
    <style>
         /* Style the form */
        #regForm {
            background-color: #ffffff;
            margin: 100px auto;
            padding: 40px;
            width: 70%;
            min-width: 300px;
        }

        /* Style the input fields */
        input {
            padding: 10px;
            width: 100%;
            font-size: 17px;
            font-family: Raleway;
            border: 1px solid #aaaaaa;
        }

        /* Mark input boxes that gets an error on validation: */
        input.invalid {
            background-color: #ffdddd;
        }

        /* Hide all steps by default: */
        .tab {
            display: none;
        }

        /* Make circles that indicate the steps of the form: */
        .step {
            height: 15px;
            width: 15px;
            margin: 0 2px;
            background-color: #bbbbbb;
            border: none;
            border-radius: 50%;
            display: inline-block;
            opacity: 0.5;
        }

        /* Mark the active step: */
        .step.active {
            opacity: 1;
        }

        /* Mark the steps that are finished and valid: */
        .step.finish {
            background-color: #04AA6D;
        }
    </style>
@endpush

@push('js')
    <script src="{{ url('plugins/tinymce/jquery.tinymce.min.js') }}"></script>
    <script src="{{ url('plugins/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ url('js/teacher/lesson-form.js') }}"></script>
    <script>
        function pluck(array, key) {
           return array.map(o => o[key]);
        }
    </script>
@endpush
