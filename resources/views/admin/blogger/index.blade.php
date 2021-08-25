<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blogger</title>
</head>
<body>
    @if (session()->has('success'))
        {{ session()->get('success') }}
    @endif
    <h1>Page Blogger</h1>
    <a href="{{ route('blogger.create') }}">Tambah Blogger</a>
    <br>
    <table border="1">
        <tr>
            <td>No</td>
            <td>Nama</td>
            <td>Aksi</td>
        </tr>
        @foreach ($users as $user)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $user->name }}</td>
                <td>
                    <a href="{{ route('blogger.edit', $user->id) }}">Edit</a> <br>
                    <form action="{{ route('blogger.destroy', $user->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <button>Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
</body>
</html>
