<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('lesson.store') }}" method="post">
        @csrf
        @include('teacher.lesson._form')
        <button>Simpan</button>
    </form>
</body>
</html>
