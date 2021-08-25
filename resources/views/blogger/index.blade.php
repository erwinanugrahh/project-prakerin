<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My Blog</title>
</head>
<body>
    <h1>Blog Ku</h1>
    @if (session()->has('success'))
        {{ session()->get('success') }}
        <br>
    @endif
    <a href="{{ route('blog.create') }}">Tambah Blog</a>
    <table>
        <thead>
            <tr>
                <td>No</td>
                <td>Judul</td>
                <td>Aksi</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($blogs as $blog)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $blog->title }}</td>
                    <td>
                        <a href="{{ route('blog.edit', $blog->slug) }}">Edit</a>
                        <form action="{{ route('blog.destroy', $blog->slug) }}" method="post">
                            @csrf
                            @method('delete')
                            <button>Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
