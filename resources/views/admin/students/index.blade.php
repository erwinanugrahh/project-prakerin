<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Siswa</title>
</head>
<body>
    @if (session()->has('success'))
        {{ session()->get('success') }}
    @endif
    <a href="{{ route('student.create') }}">tambah siswa</a>
    @foreach ($students as $student)
        <li>
            <h4>{{ $student->name }}</h4>
            <a href="{{ route('student.edit', $student->id) }}">edit</a>
            <form action="{{ route('student.destroy', $student->id) }}" method="post">
                @csrf
                @method('delete')
                <button>delete</button>
            </form>
        </li>
    @endforeach
</body>
</html>
