<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher</title>
</head>
<body>
    @if (session()->has('success'))
        {{ session()->get('success') }}
    @endif
    <a href="{{ route('teacher.create') }}">Tambah Guru</a>
    @foreach ($teachers as $teacher)
        <li>
            <h4>{{ $teacher->name }}</h4>
            <a href="{{ route('teacher.edit', $teacher->id) }}">edit</a>
            <form action="{{ route('teacher.destroy', $teacher->id) }}" method="post">
                @csrf
                @method('delete')
                <button>delete</button>
            </form>
        </li>
    @endforeach
</body>
</html>
