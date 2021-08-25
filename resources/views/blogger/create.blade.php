<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Membuat Blog baru</title>
</head>
<body>
    <h1>Form membuat blog baru</h1>
    <form action="{{ route('blog.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        @include('blogger._form')
        <button>Simpan</button>
    </form>
</body>
</html>
