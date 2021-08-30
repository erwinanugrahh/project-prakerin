<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tasks</title>
</head>
<body>
    <ul>
        @foreach ($lessons as $lesson)
            <li>{{ $lesson->title }} <a href="{{ route('task.show', $lesson->lesson->slug??'') }}">Detail</a></li>
        @endforeach
    </ul>
</body>
</html>
