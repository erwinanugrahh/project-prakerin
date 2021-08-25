<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Halaman Absen</title>
</head>
<body>
    @if (session()->has('success'))
        {{ session()->get('success') }} <br>
    @endif
    <?php locale_set_default('Asia/Jakarta'); ?>
    <p>Absen tanggal {{ date('d M Y') }}</p>
    <form action="{{ route('absen.store') }}" method="post">
        @csrf
        <table border="1" width="100%">
            <thead>
                <tr>
                    <td>No</td>
                    <td>Nama</td>
                    <td>Absen</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($students->sortBy('name') as $student)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $student->name }}</td>
                        <td>
                            <select name="absen[{{ $student->id }}]" id="absen">
                                <option value=""></option>
                                @foreach ($absens as $k => $v)
                                    <option value="{{ $k }}" {{ $student->getAbsenToday()==$k||old('absen.'.$student->id)==$k?'selected':'' }}>{{ $v }}</option>
                                @endforeach
                            </select>
                            @error('absen.'.$student->id)
                                Absen {{ $student->name }} tidak boleh kosong
                            @enderror
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <br>
        <button>simpan</button>
    </form>
</body>
</html>
